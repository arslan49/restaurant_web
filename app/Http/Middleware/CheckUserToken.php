<?php

namespace App\Http\Middleware;
use Closure;
use Auth;
use Illuminate\Support\Facades\Response;
use App\models\auth\User_token;
class CheckUserToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
         $token = $request->header('token');
        $userToken  = new User_token();
        $userToken =  $userToken->checkUserToken($token);
         if($userToken){
             /*echo ($userToken);
             die();*/
            $request->user_id = $userToken->user_id;
          //  $request->role_id = $userToken->role_id;
            return $next($request);
         }else{
            return Response::json([
                "status"=>404,
                "error" =>"Session expire! Please login again"
            ]);
        }
    }
}
