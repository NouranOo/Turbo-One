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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/', 'TurboController@loginturbo')->name('loginturbo');
Route::post('postadminLogin', 'TurboController@postadminLogin')->name('postadminLogin');

Route::group(['middleware' => ['admin']], function () {

Route::get('users', 'TurboController@users')->name('users');
Route::get('edituser/{id}', 'TurboController@edituser')->name('edituser');
Route::post('adminedituser/{id}', 'TurboController@adminedituser')->name('adminedituser');

Route::get('active/{id}', 'TurboController@active')->name('active');
Route::get('disactive/{id}', 'TurboController@disactive')->name('disactive');

Route::get('carbrands', 'TurboController@carbrands')->name('carbrands');
Route::get('addcarbrand', 'TurboController@addcarbrand')->name('addcarbrand');
Route::post('addbrand', 'TurboController@addbrand')->name('addbrand');
Route::get('editcarbrand/{id}', 'TurboController@editcarbrand')->name('editcarbrand');
Route::post('editcar/{id}', 'TurboController@editcar')->name('editcar');
Route::get('deletebrand', 'TurboController@deletebrand')->name('deletebrand');


Route::get('carmodels', 'TurboController@carmodels')->name('carmodels');
Route::get('addcarmodels', 'TurboController@addcarmodels')->name('addcarmodels');
Route::post('addmodels', 'TurboController@addmodels')->name('addmodels');
Route::get('editmodels/{id}', 'TurboController@editmodels')->name('editmodels');
Route::post('editmod/{id}', 'TurboController@editmod')->name('editmod');
Route::get('deletemodel', 'TurboController@deletemodel')->name('deletemodel');


Route::get('promocode', 'TurboController@promocode')->name('promocode');
Route::get('addpromocode', 'TurboController@addpromocode')->name('addpromocode');
Route::post('addpromo', 'TurboController@addpromo')->name('addpromo');
Route::get('activepromo/{id}', 'TurboController@activepromo')->name('activepromo');
Route::get('disactivepromo/{id}', 'TurboController@disactivepromo')->name('disactivepromo');
Route::get('editpromocode/{id}', 'TurboController@editpromocode')->name('editpromocode');
Route::post('editpromo/{id}', 'TurboController@editpromo')->name('editpromo');


Route::get('usercar', 'TurboController@usercar')->name('usercar');
Route::get('editusercar/{id}', 'TurboController@editusercar')->name('editusercar');
Route::post('admineditusercar/{id}', 'TurboController@admineditusercar')->name('admineditusercar');
Route::get('deleteusercar', 'TurboController@deleteusercar')->name('deleteusercar');


Route::get('usersaveplace', 'TurboController@usersaveplace')->name('usersaveplace');
Route::get('editusersaveplace/{id}', 'TurboController@editusersaveplace')->name('editusersaveplace');
Route::post('admineditusersaveplace/{id}', 'TurboController@admineditusersaveplace')->name('admineditusersaveplace');
Route::get('deleteusersaveplace', 'TurboController@deleteusersaveplace')->name('deleteusersaveplace');


Route::get('servicecategory', 'TurboController@servicecategory')->name('servicecategory');
Route::get('editservicecategory/{id}', 'TurboController@editservicecategory')->name('editservicecategory');
Route::post('admineditservicecategory/{id}', 'TurboController@admineditservicecategory')->name('admineditservicecategory');
Route::get('deleteservicecategory', 'TurboController@deleteservicecategory')->name('deleteservicecategory');


Route::get('servicesubcategory', 'TurboController@servicesubcategory')->name('servicesubcategory');
Route::get('editsubcategory/{id}', 'TurboController@editsubcategory')->name('editsubcategory');
Route::post('admineditservicesubcategory/{id}', 'TurboController@admineditservicesubcategory')->name('admineditservicesubcategory');
Route::get('deletesubservicecategory', 'TurboController@deletesubservicecategory')->name('deletesubservicecategory');


Route::get('order', 'TurboController@order')->name('order');
Route::get('editorder/{id}', 'TurboController@editorder')->name('editorder');
Route::post('admineditorder/{id}', 'TurboController@admineditorder')->name('admineditorder');
Route::post('editorderdeatils/{id}', 'TurboController@editorderdeatils')->name('editorderdeatils');
Route::get('deleteorder', 'TurboController@deleteorder')->name('deleteorder');
Route::post('editpayment/{id}', 'TurboController@editpayment')->name('editpayment');


Route::get('editorderdeatils/{id}', 'TurboController@editorderdeatils')->name('editorderdeatils');
Route::get('deleteorderdeatils', 'TurboController@deleteorderdeatils')->name('deleteorderdeatils');
Route::post('editdeatils/{id}', 'TurboController@editdeatils')->name('editdeatils');

});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
