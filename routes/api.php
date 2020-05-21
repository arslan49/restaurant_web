<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('login','api\UserController@login');
Route::post('registeruser','api\UserController@registerUser');
Route::post('checkuser','api\UserController@checkUser');
Route::post('updatepassword','api\UserController@updatePassword');


Route::group(['middleware' => 'checkusertoken'], function() {
Route::post('category','api\UserController@addcategory');
Route::post('getcompanies','api\UserController@getCompanies');
Route::post('mycategories','api\UserController@MyCategories');
Route::post('myproduct','api\UserController@MyProduct');
Route::post('saveOrder','api\UserController@saveOrder');
Route::post('getuserprofile','api\UserController@getUserProfile');
Route::post('getuserorders','api\UserController@getUserOrders');
Route::post('getmyorderproducts','api\UserController@getMyOrderProducts');
Route::post('completeorder','api\UserController@completeOrder');
});

