<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DummyCompanies extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('companies')->insert([
            [
                'company_image'=>'Ab Piza',
                'username'=>'abpiza',
                'password'=>bcrypt("123456"),
                'phone_number'=>'123456',
                'email'=>'abpiza@gmail.com',
                'city'=>'',
                'address'=>'',
                'is_approved'=> true,
                'latitude'=>'31.69975',
                'longitude'=>'73.9700084',
                'image'=>'images\companies\ab.png',

            ],
             [
                'company_image'=>'ZA Pepse',
                'username'=>'zaPepse',
                'password'=>bcrypt("123456"),
                'phone_number'=>'1234568',
                'email'=>'zapiza@gmail.com',
                'city'=>'',
                'address'=>'',
                'is_approved'=> true,
                'latitude'=>'31.6998473',
                'longitude'=>'73.9705936',
                'image'=>'images\companies\za.png',


            ]
        ]);
    }
}
