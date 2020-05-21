<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MyCat extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('categories')->insert([
            [
                'cate_name'=>'Piza',
                'company_id'=>'1',
                'image'=>'images/companies/categories/piza.png',
            ],
            [
                'cate_name'=>'Burger',
                'company_id'=>'1',
                'image'=>'images/companies/categories/burger.png',
            ],
            [
                'cate_name'=>'Drink',
                'company_id'=>'1',
                'image'=>'images/companies/categories/drinks.png',
            ],
            [
                'cate_name'=>'Piza',
                'company_id'=>'2',
                'image'=>'images/companies/categories/piza_2.png',
            ],[
                'cate_name'=>'Drink',
                'company_id'=>'2',
                'image'=>'images/companies/categories/drink_2.png',
            ],[
                'cate_name'=>'Burger',
                'company_id'=>'2',
                'image'=>'images/companies/categories/burger_2.png',
            ]

            ]);

    }
}
