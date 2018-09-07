<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Traits\MyTrait;
use App\Audit;
use DB;
use Excel;
use App\User;
use Auth;
use Image;
use Illuminate\Support\Facades\Session;
use App\Subject;
use App\Question;
use App\Option;
use App\Pin;
use App\Score;
use App\Student;
use App\StartButton;
use App\NumberOfQuestion;
use App\TimePerQuestion;
use App\SearchCriteria;
use App\SubjectTeacher;
use App\Lga;
use App\State;
use App\Post;
use App\AddressInfo;
use App\Exports\PinExport;
use App\SubjectSetup;
use App\Simulation;
class HomeController extends Controller
{
    Const Admin =2;
    Const Active =1;
    Const NonActive =0;
    Const Teacher =3;
    use MyTrait;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $number_school =$this->getSchool(self::Admin,self::Active)->count();
        $number_students =Student::count();
        $SearchCriteria =SearchCriteria::where('user_id',$this->user_id())->first();
        $st = SubjectTeacher::where('user_id',$this->user_id())->get();

 $teacher = DB::table('users')
            ->join('user_roles', 'users.id', '=', 'user_roles.user_id')
            ->where('user_roles.role_id',self::Teacher)
            ->where('users.status',self::NonActive)
           ->count();
           
        return view('home.index')->withNs($number_school)->withNst($number_students)->withSc($SearchCriteria)->withSt($st)->withTeacher($teacher);
    }
    // ================== subject ========================
    public function subject()
    {
       $subject =Subject::get();
       return view('home.subject.index')->withS($subject);
    }
//====================== post subject ===============================
    public function post_subject(Request $request)
    {
        $request->validate(['name' => 'required',]);

        $name =strtoupper($request->name);

$check = Subject::where([['user_id',$this->user_id()],['name',$name]])->get()->count();
//dd($check);
    if($check == 0)
    {
        $subject = New Subject;
        $subject->user_id =$this->user_id();
        $subject->name =$name;
        $subject->save();
        $request->session()->flash('success', 'Subject was successfuly Created!');

    }else{
     $request->session()->flash('warning', 'Subject exist Already!');
    }
    return back();
    }

    //====================== edit subject ===============================
    public function edit_subject($id)
    {
        if(isset($id))
        {
    $subject = Subject::find($id);
    return view('home.subject.edit')->withS($subject);

        }
        return back();
    }

    // ===================post edit subject ==================================
    public function update_subject(Request $request)
    {
   $subject =Subject::find($request->id);
   $subject->name=strtoupper($request->name);
   $subject->save();
  $request->session()->flash('success', 'Subject was successfuly Updated!');
  return redirect()->action('HomeController@subject');
    }
    /*==========================================school registration ==========================*/
    public function school()
    {
  return view('home.school.index');
    }

    public function post_school(Request $request)
    {
        $user= new User;
            $user->name=$request->name;
            $user->phone=$request->phone;
            $user->address=$request->address;
            $user->password=bcrypt($request->password);
            $user->word=$request->password;
            $user->email=$request->email;
            $user->parent_id=0;
            $user->status=1;
         if($request->hasFile('img_url')) {
            
            $image = $request->file('img_url');
            $filename = time() . '.' . $image->getClientOriginalExtension();
           $destinationPath = public_path('image/school');
            $img = Image::make($image->getRealPath());
            $img->resize(118, 32, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $filename);
        $user->img_url = $filename;
    }
    $user->save();
    $user_role =DB::table('user_roles')->insert(['user_id' => $user->id, 'role_id' =>2]);
        Session::flash('success',"successfull.");
        return back();
    }
// --------------------view school--------------------
    public function view_school()
    {
        $number_school =$this->getSchool(self::Admin,self::Active);
         return view('home.school.view')->withNs($number_school);   
    }
// --------------------edit school--------------------
    public function edit_school($id)
    {
     if($id)
     {
        $user =User::find($id);
        if($user != null)
        {
 return view('home.school.edit')->withU($user);         
}
         
     }
     Session::flash('warning ',"school does not exist.");
     return back();
    }
