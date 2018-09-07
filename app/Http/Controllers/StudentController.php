<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Subject;
use App\StartButton;
use App\NumberOfQuestion;
use App\TimePerQuestion;
use App\StudentSubject;
use App\Question;
use App\Option;
use App\Score;
use DB;
use Auth;
use Session;

class StudentController extends Controller
{
    //use MyTrait;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:std');
    }

    public function index()
    {
    $sb=StartButton::where('user_id',auth::guard('std')->user()->user_id)->first();
    $noq=NumberOfQuestion::first();
    $tpq=TimePerQuestion::first();
    if($sb->status == 1)
    {
        if(empty($noq) && empty($tpq) )
        {
           $exams_status = 0; 
        }
$exams_status = 1;
    }else
    {
      $exams_status = 0;
    }
    	$student =Student::find(auth::guard('std')->user()->id);
      $subject=StudentSubject::where('student_id',auth::guard('std')->user()->id)->get();
    	return view('student.index')->withS($student)->withEs($exams_status)->withSb($subject);
    }

    // ===================startexams====================
    public function startexams()
    {
      $no_question =NumberOfQuestion::first();
      $timeperquestion=TimePerQuestion::first();
      $subject=StudentSubject::where('student_id',auth::guard('std')->user()->id)->get();

      foreach ($subject as $key => $value) {
        $subject_name =Subject::find($value->subject_id); 
      }
     // dd($subject_name);

      $numofsubject =Count($subject);
      $time =$timeperquestion->time * $numofsubject * 60;
     
  return view('student.startexams7')->withSub($subject)->withNq($no_question)->withT($time);
    }
    // student result
    public function student_result(Request $request)
    {
      //$input = $request->all();
      $nq=$request->number_question;
      $input = $request->except('_token','number_question');
    //  dd($input);
//dd($nq);
      foreach ($input as $key => $value) {
$option_id[] =[$value];
      }
   //var_dump($option_id);
    $option =Option::select(DB::raw('count(*) as score,subject_id'))
    ->whereIn('id',$option_id)->where('answer',1)->groupBy('subject_id')->get();
    //dd($option);

    if(count($option) > 0)
    {
      foreach ($option as $key => $v) {
       $newscore = $v->score / $nq;
        $newscore =  $newscore *100;
       $data[]=['student_id'=>auth::guard('std')->user()->id,'user_id'=>auth::guard('std')->user()->user_id,'subject_id'=>$v->subject_id,'score'=>$newscore];
      }
      DB::table('scores')->insert($data);
    }
     
$update =Student::find(auth::guard('std')->user()->id);
$update->exam_status = 1;
$update->save();
 $request->session()->flash('success', 'examination result was successfull submited.');
   return redirect('success');
  }

  public function success()
  {
    return view('student.success');
  }
  // ------------------------- viewresult ---------------------------------

  public function viewresult()
  {
    $subject=StudentSubject::where('student_id',auth::guard('std')->user()->id)->get();
    $score =Score::where('student_id',auth::guard('std')->user()->id)->get();
    return view('student.viewresult')->withSc($score)->withSb($subject);
  }
}
