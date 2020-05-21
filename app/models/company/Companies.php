<?php

namespace App\models\company;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use stdClass;

class Companies extends Model
{
      protected $table = "companies";
      private $imagePath ='images/companies/';
      protected $hidden = ['password', 'remember_token'];

      public function  saveCompany($input){
        $request = (object)$input;
        $splash_logo = $request->file('logo');

       // if($request->file('logo')!=null){
            $splash_name = time().'_'.$splash_logo->getClientOriginalName();
            $destinationPath = public_path($this->imagePath);
            $splash_logo->move($destinationPath, $splash_name);
      //  }
      
        $type = new Companies();
        $type->email = $request->email;
        $type->username = $request->name;
        $type->password = bcrypt($request->password);
        $type->phone_number = $request->phone_number;
        $type->image = $this->imagePath.$splash_name;
        $type->company_image = $this->imagePath.$splash_name;
        $type->city = $request->city;
        $type->address = $request->address;
        $type->latitude = $request->latitude;
        $type->longitude = $request->longitude;
        $type->is_approved = false;
        $data = $type->save();
        return $data;
      }

     public function getCompanies($lat, $long){
      $data = array();
      $company = new Companies();
      $company = $company->all();
      if($company){
      foreach($company as $list) {
      $dis = $this->distance1($lat,$long,$list->latitude,$list->longitude);
      $dis  = $dis-2190;
       if($dis<100) { 
       $data[] = [
        'data' => $list,
        'distance' => $dis
          ];
    }
  //  }
     }
       return $data;
     }
      else {
        return false;
        }

     }
   function distance($lat1, $lon1, $lat2, $lon2) {

      $theta = $lon1 - $lon2;
      $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
      $dist = acos($dist);
      $dist = rad2deg($dist);
      $miles = $dist * 60 * 1.1515;
      return $miles * 1.609344;
    
   }
   function distance1($lat1 = 0, $lng1 = 0, $lat2 = 0, $lng2 = 0, $miles = true)
{
  $pi80 = M_PI / 180;
  $lat1 *= $pi80;
  $lng1 *= $pi80;
  $lat2 *= $pi80;
  $lng2 *= $pi80;
  
  $r = 6372.797; // mean radius of Earth in km
  $dlat = $lat2 - $lat1;
  $dlng = $lng2 - $lng1;
  $a = sin($dlat / 2) * sin($dlat / 2) + cos($lat1) * cos($lat2) * sin($dlng / 2) * sin($dlng / 2);
  $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
  $km = $r * $c;
  
  return (int)($miles ? ($km * 0.621371192) : $km);
}
 public function checkEmail($email){
      $company = new Companies();
      return $company->where("email",$email)->first();
   }
   public function isEnable($email){
      $company = new Companies();
      return $company->where("email",$email)
            ->where("is_approved",true)->first();
   }
   public function checkPhoneNumber($number){
      $company = new Companies();
      return $company->where("phone_number",$number)->first();
   }
    public function loginUser($input){
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

    public function getAllCompanies(){
      $company = new Companies();
      $company = $company->all();
      return $company;
    }
    public function getCompanyRequest($status){
      $company = new Companies();
      $company = $company->where("is_approved",$status)->get();
      return $company;
    }
    public function approvedCompany($company_id){
         $company = new Companies();
         $company = $company->find($company_id);
         $company->is_approved = true;
         return $company->save();
    }

}