// --------------------update school--------------------
     public function update_school(Request $request)
    {
       $user =User::find($request->id); 
       $user->name=$request->name;
       $user->phone=$request->phone;
      $user->address=$request->address;
     $user->save();
    $request->session()->flash('success', 'School was successfuly Updated!');
  return redirect()->action('HomeController@view_school');
    }
// --------------------deactive school--------------------
     public function deactivate_school(Request $request, $id)
    {
         $user =User::find($request->id); 
         $user->status = 0;
         $user->save();
          $request->session()->flash('success', 'School was successfuly Updated!');
          return back();
    }


    /*==========================================basic inf0 ==========================*/
    public function basicinfo()
    {
  return view('home.basicinfo.index');
    }

    public function post_basicinfo(Request $request)
    {
      $check = AddressInfo::get()->count();
      if($check > 0 )
      {
        Session::flash('warning',"basic info exist Already.");
        return back();
      }
        $user= new AddressInfo;
            $user->phone=$request->phone;
            $user->phone1=$request->phone1;
            $user->address=$request->address;
            $user->email1=$request->email1;
            $user->email2=$request->email2;
            if($request->hasFile('logo')) {
            
            $image = $request->file('logo');
            $filename = time() . '.' . $image->getClientOriginalExtension();
           $destinationPath = public_path('image/');
            $img = Image::make($image->getRealPath());
            $img->resize(118, 32, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $filename);
        $user->logo = $filename;
    }
    $user->save();
        Session::flash('success',"successfull.");
        return back();
    }
// --------------------view basicinfo--------------------
    public function view_basicinfo()
    {
        $number =AddressInfo::first();
         return view('home.basicinfo.view')->withNs($number);   
    }
// --------------------edit basicinfo--------------------
    public function edit_basicinfo($id)
    {
     if($id)
     {
        $user =AddressInfo::find($id);
        if($user != null)
        {
 return view('home.basicinfo.edit')->withNs($user);         
}
         
     }
     Session::flash('warning ',"address info does not exist.");
     return back();
    }
// --------------------update basicinfo--------------------
     public function update_basicinfo(Request $request)
    {
       $user =AddressInfo::find($request->id); 
       $user->phone=$request->phone;
       $user->phone1=$request->phone1;
      $user->address=$request->address;
      $user->email1=$request->email1;
      $user->email2=$request->email2;
     $user->save();
    $request->session()->flash('success', 'successfuly Updated!');
  return redirect()->action('HomeController@view_basicinfo');
    }

    //================== Question ============================================
    public function question()
    {
     $subject =Subject::get();   
return view('home.question.index')->withS($subject);   
    }

     public function post_question(Request $request)
    {
        $request->validate([
    
        'subject_id' => 'required',
    ]);
        $variable_q =$request->input('question');

        $variable =$request->input('option');
        $answer =$request->input('answer');
        $check =$request->input('check');
        $option_data =array();


        
    
foreach ($variable_q as $k => $v) {
    if(!empty($v)) {
 $question = new Question;
        $question->user_id =$this->user_id();
        $question->subject_id =$request->subject_id;
        $question->body =$v;

        $question->save();
   
        // get q0uestion id
      unset ($option_data);
        foreach ($check as $key => $value) {
           
 
            if(!empty($variable[$key]) && $k == $value)
            {
      
$correct_value =0;
           if( !empty($answer[$k]) && $answer[$k] == $key)
            {
              $correct_value =1;
            }
            
        $option_data [] =['subject_id' =>$request->subject_id,'question_id' =>$question->id,'option' =>$variable[$key], 'answer' => $correct_value];
   
}
    }
   

    if(!empty($option_data))
    {
         DB::table('options')->insert($option_data);
    }

   

     }
   }
  //  dd($option_data);

     $request->session()->flash('success', 'Question was successfuly Uloaded!');
          return back();
}
       
    public function view_question()
    {   $subject =Subject::get();   
        return view('home.question.view')->withS($subject);  
    } 

