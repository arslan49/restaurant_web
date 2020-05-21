<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\company\Companies;
use Illuminate\Support\Facades\Session;
use App\models\data\Categories;
use App\models\data\Products;
use App\models\orders\CardOrderInfo;
use App\models\orders\OrderProducts;

class RestController extends Controller
{
       public function RegisterCompany(Request $request){

       
        $this->validate($request, [
            'email' => 'required',
            'name' => 'required',
            'password' => 'required',
            'phone_number' => 'required',
            'city' => 'required',
            'address' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'logo' => 'required|image|mimes:jpeg,png,jpg|max:1024',
        ]);
        $company = new Companies();

        if(!$company->checkPhoneNumber($request->phone_number)) {

          if(!$company->checkEmail($request->email)) {
        $company = $company->saveCompany($request);
        if($company){
            return redirect("/")->with("success","Succesfully registered");
         }else{
            return back()->with("error","Sorry try again");
       }
       }else{
        return back()->with("error","Email Already Exist");
        }
        }else{
        return back()->with("error","Phone Number Already Exist");

        }
      }

      public function loginCompany(Request $request){
           $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);
        $company  = new Companies();
        if($company->checkEmail($request->email)){
          if($company->isEnable($request->email)) {
            $company = $company->loginUser($request);
            if($company){
              Session::put('company', $company);
              return view("admin.index");
            }else{
               return back()->with("error","Incorrect email/password");
            }
            }else{
               return back()->with("error","Acccount not approved yet");
            }
         }else{
         return back()->with("error","Email not exist");
        }
      }
      public function addCategoryView(){
            return view("admin.category.add_category");
      }
      public function addCategoryAction(Request $request){

       $this->validate($request, [
            'name' => 'required',
            'splash_logo' => 'required|image|mimes:jpeg,png,jpg|max:1024',
        ]);
         $company  = new Companies();
         $cat = new Categories();
         if($cat->checkCategory($request->name)){
               return back()->with("error","Already name exist");
         }else{
               $cat = $cat->saveCategory($request);
               if($cat){
                    return back()->with("success","Category created");
               }else{
                   return back()->with("error","Sorry try again");
               }
         }

      }
      public function viewCategory(){
         $cat = new Categories();
         $company = Session::get("company");
         $cat =  $cat->MyCategories($company->id);
         return view("admin.category.view_cat",compact('cat'));
      }
      public function editCategoryView($id)
      {
             $cat = new Categories();
             $cat = $cat->searchCategories($id);
             if($cat){
                 return view("admin.category.edit_cat",compact('cat'));
               }else{
                return back()->with("error","Sorry try again");
              }

     }
     public function deleteCategory($id){
         $cat = new Categories();
         if($cat->deleteCategory($id)){
             return redirect("viewcategory")->with("success","Deleted successfully");
         }
         else{
         return back()->with("error","Sorry try again");
         }
     }
     public function editCategoryAction(Request $request){
     
      $this->validate($request, [
            'name' => 'required',
            'id' => 'required',
        ]);
            $cat = new Categories();
            $cat->updateCategory($request);
            if($cat){
             return redirect("viewcategory")->with("success","Updated successfully");
            }else{
              return back()->with("error","Sorry try again");
            }
     }
     public  function getProductsView($id){
      $products = new Products();
      $company = Session::get("company");
      $products = $products->MyProducts($company->id,$id);
    
      return view("admin.product.view_products",compact("products"));
     }
     public function addProductView(){
         $company = Session::get("company");
         $cat = new Categories();
         $cat =  $cat->MyCategories($company->id);
         return view("admin.product.add_product",compact('cat'));
     }
     public function addProductAction(Request $request){
      $this->validate($request, [
            'name' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'category' => 'required',
            'splash_logo' => 'required|image|mimes:jpeg,png,jpg|max:1024',

        ]);
        $products = new Products();
        $products= $products->saveProduct($request);
        if($products){
            return back()->with("success","Product created");
             }else{
             return back()->with("error","Sorry try again");
        }
     }
     public function editProductView($id){
         $company = Session::get("company");
         $cat = new Categories();
         $products = new Products();
         $products =  $products->searchProduct($id);
         $cat =  $cat->MyCategories($company->id);
         return view("admin.product.edit_product",compact('cat','products'));
     }
    public function editProductAction(Request $request){
      $this->validate($request, [
            'name' => 'required',
            'price' => 'required',
            'id' => 'required',
            'stock' => 'required',
            'category' => 'required',

        ]);
        $products = new Products();
        $products= $products->editProduct($request);
        if($products){
            return redirect("getproductsview/".$request->category)->with("success","Updated product successfully");
             }else{
             return back()->with("error","Sorry try again");
        }
     }
     public function  getOrders($status){
         $order  = new CardOrderInfo();
         $order =  $order->getOrders($status);
       
         return view("admin.orders.new_orders",compact('order'));
     }
     public function getOrderDetails($user_id,$order_id,$status){
         $prod = new OrderProducts();
         $prod = $prod->getOrderDetails($user_id,$order_id);
         return view("admin.orders.product_list_in_order",compact('prod','order_id','status'));
     }
     public function cardDetails($order_id){
       $order  = new CardOrderInfo();
       $order = $order->orderDetails($order_id);
       return view("admin.orders.card_details",compact('order'));
      }
     public function completeOrder(Request $request){
           if($request->order_id==null){
            return back()->with("error","Sorry try again");
           }
           $order  = new CardOrderInfo();
           if($order->completeOrder($request->order_id)){
             return redirect('getorders/1')->with("success","Order completed successfully");
           }else{
             return back()->with("error","Sorry try again");
           }
     }
}

