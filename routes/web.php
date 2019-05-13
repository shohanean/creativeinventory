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
Route::resource('company', 'CompanyController', [
    'except'=>['create', 'show'] //EXCLUDING CREATE AND SHOW AS WE DON'T NEED IT
    ]);
Route::get('company/restore/{company}', 'CompanyController@restore')->name('company.restore');
Route::get('company/force/delete/{company}', 'CompanyController@forceDelete')->name('company.forceDelete');



///////////// WAREHOUSE ///////////////
Route::resource('warehouse', 'WarehouseController', [
    'except'=>['create', 'show'] //EXCLUDING CREATE AND SHOW AS WE DON'T NEED IT
    ]);
Route::get('warehouse/restore/{warehouse}', 'WarehouseController@restore')->name('warehouse.restore');
Route::get('warehouse/force/delete/{warehouse}', 'WarehouseController@forceDelete')->name('warehouse.forceDelete');


///////////// SUPPLIER ///////////////
Route::resource('supplier', 'SupplierController', [
    'except'=>['create', 'show'] //EXCLUDING CREATE AND SHOW AS WE DON'T NEED IT
    ]);
Route::get('supplier/restore/{supplier}', 'SupplierController@restore')->name('supplier.restore');
Route::get('supplier/force/delete/{supplier}', 'SupplierController@forceDelete')->name('supplier.forceDelete');


//////////////// ROLES & PERMISSION //////////////////
// Route::get('test', 'RoleController@test'); //route for testing
Route::get('role', 'RoleController@index')->name('role.index');
Route::post('role', 'RoleController@addRole')->name('add.role');
Route::post('/assign/permission', 'RoleController@assignPermission')->name('assign.permission');
Route::post('/assign/role', 'RoleController@assignRole')->name('assign.role');;
Route::get('/remove/permission/{role_id}/{permission_id}', 'RoleController@removePermission');//->name('remove.permission');
Route::get('/remove/role/{user_id}/{names}', 'RoleController@removeRole');//->name('remove.permission');


//////////////// PRODUCT /////////////////
Route::resource('product', 'ProductController');
Route::get('product/trash/view','ProductController@trashView')->name('product.trashView');
Route::get('product/restore/{product}', 'ProductController@restore')->name('product.restore');
Route::get('product/force/delete/{product}', 'ProductController@forceDelete')->name('product.forceDelete');


////////////// PURCHASE ////////////////
Route::resource('purchase', 'PurchaseController');
Route::get('purchase/trash/view','PurchaseController@trashView')->name('purchase.trashView');
Route::get('purchase/restore/{purchase}', 'PurchaseController@restore')->name('purchase.restore');
Route::get('purchase/force/delete/{purchase}', 'PurchaseController@forceDelete')->name('purchase.forceDelete');


////////////// CATEGORY ////////////////
Route::resource('category', 'CategoryController');
Route::get('category/trash/view','CategoryController@trashView')->name('category.trashView');
Route::get('category/restore/{category}', 'CategoryController@restore')->name('category.restore');
Route::get('category/force/delete/{category}', 'CategoryController@forceDelete')->name('category.forceDelete');

////////////// EMPLOYEE ////////////////
Route::resource('employee', 'EmployeeController');
Route::get('employee/restore/{employee}', 'EmployeeController@restore')->name('employee.restore');
Route::get('employee/force/delete/{employee}', 'EmployeeController@forceDelete')->name('employee.forceDelete');


////////////// DEPARTMENT ////////////////
Route::resource('department', 'DepartmentController');
Route::get('department/restore/{department}', 'DepartmentController@restore')->name('department.restore');
Route::get('department/force/delete/{department}', 'DepartmentController@forceDelete')->name('department.forceDelete');


/////////////// STOCK ////////////////
Route::resource('stock', 'StockController');


/////////////// INVENTORY ////////////////
Route::resource('inventory', 'InventoryController');


/////////////// STOCK ////////////////
Route::resource('assign', 'AssignController');


///////////////// REQUISITION FORM ////////////////
Route::resource('requisition', 'RequisitionController');
Route::get('requisition/approve/{requisition}', 'HomeController@approve')->name('approve.requisition');
Route::get('requisition/reject/{requisition}', 'HomeController@reject')->name('reject.requisition');
Route::get('requisition/forward/{requisition}', 'HomeController@forward')->name('forward.requisition');
