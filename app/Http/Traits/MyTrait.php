<?php
namespace App\Http\Traits;
use DB;
use Auth;


trait MyTrait {


   public function user_id()
   {
    return Auth::user()->id;
   }

   public function getSchool($admin,$active)
   {
    $number_school = DB::table('users')
            ->join('user_roles', 'users.id', '=', 'user_roles.user_id')
            ->where('user_roles.role_id',$admin)
            ->where('users.status',$active)
            ->paginate(50);
            return $number_school;
            
   }

      public function g_rolename($id){
        $user = DB::table('roles')
            ->join('user_roles', 'roles.id', '=', 'user_roles.role_id')
            ->where('user_roles.user_id',$id)
            ->first();
            return $user->name;
    }

    /*--------------------------------------function  --------------------------------------------------*/
 private function generateRandomString($length) {
        $characters = '123456789ABCDEFGHIJKLMNPQRSTUVWXYZabcdeghnqrty';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
     }  


}