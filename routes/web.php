<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', 'HomeController@index');
Route::get('/register', 'HomeController@register');
Route::get('logout', 'HomeController@logout');
Route::post('registercompany', 'RestController@RegisterCompany');
Route::post('logincompany', 'RestController@loginCompany');
Route::post('loginadmin', 'AdminController@loginAdmin');
Route::get('admin', 'AdminController@loginAdminView');


Route::group(['middleware' => ['auth.company']], function()
{
Route::get('addcategoryview', 'RestController@addCategoryView');
Route::post('addcategory', 'RestController@addCategoryAction');
Route::get('viewcategory', 'RestController@viewCategory');
Route::get('editcategoryview/{id}', 'RestController@editCategoryView');
Route::post('editcategoryaction', 'RestController@editCategoryAction');
Route::get('deletecategory/{id}', 'RestController@deleteCategory');
Route::get('getproductsview/{id}', 'RestController@getProductsView');
Route::get('addproductview', 'RestController@addProductView');
Route::post('addproductaction', 'RestController@addProductAction');
Route::get('editProductview/{id}', 'RestController@editProductView');
Route::get('getorders/{status}', 'RestController@getOrders');
Route::post('editproductaction', 'RestController@editProductAction');
Route::get('getorderdetails/{user_id}/{order_id}/{status}', 'RestController@getOrderDetails');
Route::get('carddetails/{order_id}', 'RestController@cardDetails');
Route::post('completeOrder', 'RestController@completeOrder');
});

Route::group(['middleware' => ['auth.admin']], function()
{
Route::get('requestcompany/{status}', 'AdminController@requestCompany');
Route::get('approvedCompany/{company_id}', 'AdminController@approvedCompany');

});