public function post_view_question(Request $request)
    {   $subject =Subject::get();   
    $question=Question::where('subject_id',$request->subject_id)->paginate(50);
    //dd($question);
    return view('home.question.view')->withS($subject)->withQ($question);
    } 


     public function edit_question(Request $request,$id)
    {
        if(isset($id))
        {
       $question=Question::where('id',$id)->first();
       if($question != null)
       {
         return view('home.question.edit')->withQ($question); 
       }
         
        }
 $request->session()->flash('warning','wrong input');
         return back();
      
    }

     public function update_question(Request $request)
    {
        $request->validate([
        'question' => 'required',
        'answer' => 'required',
    ]);
        $variable =$request->input('option');
        $answer =$request->input('answer');
       // store question
        $question =Question::find($request->id);

        $question->body =$request->question;
        $question->save();

        // get q0uestion id
       
        foreach ($variable as $key => $value) {
             $correct_value =0;
           if($key == $answer)
            {
              $correct_value =1;
            }
        $option_data  =['option' =>$value, 'answer' => $correct_value];
        DB::table('options')->where('question_id', $request->id)->where('id', $key)->update($option_data);
    }
    

     $request->session()->flash('success', 'Question was successfuly Updated!');
           return redirect()->action('HomeController@view_question');
    }

     public function remove_question(Request $request,$id)
    {
        $question =Question::where([['user_id',$this->user_id()],['id',$id]])->first();
        if(count($question) > 0)
        {
           $question->delete();
           Option::where('question_id',$id)->delete();
         $request->session()->flash('success', 'Question was successfuly delete!');
           return redirect()->action('HomeController@view_question');
        }
        $request->session()->flash('warning', 'Some thing went wrong!');
           return redirect()->action('HomeController@view_question');


        
    }

    //=====================profile ======================================
    public function profile()
    {
        $user =User::find($this->user_id());
        return view('home.profile.index')->withP($user);
    }
// edit profile
    public function edit_profile()
    {
        $user =User::find($this->user_id());
        return view('home.profile.edit')->withP($user);
    }

  // update profile
    public function update_profile(Request $request)
    {
        $user =User::find($this->user_id());
        $user->name=$request->name;
        $user->phone =$request->phone;
        $user->address=$request->address;
        $user->save();
        $request->session()->flash('success', 'Profile was successfuly Update!');
           return redirect()->action('HomeController@profile');
    }  


    // edit logo
    public function edit_logo()
    {
       return view('home.profile.edit_logo'); 
    }

    // update logo

    public function update_logo(Request $request)
    {
        $users = User::find($this->user_id());
     if(count($users) > 0)
     {
      if($request->hasFile('img_url')) {
            $image = $request->file('img_url');
            $filename = time() . '.' . $image->getClientOriginalExtension();
           $destinationPath = public_path('image/school');
            $img = Image::make($image->getRealPath());
            $img->resize(118, 32, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $filename);
        $users->img_url = $filename;
        $users->save();
      $request->session()->flash('success', 'Profile Logo was successfuly Update!');
         
          }
        
           return redirect()->action('HomeController@profile');
     }
    }

   // edit logo
    public function edit_profile_pic()
    {
       return view('home.profile.edit_profile_pic'); 
    }

    // update logo

    public function update_profile_pic(Request $request)
    {
        $users = User::find($this->user_id());
     if($users != null)
     {
      if($request->hasFile('img_url')) {
            $image = $request->file('img_url');
            $filename = time() . '.' . $image->getClientOriginalExtension();
           $destinationPath = public_path('image/teachers');
            $img = Image::make($image->getRealPath());
            $img->resize(150, 100, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $filename);
        $users->img_url = $filename;
        $users->save();
      $request->session()->flash('success', 'Profile Picture was successfuly Update!');
         
          }
        
           return redirect()->action('HomeController@profile');
     }
    }

