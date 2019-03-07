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
Route::prefix('Admin')->group(function () {
   Route::get('/login', 'Auth\Adminlogincontroller@showLoginForm')->name('login.form');
   Route::Post('/login', 'Auth\Adminlogincontroller@login')->name('login.employer');
   Route::get('/home', 'Admincontroller@index')->name('admin.home');
   Route::get('/create/employer', 'Admincontroller@addemp')->name('add.employer');
   Route::get('/create/product', 'Admincontroller@addproduct')->name('add.product');


});


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/profile', 'HomeController@profile')->name('user.home');
Route::get('/cart', 'HomeController@Cart');
Route::get('/cart/payment', 'HomeController@payment');






