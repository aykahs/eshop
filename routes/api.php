<?php

use Illuminate\Http\Request;

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
Route::post('/create/employer', 'Admincontroller@register_emp');
Route::post('/create/products', 'Productcontroller@store');
Route::put('/update/products/{id}', 'Productcontroller@update');
Route::delete('/destroy/products/{id}', 'Productcontroller@destroy');


});