// view cv
      public function view_cv()
  {
    $k =User::find(Auth::user()->id);
    //$contents = Storage::get($k->image);
    $c =$k->cv;

  return response()->file('cv/'.$c);
   }
   //===========================update cv =======================

   public function update_cv()
   {
      return view('home.profile.update_cv'); 
   }

   public function post_update_cv(Request $request)
    {
        $users = User::find($this->user_id());
     if($users != null)
     {

if($request->hasFile('cv')) {
          $filename = time() . '.' . $request->file('cv')->getClientOriginalExtension();
      $file = $request->file('cv')->move(public_path().'/cv/', $filename);
          
         $users->cv = $filename;
         $users->save();
          
$request->session()->flash('success', 'Profile Picture was successfuly Update!');
         }
          }
        
           return redirect()->action('HomeController@profile');
     
    }

    public function change_password()
    {
       return view('home.profile.change_password'); 
    }

    public function update_password(Request $request)
    {
        $request->validate(['password' => 'required|string|min:6|confirmed',]);
      $users = User::find($this->user_id());
      $users->password =bcrypt($request->password);
      $users->word =$request->password;
      $users->save();
      $request->session()->flash('success', 'password was successfuly Update!');
       return back(); 
    }


/*==========================================post ==========================*/
    public function post()
    {
  return view('home.post.index');
    }

    public function post2(Request $request)
    {
        $request->validate(['title' => 'required','message'=>'required']);
        $post= new Post;
            $post->title=$request->title;
            $post->user_id=Auth::user()->id;
           $post->message=$request->message;
            $post->status=1;
            $post->save();
   
        Session::flash('success',"successfull.");
        return back();
    }
// --------------------view post--------------------
    public function view_post()
    {
         $post =Post::paginate(50);
         return view('home.post.view')->withP($post);   
    }
// --------------------edit post--------------------
    public function edit_post($id)
    {
     if($id)
     {
        $post =Post::find($id);
        if($post != null)
        {
 return view('home.post.edit')->withP($post);         
}
         
     }
     Session::flash('warning ',"post does not exist.");
     return back();
    }
// --------------------update post--------------------
     public function update_post(Request $request)
    {
       $post =Post::find($request->id); 
       $post->title=$request->title;
       $post->message=$request->message;
      $post->save();
    $request->session()->flash('success', 'Post was successfuly Updated!');
  return redirect()->action('HomeController@view_post');
    }
// --------------------delete post--------------------
     public function delete_post(Request $request, $id)
    {
         $post =Post::destroy($request->id); 
         
          $request->session()->flash('success', 'post was successfuly Deleted!');
          return back();
    }



/*==========================================simulation ==========================*/
    public function simulation()
    {
      $s = Subject::get();
  return view('home.simulation.index')->withS($s);
    }

    public function simulation2(Request $request)
    {
        $request->validate(['subject_id' => 'required','link'=>'required']);
        $post= new Simulation;
            $post->link=$request->link;
           $post->topic=$request->topic;
           $post->subject_id=$request->subject_id;
            $post->status=1;
            $post->save();
   
        Session::flash('success',"successfull.");
        return back();
    }
// --------------------view simulation--------------------
    public function view_simulation()
    {
         $post =Simulation::paginate(50);
         return view('home.simulation.view')->withP($post);   
    }
// --------------------edit simulation--------------------
    public function edit_simulation($id)
    {
     if($id)
     {
        $post =Simulation::find($id);
        if($post != null)
        {
 return view('home.simulation.edit')->withP($post);         
}
         
     }
     Session::flash('warning ',"post does not exist.");
     return back();
    }
// --------------------update simulation--------------------
     public function update_simulation(Request $request)
    {
       $post =Simulation::find($request->id); 
       $post->link=$request->link;
       $post->subject_id=$request->subject_id;
      $post->save();
    $request->session()->flash('success', 'Simulation was successfuly Updated!');
  return redirect()->action('HomeController@view_simulation');
    }
// --------------------delete simulation--------------------
     public function delete_simulation(Request $request, $id)
    {
         $post =Simulation::destroy($request->id); 
         
          $request->session()->flash('success', 'Simulation was successfuly Deleted!');
          return back();
    }

    //======= pin ======================

    public function pin()
    {
       $number_school =$this->getSchool(self::Admin,self::Active);
       return view('home.pin.index')->withNs($number_school); 
    }
