<?php

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
Route::redirect('/', 'login');

Auth::routes();

Route::get('home', 'HomeController@index')->name('home');


////////////// COMPANY /////////////////
Route::resource('company', 'CompanyController');



///////////// WAREHOUSE ///////////////
Route::resource('warehouse', 'WarehouseController');
<<<<<<< HEAD
Route::get('warehouse/restore/{warehouse}', 'WarehouseController@restore');
Route::get('warehouse/force/delete/{warehouse}', 'WarehouseController@forceDelete');


///////////// SUPPLIER ///////////////
Route::resource('supplier', 'SupplierController');
Route::get('supplier/restore/{supplier}', 'SupplierController@restore');
Route::get('supplier/force/delete/{supplier}', 'SupplierController@forceDelete');
=======
Route::get('warehouse/restore/{warehouse}', 'WarehouseController@restore')->name('warehouse.restore');
Route::get('warehouse/force/delete/{warehouse}', 'WarehouseController@forceDelete')->name('warehouse.forceDelete');
>>>>>>> 4949fc2cf0846351be990e15bde58fd48fe8909d
