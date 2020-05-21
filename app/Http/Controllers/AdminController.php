<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\auth\Users;
use Illuminate\Support\Facades\Session;
use App\models\company\Companies;

class AdminController extends Controller
{

     public function loginAdminView(Request $request){
     return View("admin.admin.login");
     }
     public function loginAdmin(Request $request){
           $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);
        $users  = new Users();
        if($users->checkEmail($request->email)){
            $users = $users->loginAdmin($request);
            if($users){
              Session::put('admin', $users);
              return view("admin.index");
            }else{
               return back()->with("error","Incorrect email/password");
            }
           
         }else{
         return back()->with("error","Email not exist");
        }
      }
      public function requestCompany($status){
          $company = new Companies();
          $company = $company->getCompanyRequest($status);
          
         if ($company){
               return view("admin.company.view_companies",compact('company'));
         }else{
          return view("admin.company.view_companies")->with("error","No request found");
         }
      }
      public function approvedCompany($company_id){
          $company = new Companies();
          $company = $company->approvedCompany($company_id);
          if($company){
              return redirect("requestcompany/1")->with("success","Company approved  successfully");
          }
          else{
              return redirect("requestcompany/0")->with("error","Company approved  successfully");
          }
      }
      
}
