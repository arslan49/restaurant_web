<?php

namespace App\models\data;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Products extends Model
{
      protected $table = "products";
      public function MyProducts($company_id,$cat_id){
        $prod = new Products();
        return $prod->where("company_id",$company_id)
               ->where("category_id",$cat_id)->get();
      }
      public function searchProduct($id){
        $prod = new Products();
        return $prod->find($id);
      }
      public function saveProduct($input){
        $prod = new Products();
        $request = (object)$input;
        $splash_logo = $request->file('splash_logo');
        if($request->file('splash_logo')!=null){
            $splash_name = time().'_'.$splash_logo->getClientOriginalName();
            $destinationPath = public_path($this->imagePath);
            $splash_logo->move($destinationPath, $splash_name);
        }
        $company = Session::get("company");
        $prod->product_name =  $request->name;
        $prod->price =  $request->price;
        $prod->category_id =  $request->category;
        $prod->company_id =  $company->id;
        $prod->stock =  $request->stock;
        $prod->image =  $this->imagePath.$splash_name;
        return $prod->save();
      }
       public function editProduct($input){
        $prod = new Products();
        $request = (object)$input;
        $splash_logo = $request->file('splash_logo');
        if($request->file('splash_logo')!=null){
            $splash_name = time().'_'.$splash_logo->getClientOriginalName();
            $destinationPath = public_path($this->imagePath);
            $splash_logo->move($destinationPath, $splash_name);
        }
        $company = Session::get("company");
        $prod = $prod->find($request->id);
        $prod->product_name =  $request->name;
        $prod->price =  $request->price;
        $prod->category_id =  $request->category;
        $prod->company_id =  $company->id;
        $prod->stock =  $request->stock;
        if($splash_logo) {
        $prod->image =  $this->imagePath.$splash_name;
        }
        return $prod->save();
      }
}
