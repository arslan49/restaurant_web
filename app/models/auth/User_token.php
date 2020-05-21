<?php

namespace App\models\auth;

use Illuminate\Database\Eloquent\Model;

class User_token extends Model
{
     protected $table = 'user_tokens';
    protected $fillable = ['user_id','token'];
    
    public function checkUserToken($token)
    {
    	// $token = DB::table('user_tokens')
		   //  ->where('token',$token)->first();
    	 $token = User_token::where('token',$token)->first();
		    //print_r($token);die();
		    if ($token) {
		    	return $token;
		        // return true;
		    }else{
               return false;
            }
		    
    }
    public function saveToken($userId,$tokens){
        $token = new User_token();
        $token->token = $tokens;
        $token->user_id=$userId;
        return $token->save();
    }
    public function deleteUser($userId){
        return self::where('user_id',$userId)->delete();
    }
}
