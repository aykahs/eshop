<?php

use Illuminate\Http\Request;
App::bind('App\Repositories\ProductInterface','App\Repositories\ProductRepository');
App::bind('App\Repositories\EmployerInterface','App\Repositories\EmployerRepository');
App::bind('App\Repositories\CategoriesInterface','App\Repositories\CategoriesRepository');
App::bind('App\Repositories\OrderInterface','App\Repositories\OrderRepository');

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/products','Userapicontroller@index');

Route::get('/addcart/{id}', 'Userapicontroller@add_to_cart');

Route::get('/countcart', 'Userapicontroller@Productcount');

Route::get('/cart', 'Userapicontroller@cart');

Route::get('/cart/increment/{id}', 'Userapicontroller@incr_product');

Route::get('/cart/decrement/{id}', 'Userapicontroller@decr_product');

Route::get('/cart/delete/{id}', 'Userapicontroller@delete');

Route::get('/cart/paymentinfo', 'Userapicontroller@getcheckout');

Route::post('/cart/pay', 'Userapicontroller@payment');

Route::get('/profile', 'Userapicontroller@getprofile');

Route::delete('/transaction/{id}', 'Userapicontroller@drop');

Route::get('/transaction/recover', 'Userapicontroller@restore');









Route::prefix('Admin')->group(function () {

        Route::get('/categories', 'categoriesapicontroller@index');

        Route::get('/employers', 'employerapicontoller@index');

        Route::post('/create/employer', 'employerapicontoller@store');

        Route::delete('/destroy/employer/{id}', 'employerapicontoller@delete');

        Route::post('/create/products', 'Productcontroller@store');

        Route::put('/update/products/{id?}', 'Productcontroller@update');

        Route::delete('/destroy/products/{id}', 'Productcontroller@destroy');


});
