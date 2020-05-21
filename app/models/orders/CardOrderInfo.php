<?php

namespace App\models\orders;

use Illuminate\Database\Eloquent\Model;
use App\models\auth\Users;
use Illuminate\Support\Facades\Session;

class CardOrderInfo extends Model
{
         protected $table = "order_card_info";

         public function saveOrderInfo($input,$user_id){
            $card  =  new  CardOrderInfo();
            $card->token_id = $input['TokenID'];
            $card->address = $input['Address'];
            $card->created = $input['created'];
            $card->exp_month = $input['exp_month'];
            $card->exp_year = $input['exp_year'];
            $card->country = $input['country'];
            $card->brand = $input['brand'];
            $card->last4 = $input['last4'];
            $card->user_id = $user_id;
            $card->company_id = $input['company_id'];
            $card->is_delivered = false;
            $card->save();
            return $card->id;
         }
         public function getOrders($status){
              $card  =  new  CardOrderInfo();
              $company  = Session::get("company");
              return $card->where("is_delivered",$status)
                    ->where("company_id",$company->id)->with('user')->get();
         }
          public function getUserOrders($userID){
              $card  =  new  CardOrderInfo();
               $card = $card->where("user_id",$userID)
                    ->get();
                    return  $card->makeHidden(["token_id","brand",
                            "last4","exp_year","exp_month"]);
         }
         public function user(){
            return $this->hasOne(Users::class,"id","user_id");
         }

        function orderDone($user_id,$order_id){
             $card  =  new  CardOrderInfo();
             $card = $card->where("id",$order_id)->where("user_id",$user_id)->first();
             
             if($card){
              $card->is_delivered = true;
               return $card->save();
             }
             return false;
        }
        function orderDetails($order_id){
             $card  =  new  CardOrderInfo();
             $company  = Session::get("company");
             return $card->where("id",$order_id)
                    ->where("company_id",$company->id)->first();
        }
        function completeOrder($order_id){
             $card  =  new  CardOrderInfo();
             $company  = Session::get("company");
             $card = $card->where("id",$order_id)->where("company_id",$company->id)->first();
             if($card){
              $card->is_delivered = true;
               return $card->save();
             }
             return false;
        }
}
