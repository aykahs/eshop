<?php

use Illuminate\Http\Request;
App::bind('App\Repositories\ProductInterface','App\Repositories\ProductRepository');
App::bind('App\Repositories\EmployerInterface','App\Repositories\EmployerRepository');
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

Route::prefix('Admin')->group(function () {

        Route::get('/employers', 'employerapicontoller@index');

        Route::post('/create/employer', 'employerapicontoller@store');

        Route::delete('/destroy/employer/{id}', 'employerapicontoller@delete');

        Route::post('/create/products', 'Productcontroller@store');

        Route::put('/update/products/{id}', 'Productcontroller@update');

        Route::delete('/destroy/products/{id}', 'Productcontroller@destroy');


});