// post pin.
   public function post_pin(Request $request)
    {
    ini_set('max_execution_time', 980);    
    $request->validate(['number'=>'required','pin_lenght'=>'required',]);
$user_id =$request->user_id;

for ($i = 0; $i <=$request->number; $i++) {
  $rand = $this->generateRandomString($request->pin_lenght);
 
 $check =Pin::where('pin',$rand)->get()->count();
  if($check == 0)
  {
DB::table('pins')->insert(['pin'=>$rand,'user_id'=>$user_id,'status'=>0,'student_id'=>0,'counter'=>0]);
}
 else{

    $i--;
  }
}
$request->session()->flash('success', 'pin was successfuly created!');
return back();

    }
    // view pin 
    public function view_pin()
    { $number_school =$this->getSchool(self::Admin,self::Active);
     return view('home.pin.unused')->withNs($number_school);
    }

    public function view_pin2(Request $request)
    {
$number_school =$this->getSchool(self::Admin,self::Active);
$user_id =$request->user_id;
$pin =Pin::where([['status',0],['user_id',$user_id]])->paginate(1000);
return view('home.pin.unused')->withNs($number_school)->withp($pin)->withId($user_id);
    }

 // view used pin 

     public function view_used_pin()
    { $number_school =$this->getSchool(self::Admin,self::Active);
     return view('home.pin.used')->withNs($number_school);
    }
    public function view_used_pin2(Request $request)
    {
      $number_school =$this->getSchool(self::Admin,self::Active);
$user_id =$request->user_id;
$pin =Pin::where([['status',1],['user_id',$user_id]])->paginate(1000);
return view('home.pin.used')->withNs($number_school)->withp($pin)->withId($user_id);
       
    }
// export pin
     public function export_pin($id)
 {
  //return Excel::download(new PinExport($id), 'invoices.xlsx');

    return (new PinExport($id))->download('pin.xlsx');
 }   

//===========================cbt setup ==========================================
 //----------------------start button ----------------------------
 public function startbutton()
 {  
    
    $sb=StartButton::get();
    if(count($sb) == 0)
    {
        $sb ='';
    }
 $s=$this->getSchool(self::Admin,self::Active);
     return view('home.cbtsetup.startbutton')->withSb($sb)->withS($s);
}
// post
 public function post_startbutton(Request $request)
 {  
  $user_id =$request->user_id;

    $sb=StartButton::where('user_id',$user_id)->first();

    if($sb != null)
    {
$sb->status =$request->status;

    }else
    {
$sb=new StartButton;
$sb->status =$request->status;
$sb->user_id =$user_id;
    }
 $request->session()->flash('success', 'succcessfull!');   
$sb->save();
   return redirect()->action('HomeController@startbutton');
}


//----------------------Question number---------------------
 public function number_of_question()
 {  $noq=NumberOfQuestion::where('user_id',Auth::user()->id)->first();

    return view('home.cbtsetup.number_of_question')->withNoq($noq);
}
// post
 public function post_number_of_question(Request $request)
 {  
    $noq=NumberOfQuestion::where('user_id',Auth::user()->id)->first();

    if($noq != null)
    {
$noq->number =$request->number;

    }else
    {
$noq=new NumberOfQuestion;
$noq->number =$request->number;
$noq->user_id =Auth::user()->id;
    }
 $request->session()->flash('success', 'succcessfull!');   
$noq->save();
   return redirect()->action('HomeController@number_of_question');
}

//----------------------Time per Question ---------------------
 public function time_per_question()
 {  $tpq=TimePerQuestion::where('user_id',Auth::user()->id)->first();
if($tpq == null)
{
   $tpq =''; 
}
return view('home.cbtsetup.time_per_question')->withTpq($tpq);
}
// post
 public function post_time_per_question(Request $request)
 {  
    $tpq=TimePerQuestion::where('user_id',Auth::user()->id)->first();

    if($tpq != null)
    {
$tpq->time =$request->time;

    }else
    {
$tpq=new TimePerQuestion;
$tpq->time =$request->time;
$tpq->user_id =Auth::user()->id;
    }
 $request->session()->flash('success', 'succcessfull!');   
$tpq->save();
   return redirect()->action('HomeController@time_per_question');
}
//------------------------------- subject setup ----------------------------------

