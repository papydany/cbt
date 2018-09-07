<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Traits\MyTrait;
use App\Audit;
use DB;
use App\User;
use App\Pin;
use App\Student;
use App\Subject;
use App\Contact;
use App\State;
use App\SearchCriteria;
use App\SubjectTeacher;
use App\Lga;
use App\Post;
use Auth;
use Image;
use File;
use Illuminate\Support\Facades\Session;
use App\AddressInfo;
use App\SubjectSetup;
use App\Simulation;


class FrontController extends Controller
{
  Const Admin =2;
  Const Active =1;
  Const Teacher =3;
    use MyTrait;

   public function index()
   {
   	return view('front.index');
   }

    public function aboutus()
   {
    return view('front.aboutus');
   }

       public function service()
   {
    return view('front.service');
   }
//======================teacher  ===============
    public function teacher()
   {
    $state =State::all();
   	return view('front.teacher.index')->withS($state);
   }
//post teacher
    public function post_teacher(Request $request)
   {
    $request->validate([
        'email' => 'required|string|email|max:255|unique:users',
    ]);
    
   	 $user= new User;
            $user->name=$request->name;
            $user->phone=$request->phone;
            $user->password=bcrypt($request->password);
            $user->word=$request->password;
            $user->email=$request->email;
            $user->address=$request->address;
            $user->parent_id=0;
            $user->status=0;
            $user->price =$request->pph;
               if($request->hasFile('img_url')) {
            
            $image = $request->file('img_url');
            $filename = time() . '.' . $image->getClientOriginalExtension();
           $destinationPath = public_path('image/teachers');
            $img = Image::make($image->getRealPath());
            $img->resize(150, 100, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $filename);
        $user->img_url = $filename;
    }
     
     if($request->hasFile('cv')) {
          $filename = time() . '.' . $request->file('cv')->getClientOriginalExtension();
      $file = $request->file('cv')->move(public_path().'/cv/', $filename);
          
         $user->cv = $filename;
          }
    $user->save();

    $s =new SearchCriteria;
    $s->user_id =$user->id;
    $s->lga_id =$request->lga;
    $s->state_id =$request->state;
    $s->status =$request->status;
    $s->likes =0;
    $s->save();


    $user_role =DB::table('user_roles')->insert(['user_id' => $user->id, 'role_id' =>3]);
        Session::flash('success',"successfull. login and select subject that you teach.");
        return back();
    }
    // find teacher 

    public function findteacher()
    {
    $s =State::all();
    $sub =Subject::all();  
return view('front.teacher.find')->withS($s)->withSub($sub);
    }

       public function post_findteacher(Request $request)
    {
      $request->validate([
        'state' => 'required',
        'lga' => 'required',
         'status' => 'required',
        'fess' => 'required',
    ]);
      $state =$request->state;
      $lga =$request->lga;
      $status =$request->status;
      $fess =$request->fess;
      $subject =$request->subject;
      if(empty($subject))
      {
      $teacher = DB::table('users')
            ->join('user_roles', 'users.id', '=', 'user_roles.user_id')
            ->join('search_criterias', 'users.id', '=', 'search_criterias.user_id')
            ->where('user_roles.role_id',self::Teacher)
            ->where('users.status',self::Active)
            ->where('users.price','<=',$fess)
            ->where([['search_criterias.state_id',$state],['search_criterias.lga_id',$lga],['search_criterias.status',$status]])
            ->paginate(50);
      }else
      {
             $teacher = DB::table('users')
            ->join('user_roles', 'users.id', '=', 'user_roles.user_id')
            ->join('search_criterias', 'users.id', '=', 'search_criterias.user_id')
            ->join('subject_teachers', 'users.id', '=', 'subject_teachers.user_id')
            ->where('user_roles.role_id',self::Teacher)
            ->where('users.status',self::Active)
            ->where('users.price','<=',$fess)
            ->where([['search_criterias.state_id',$state],['search_criterias.lga_id',$lga],['search_criterias.status',$status]])
            ->where('subject_teachers.subject_id',$subject)
            ->paginate(50); 
      }
//dd($teacher);
          
    $s =State::all();
    $sub =Subject::all();  
return view('front.teacher.find')->withS($s)->withSub($sub)->withT($teacher);
    }

