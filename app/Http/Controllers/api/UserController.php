<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Validator;
use Illuminate\Support\Str;
use App\models\auth\User_token;
use App\models\auth\Users;
use App\models\company\Companies;
use App\models\data\Categories;
use App\models\data\Products;
use App\models\orders\CardOrderInfo;
use App\models\orders\OrderProducts;


class UserController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "email" => "required",
            "password" => "required",
        ]);

        if ($validator->fails()) {
            return response()->json([
                "status" => 400,
                "error" => $validator->errors()
            ]);
        }

        $users = new  Users();
        $user = $users->checkEmail($request->email);

        if ($user) {
            if ($users->loginUser($request)) {
                $random = Str::random(32);
                $user_token = new User_token();
                $user_token->deleteUser($user->id);
                $user_token->saveToken($user->id, $random);
                return response()->json([
                    "status" => 200,
                    "success" => "successfuly login",
                    "token" => $random,
                    "email" => $user->email,
                    "name" => $user->name,
                ]);
            } else {
                return response()->json([
                    "status" => 204,
                    "error" => "wrong email and password"
                ]);
            }
        } else {
            return response()->json([
                "status" => 204,
                "error" => "email doesn't exit"
            ]);
        }
    }
    function getCompanies(Request $request){
      $validator = Validator::make($request->all(), [
            "latitude" => "required",
            "longitude" => "required",
        ]);

        if ($validator->fails()) {
            return response()->json([
                "status" => 400,
                "error" => $validator->errors()
            ]);
        }
        $comp = new Companies();
        $comps = $comp->getCompanies($request->latitue,$request->longitude);
        if($comps) {

            return response()->json([
                    "status" => 200,
                    "data" => $comps
             ]);

        }
        else{
           $other = $comp->getAllCompanies();
            return response()->json([
                    "status" => 200,
                    "data" => '',
                     "other"=>$other
             ]);
        }
    }
    function MyCategories(Request $request){
         $validator = Validator::make($request->all(), [
            "company_id" => "required",
        ]);

        if ($validator->fails()) {
            return response()->json([
                "status" => 400,
                "error" => $validator->errors()
            ]);
        }
        $cate = new Categories();
        $cate = $cate->MyCategories($request->company_id);
        if($cate){
                 return response()->json([
                    "status" => 200,
                    "data" => $cate
                ]);
         }else{
               return response()->json([
                    "status" => 204,
                    "message" => "No result found"
                ]);
         }
    }
    function MyProduct(Request $request){

        $validator = Validator::make($request->all(), [
            "company_id" => "required",
            "category_id" => "required",
        ]);

        if ($validator->fails()) {
            return response()->json([
                "status" => 400,
                "error" => $validator->errors()
            ]);
        }
         $prodcut = new Products();
         $prodcut = $prodcut->MyProducts($request->company_id,
                              $request->category_id);
            if($prodcut){
                 return response()->json([
                    "status" => 200,
                    "data" => $prodcut
                ]);
         }else{
               return response()->json([
                    "status" => 204,
                    "message" => "No result found"
                ]);
         }
    }
    public function registerUser(Request $request){
      $validator = Validator::make($request->all(), [
            "name" => "required",
            "email" => "required",
            "password" => "required",
            "phone_number" => "required",
            "city" => "required",
            "address" => "required",
        ]);

        if ($validator->fails()) {
            return response()->json([
                "status" => 400,
                "error" => $validator->errors()
            ]);
        }
        $user = new  Users();
        if(!$user->checkEmail($request->email)){
            if(!$user->checkPhoneNumber($request->phone_number)){
                 $user = $user->saveUser($request);
                 if($user){
                     return response()->json([
                     "status" => 200,
                     "message"=>"Account successfully created"
                    ]);
                   }else{
                   return response()->json([
                    "status" => 204,
                    "message" => "Sorry try again"
                ]);
                    }
            }else{
            return response()->json([
                    "status" => 204,
                    "message" => "Phone Number already exist"
                ]);
            }
        }else{
          return response()->json([
                    "status" => 204,
                    "message" => "Email already exist"
                ]);
        }
     }
     public function getUserProfile(Request $request){
        $users = new  Users();
        $users = $users->getUserProfile($request->user_id);
        if($users){
          return response()->json([
                    "status" => 200,
                    "data" => $users
                ]);
        }else{
           return response()->json([
                    "status" => 204,
                    "message" => "sorry try again"
               ]);
        }
     }
     public function saveOrder(Request $request){
      $users = json_decode($request->getContent(),true);
      // return response()->json($users);
       $card_info  = $users['card_info'];
       $data  = $users["data"];
       $card = new CardOrderInfo();
       $order_id =  $card->saveOrderInfo($card_info,$request->user_id);
       $prod = new  OrderProducts();
       foreach($data as $list){
         $prod->saveProducts($list,$request->user_id,$order_id);
       }
       if($order_id) {
       return response()->json([
                    "status" => 200,
                    "message" => "Congratulation order placed successfully"
                ]);
        }else{
         return response()->json([
                    "status" => 204,
                    "message" => "sorry try again"
               ]);
        }
     }  
     public function getUserOrders(Request $request){
          $card = new CardOrderInfo();
          $card = $card->getUserOrders($request->user_id);
          if($card){
          return response()->json([
                    "status" => 200,
                    "data" => $card
                ]);
        }else{
           return response()->json([
                    "status" => 204,
                    "message" => "No result found"
           ]);
        } 
     }
     public function getMyOrderProducts(Request $request){

       $validator = Validator::make($request->all(), [
            "order_id" => "required",
        ]);

        if ($validator->fails()) {
            return response()->json([
                "status" => 400,
                "error" => $validator->errors()
            ]);
        }
        $prod = new  OrderProducts();
         $prod = $prod->getOrderDetailsList($request->user_id,$request->order_id);
         if($prod){
          return response()->json([
                    "status" => 200,
                    "data" => $prod
                ]);
        }
     }
     public function completeOrder(Request $request){
       $validator = Validator::make($request->all(), [
            "order_id" => "required",
        ]);

        if ($validator->fails()) {
            return response()->json([
                "status" => 400,
                "error" => $validator->errors()
            ]);
        }
         $card = new CardOrderInfo();
         $card=  $card->orderDone($request->user_id,$request->order_id);
         if($card){
          return response()->json([
                    "status" => 200,
                    "data" => "successfully update"
                ]);
        }else{
          return response()->json([
                    "status" => 204,
                    "message" => "sorry try again"
               ]);
        }
        
     }
     public function checkUser(Request $request){
         $validator = Validator::make($request->all(), [
            "email" => "required",
            "phone_number" => "required",
        ]);

        if ($validator->fails()) {
            return response()->json([
                "status" => 400,
                "error" => $validator->errors()
            ]);
        }
        $user = new  Users();
        $user = $user->checkRealUser($request);
        if($user){
         return response()->json([
                    "status" => 200,
                    "data" => ""
                ]);
        }else{
          return response()->json([
                    "status" => 204,
                    "data" => ""
                ]);}

     }
     public function updatePassword(Request $request){

      $validator = Validator::make($request->all(), [
            "email" => "required",
            "phone_number" => "required",
            "password" => "required",

        ]);

        if ($validator->fails()) {
            return response()->json([
                "status" => 400,
                "error" => $validator->errors()
            ]);
        }
        $user = new  Users();
        $user = $user->updatePassword($request);
        if($user){
         return response()->json([
                    "status" => 200,
                ]);
        }else{
          return response()->json([
                    "status" => 204,
                ]);}

     }
}
