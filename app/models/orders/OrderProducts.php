<?php

namespace App\models\orders;

use Illuminate\Database\Eloquent\Model;
use App\models\data\Products;

class OrderProducts extends Model
{
     protected $table = "order_products";
     public function saveProducts($data,$userId,$order_id){

         $order = new OrderProducts();
         $order->product_name = $data['product_name'];
         $order->product_id = $data['product_id'];
         $order->price =  $data['price'];
         $order->quantity =  $data['quanity'];
         $order->user_id =  $userId;
         $order->card_order_product_id = $order_id;
         return $order->save(); 
     }
     public function getOrderDetails($userId,$orderId){
         $order = new OrderProducts();
         return $order->where("user_id",$userId)
                ->where("card_order_product_id",$orderId)->get();
     }
      public function getOrderDetailsList($userId,$orderId){
         $order = new OrderProducts();
         return $order->where("user_id",$userId)
                ->where("card_order_product_id",$orderId)->with('product_image')->get();
     }
     function product_image(){
            return $this->hasOne(Products::class,"id","product_id");
         
     }
    
}
