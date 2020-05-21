<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MyUsers extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('users')->insert([
            [
                'name'=>'test',
                'email'=>'test@gmail.com',
                'password'=>bcrypt("123456"),
                'city'=>'Lahore',
                'address'=>'Test Address Lahore',
                'phone_number'=>'1234567',
                'role_id'=>0
            ]
        ]);
    }
}
