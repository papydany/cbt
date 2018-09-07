<?php

namespace App;
use DB;
use App\Option;
use Auth;
class General
{
	public function Getoption($id)
	{
$option = Option::where('question_id',$id)->get();
return $option;
	}

 public function getrolename($id){
        $user = DB::table('roles')
            ->join('user_roles', 'roles.id', '=', 'user_roles.role_id')
            ->where('user_roles.user_id',$id)
            ->first();
            return $user->name;
    }
    // get user
 	public function GetUser($id)
	{
$u = User::find($id);
if($u !=  null)
{
return $u;	
}
}   	

//======= subjectsetup =================

public function subjectsetup($id)
{
  $s =SubjectSetup::where('user_id',$id)->get();
  if(count($s) == 0)
  {
   $s = ''; 
  }
  return $s;
}
// subject

public function subject($id)
{
  $sub =Subject::find($id);
  if($sub != null)
  {
    return $sub;
  }
}

// students subject
public function getStudentSubject($student_id)
{
  $sub =StudentSubject::where('student_id',$student_id)->get();
  if(count($sub) > 0)
  {
    return $sub;
  }
}

// teacher subject
public function getTeacherSubject($teacher_id)
{
  $sub =SubjectTeacher::where('user_id',$teacher_id)->get();
  if(count($sub) > 0)
  {
    return $sub;
  }
}
public function getScore($student_id)
{
  $sub =Score::where('student_id',$student_id)->get();
  if(count($sub) > 0)
  {
    return $sub;
  }
}

 public function question($subject_id,$no_question)
 {
   $question =Question::where('subject_id',$subject_id)->get()->random($no_question)->shuffle();
   return $question;
 }

 public function option($question_id)
 {  $option =Option::where('question_id',$question_id)->where('answer',0)->get()->random(3);
$option_1 =Option::where('question_id',$question_id)->where('answer',1)->get();
  $option_r = $option->merge($option_1)->shuffle();

 return $option_r;

 }

public function getState($id)
{
  $s =State::find($id);
  return $s;
}
public function getlga($id)
{
  $s =Lga::find($id);
  return $s;
}
public function getbasicinfo()
{
  $a =AddressInfo::first();
  if($a == null)
  {
    $a ='';
  }
  return $a;
}
}