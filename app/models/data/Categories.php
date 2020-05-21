<?php

namespace App\models\data;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Categories extends Model
{
      protected $table = "categories";
      public function MyCategories($company_id){
        $cate = new Categories();
        return $cate->where("company_id",$company_id)->get();
      }
       public function checkCategory($name){
        $cate = new Categories();
        $company = Session::get("company");
        return $cate->where("cate_name",$name)
               ->where("company_id",$company->id)->first();

      }
       public function saveCategory($input){
        $request = (object)$input;
        $splash_logo = $request->file('splash_logo');

        if($request->file('splash_logo')!=null){
            $splash_name = time().'_'.$splash_logo->getClientOriginalName();
            $destinationPath = public_path($this->imagePath);
            $splash_logo->move($destinationPath, $splash_name);
        }
        $company = Session::get("company");
        $type = new Categories();
        $type->cate_name = $request->name;
        $type->company_id = $company->id;
        $type->image = $this->imagePath.$splash_name;
        $data = $type->save();
        return $data;
    }
     public function updateCategory($input){
        $request = (object)$input;
        $splash_logo = $request->file('splash_logo');
        if($request->file('splash_logo')!=null){
            $splash_name = time().'_'.$splash_logo->getClientOriginalName();
            $destinationPath = public_path($this->imagePath);
            $splash_logo->move($destinationPath, $splash_name);
        }
        $company = Session::get("company");
        $type = new Categories();
        $type = $type->find($request->id);
        $type->cate_name = $request->name;
        $type->company_id = $company->id;
        if($splash_logo!=null) {
        $type->image = $this->imagePath.$splash_name;
        }
        $data = $type->save();
        return $data;
    }
     public function searchCategories($id){
        $company = Session::get("company");
        $cate = new Categories();
        return $cate->where("company_id",$company->id)
               ->where("id",$id)->first();
    }
    public function deleteCategory($id){
        $company = Session::get("company");
        $cate = new Categories();
        return $cate->where("company_id",$company->id)->where("id",$id)->delete();
    }
}