public function subject_setup()
{
   $sb=SubjectSetup::get()->groupBy('user_id');
  
    if(count($sb) == 0)
    {
        $sb ='';
    }
 $s=$this->getSchool(self::Admin,self::Active);
 $subj =Subject::get();

     return view('home.cbtsetup.subjectsetup')->withSb($sb)->withS($s)->withSubj($subj);
}

//------------------------- post ------------------------------
public function post_subject_setup(Request $request)
{
$subject_id =$request->subject_id;
$user_id =$request->user_id;


$check =SubjectSetup::where([['user_id',$user_id],['subject_id',$subject_id]])->count();

if($check == 0)
{
$sub = new SubjectSetup;
$sub->user_id = $user_id;
$sub->subject_id =$subject_id;
$sub->save();
 $request->session()->flash('success', 'succcessfull!');   
 return redirect()->action('HomeController@subject_setup');
}
 $request->session()->flash('warning', 'SubjectSetup exist already');   

   return redirect()->action('HomeController@subject_setup');
}

//=================== teacher  =================================
public function searchcreterial()
{
    $state =State::all();
   return view('home.teacher.index')->withS($state); 
}

public function post_searchcreterial(Request $request)
{
    $request->validate(['state' => 'required','lga'=>'required','status'=>'required']);
    $sc =SearchCriteria::where('user_id',$this->user_id())->first();
    if($sc != null)
    {
$sc->lga_id =$request->lga;
    $sc->state_id =$request->state;
    $sc->status =$request->status;
   $sc->save();
    }else
    {
    $s =new SearchCriteria;
    $s->user_id =$this->user_id();
    $s->lga_id =$request->lga;
    $s->state_id =$request->state;
    $s->status =$request->status;
    $s->likes =0;
    $s->save();
}
    $request->session()->flash('success', 'succcessfull!');
     return redirect()->action('HomeController@index');
   
}

// ---------------------- subjectteacher ----------------------
public function subjectteacher()
{
    $sub =Subject::all();
    return view('home.teacher.subject')->withS($sub); 
}
//------------------ post subjectteacher -------
public function post_subjectteacher(Request $request)
{
     $c =$request->input('check');
     if($c == null)
     {
        return back();
     }
     $d =array();
     foreach ($c as $key => $value) {
        $check =SubjectTeacher::where([['user_id',$this->user_id()],['subject_id',$value]])->count();
        if($check == 0)
        {
           $d [] = ['user_id'=>$this->user_id(),'subject_id'=>$value];
        }
    }
DB::table('subject_teachers')->insert($d);
return redirect()->action('HomeController@index');
 
}
// ========================= setup must be ready before examination ==================

//==============================  students ========================
public function view_students()
{
  $school =$this->getSchool(self::Admin,self::Active);
$students =Student::where('user_id',$this->user_id())->orderBy('id','DES')->paginate(100);
        return view('home.student.index')->withS($school);
}

public function post_view_students(Request $request)
{
  $school =$this->getSchool(self::Admin,self::Active);
$students =Student::where('user_id',$request->user_id)->orderBy('id','DES')->paginate(100);
$school_name =User::find($request->user_id);
        return view('home.student.index')->withS($school)->withSs($students)->withSn($school_name);
}
public function students_score()
{
    $school =$this->getSchool(self::Admin,self::Active);

        return view('home.student.score')->withS($school);
}

public function post_students_score(Request $request)
{
  $school =$this->getSchool(self::Admin,self::Active);

    $students =Student::where([['user_id',$request->user_id],['exam_status',1]])->orderBy('id','DES')->paginate(100);
  $school_name =User::find($request->user_id);
    return view('home.student.score')->withS($school)->withSs($students)->withSn($school_name);
}

//========================== new teacher ===============================================
public function new_teacher()
{
     $teacher = DB::table('users')
            ->join('user_roles', 'users.id', '=', 'user_roles.user_id')
            ->where('user_roles.role_id',self::Teacher)
            ->where('users.status',self::NonActive)
           ->get();
   return view('home.teacher.new_teacher')->withT($teacher);        

}

public function approved_teacher(Request $request,$id)
{
  $u =User::find($id);
  $u->status =1;
  $u->save();
$request->session()->flash('success', 'succcessfull!');
return back();

}

}