 // view cv
      public function teacher_cv($id)
  {
    $k =User::find($id);
    //$contents = Storage::get($k->image);
    $c =$k->cv;
    if(!empty($c))
    {
      return response()->file('cv/'.$c);
    }
    {
      dd("CV is not available");
    }
  
  
   }   
// =======================================students=========================================
    public function student()
   {
if(session()->get('id'))
{
   $check =Pin::where([['id',session()->get('id')],['pin',session()->get('pin')],['user_id',session()->get('user_id')]])->first();
$subset =SubjectSetup::where('user_id',session()->get('user_id'))->get();
foreach ($subset as $key => $value) {
  $subject_array [] =$value->subject_id;
}
$subject =Subject::whereIn('id',$subject_array)->get();
return view('front.student.reg')->withC($check)->withS($subject);
}
   
    return view('front.student.index');
   }
   // post students
    public function post_student(Request $request)
   {
 $id =$request->id;
 $pin =$request->pin;
 $user_id =$request->user_id;
$check =Pin::where([['id',$id],['pin',$pin],['user_id',$user_id]])->first();

if($check != null)
{
  if($check->status == 1)
  {
      Session::flash('warning',"pin already used.");
        return back();
  }
$request->session()->put('id',$id);  
$request->session()->put('pin',$pin); 
$request->session()->put('user_id',$user_id); 
$subset =SubjectSetup::where('user_id',session()->get('user_id'))->get();
foreach ($subset as $key => $value) {
  $subject_array [] =$value->subject_id;
}
$subject =Subject::whereIn('id',$subject_array)->get();

return view('front.student.reg')->withC($check)->withS($subject);
}
Session::flash('warning',"Incorrect details entered.");
return view('front.student.index');
   }

   // ============students registration =====================
   public function student_reg(Request $request)
   {
    $request->validate([
        'phone' => 'required',
        'email' => '|string|email|max:255|unique:students',
        'name' => 'required',
         'address'=>'required',
         'password' => 'required|string',
    ]);
    $variable =$request->input('subject_id');
    if(empty($variable))
    {
      Session::flash('warning',"Please Select Subject.");
      return back();
    }
 
       $user= new Student;
            $user->name=$request->name;
            $user->phone=$request->phone;
            $user->address=$request->address;
           $user->email=$request->email;
            $user->password=bcrypt($request->password);
            $user->pin_id=$request->pin_id;
            $user->user_id=$request->user_id;
            $user->status=1;
         if($request->hasFile('img_url')) {
            
            $image = $request->file('img_url');
            $filename = time() . '.' . $image->getClientOriginalExtension();
           $destinationPath = public_path('image/students');
            $img = Image::make($image->getRealPath());
            $img->resize(150, 100, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $filename);
        $user->img_url = $filename;
    }
    $user->save();
    $pin =pin::find($request->pin_id);
    $pin->student_id =$user->id;
    $pin->status = 1;
    $pin->save();
    foreach ($variable as $key => $value) {
    $subject_id [] =['student_id'=>$user->id,'subject_id'=>$value]; 

    }

    $student_subject =DB::table('student_subjects')->insert($subject_id);
  
  $request->session()->forget('id');
   $request->session()->forget('pin');
    $request->session()->forget('user_id');
  $request->session()->flush();
 Session::flash('success',"successfull."); 
         return back();
   }

   public function contact()
   {
    $a =AddressInfo::first();


return view('front.contact')->withC($a);
   }

     public function post_contact(Request $request)
   {
    $request->validate([
        'name' => 'required',
        'email' => 'required',
        'message' => 'required',
        
    ]);
    

    $contact =new Contact;
    $contact->name =$request->name;
    $contact->email =$request->email;
    $contact->message =$request->message;
    $contact->status =0;
    $contact->save();
     Session::flash('success',"successfull.");
       return back();

   }
   public function getlga($id)
{
$sql =Lga::where('state_id',$id)->get();
return $sql;
}
// get post
public function getpost()
    {
         $post =Post::paginate(50);
         return view('front.post.index')->withP($post);   
    }

    public function getpost_detail($id)
    {
         $post =Post::find($id);
         return view('front.post.detail')->withP($post);   
    }

    // ============== get sc_simulation =====================

    public function sc_simulation()
    {
      $s =Simulation::select('subject_id')->distinct()->get();
        return view('front.simulation.index')->withS($s);
 
    }

    public function sc_simulation2(Request $request)
    {
      $s =Simulation::select('subject_id')->distinct()->get();
      $s2 =Simulation::where('subject_id',$request->subject)->orderBy('id','DESC')->get();
        return view('front.simulation.index')->withS($s)->withS2($s2);
 
    }
}
