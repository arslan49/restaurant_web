<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MyProduct extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('products')->insert([
            [
                'category_id'=>'1',
                'company_id'=>'1',
                'product_name'=>"Neapolitan Pizza",
                'price'=>1000,
                'stock'=>100,
                'image'=>"images/companies/products/neapolitan_pizza.jpg",
            ],
            [
                'category_id'=>'1',
                'company_id'=>'1',
                'product_name'=>"Chicago Pizza",
                'price'=>1200,
                'stock'=>100,
                'image'=>"images/companies/products/chicago_pizza.jpg",
            ],
            [
                'category_id'=>'1',
                'company_id'=>'1',
                'product_name'=>"Sicilian Pizza",
                'price'=>1500,
                'stock'=>100,
                'image'=>"images/companies/products/sicilian_pizza.png",
            ],[
                'category_id'=>'2',
                'company_id'=>'1',
                'product_name'=>"Pepsi",
                'price'=>75,
                'stock'=>100,
                'image'=>"images/companies/products/pepse.png",
            ],[
                'category_id'=>'2',
                'company_id'=>'1',
                'product_name'=>"Coca Cola",
                'price'=>75,
                'stock'=>100,
                'image'=>"images/companies/products/cocacoloa.png",
            ]
            ,[
                'category_id'=>'2',
                'company_id'=>'1',
                'product_name'=>"Fanta",
                'price'=>75,
                'stock'=>100,
                'image'=>"images/companies/products/fanta.png",
            ]
        ]);
    }
}
