<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CabCatagoryController;
use App\Http\Controllers\CabController;
use App\Http\Controllers\CabPricesController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\OperatedCityController;
use App\Http\Controllers\UpdatePassword;
use App\Http\Controllers\SettingsController;

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

Route::get('/', function () {
    return view('admin/login');
});

Route::get("admin",[AdminController::class,'index']);
Route::post("admin/auth",[AdminController::class,'auth'])->name('admin.auth');



//updating admin password
Route::get("admin/updatepassword",[UpdatePassword::class,'changepassword'])->name('admin.updatepassword');
Route::post('admin/updatepassworddb',[UpdatePassword::class,'update_passworddb'])->name('admin.updatepassword');        

Route::group(['middleware'=>'admin_auth'],function(){
  
    Route::get("admin/dashboard",[AdminController::class,'dashboard']);  
  
    //for logout
    Route::get('admin/logout', function () {
        session()->forget('ADMIN_LOGIN');
        session()->forget('ADMIN_ID');
        session()->flash('error','Logout Successfully!');
        return redirect('admin');
    });

    
    Route::get('admin/cab_category',[CabCatagoryController::class,'index']);// make cntrller fr every categry
    Route::get('admin/cab_category/manage_cab_category',[CabCatagoryController::class,'manage_cab_category']);// make cntrller fr every categry
    Route::get('admin/cab_category/manage_cab_category/{id}',[CabCatagoryController::class,'manage_cab_category']);// make cntrller fr every categry
    Route::post('admin/cab_category/manage_cab_category_process',[CabCatagoryController::class,'manage_cab_category_process'])->name('cab_category.manage_cab_category_process');// make cntrller fr every categry
    Route::get('admin/cab_category/delete/{id}',[CabCatagoryController::class,'delete']);// make cntrller fr every categry
    //for status
    Route::get('admin/cab_category/status/{status}/{id}',[CabCatagoryController::class,'status']);// make cntrller fr every categry

    Route::get('admin/cab_list',[CabController::class,'index']);// make cntrller fr every categry
    Route::get('admin/cab_list/manage_cab_list',[CabController::class,'manage_cab_list']);// make cntrller fr every categry
    Route::get('admin/cab_list/manage_cab_list/{id}',[CabController::class,'manage_cab_list']);// make cntrller fr every categry
    Route::post('admin/cab_list/manage_cab_list_process',[CabController::class,'manage_cab_list_process'])->name('cab_list.manage_cab_list_process');// make cntrller fr every categry
    Route::get('admin/cab_list/delete/{id}',[CabController::class,'delete']);// make cntrller fr every categry
    Route::get('admin/cab_list/status/{status}/{id}',[CabController::class,'status']);// make cntrller fr every categry

    Route::get('admin/cab_price',[CabPricesController::class,'index']);// make cntrller fr every categry
    // Route::get('admin/cab_price/manage_cab_price',[CabPricesController::class,'manage_cab_price']);// make cntrller fr every categry
    // Route::get('admin/cab_price/manage_cab_price/{id}',[CabPricesController::class,'manage_cab_price']);// make cntrller fr every categry
    // Route::post('admin/cab_price/manage_cab_price_process',[CabPricesController::class,'manage_cab_price_process'])->name('cab_price.manage_cab_price_process');// make cntrller fr every categry
    // Route::get('admin/cab_price/delete/{id}',[CabPricesController::class,'delete']);

    Route::get('admin/driver_list',[DriverController::class,'index']);// make cntrller fr every categry
    // Route::get('admin/driver_list/manage_driver_list',[DriverController::class,'manage_driver_list']);// make cntrller fr every categry
    // Route::get('admin/driver_list/manage_driver_list/{id}',[DriverController::class,'manage_driver_list']);// make cntrller fr every categry
    // Route::post('admin/driver_list/manage_driver_list_process',[DriverController::class,'manage_driver_list_process'])->name('driver_list.manage_driver_list_process');// make cntrller fr every categry
    // Route::get('admin/driver_list/delete/{id}',[DriverController::class,'delete']);// make cntrller fr every categry
    // Route::get('admin/driver_list/status/{status}/{id}',[DriverController::class,'status']);

    Route::get('admin/city_list',[OperatedCityController::class,'index']);// make cntrller fr every categry
    Route::get('admin/city_list/manage_city_list',[OperatedCityController::class,'manage_city_list']);// make cntrller fr every categry
    Route::get('admin/city_list/manage_city_list/{id}',[OperatedCityController::class,'manage_city_list']);// make cntrller fr every categry
    Route::post('admin/city_list/manage_city_list_process',[OperatedCityController::class,'manage_city_list_process'])->name('city_list.manage_city_list_process');// make cntrller fr every categry
    Route::get('admin/city_list/delete/{id}',[OperatedCityController::class,'delete']);// make cntrller fr every categry
    Route::get('admin/city_list/status/{status}/{id}',[OperatedCityController::class,'status']);
});