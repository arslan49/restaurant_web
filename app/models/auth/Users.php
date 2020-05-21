<?php

namespace App\models\auth;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use stdClass;
use Illuminate\Support\Str;

class Users extends Model
{
    //
     protected $table = "users";

     protected $hidden = ['password', 'remember_token'
                         ,'email_verified_at','remember_token'];
     
    public function loginUser($input){
        $request = (object)$input;
        $user = self::where("email",$request->email)->first();
        if($user){
            if(Hash::check($request->password,$user->password)) {
                $userData = new stdClass();
                $userData->id = $user->id;
                $userData->name = $user->name;
                $userData->email= $user->email;
                $userData->phone_number = $user->phone_number;
                $userData->city = $user->city;
                $userData->address = $user->address;
                return $userData;
            }else{
                return false;
            }
        }else {
            return false;
        }
    }
    public function checkEmail($email)
    {
        return self::where("email", $email)->first();
    }
   
    public function checkPhoneNumber($number)
    {
        return self::where("phone_number", $number)->first();
    }
    public function getUserProfile($id){
     $user =  new  Users();
     
     return$user->where("id",$id)->first();
    }
    public function saveUser($input){
     $request = (object)$input;
     $user =  new  Users();
     $user->name = $request->name;  
     $user->email = $request->email;  
     $user->phone_number = $request->phone_number;  
     $user->city = $request->city;  
     $user->address = $request->address;  
     $user->password = bcrypt($request->password);
     return $user->save();
     }
     public function checkRealUser($input){
         $request = (object)$input;
         $user =  new  Users();
         return  $user->where("email",$request->email)
                     ->where("phone_number",$request->phone_number)
                     ->first();
     }
     public function updatePassword($input){
         $request = (object)$input;
         $user =  new  Users();
         $user = $user->where("email",$request->email)
                     ->where("phone_number",$request->phone_number)
                     ->first();
        $user->password =  bcrypt($request->password);
        return $user->save();
    }
    public function loginAdmin($input){
        $request = (object)$input;
        $user = self::where("email",$request->email)->first();
        if($user){
            if(Hash::check($request->password,$user->password)) {
                return $user;
            }else{
                return false;
            }
        }else {
            return false;
        }
    }
}
