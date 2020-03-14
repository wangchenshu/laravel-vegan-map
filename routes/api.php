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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::namespace('Api')->prefix('v1')->group(function () {

    // API 文件
    //Route::get('/swagger/json', 'APIDocsController@getJSON');

    // 取得所有用戶
    //Route::get('/', 'UserController@index')->name('users.index');
    // 取得用戶資料
    //Route::get('/users/{user}', 'UserController@show')->name('users.show');

    // 取得所有餐廳
    Route::get('/restaurants', 'RestaurantController@index')->name('restaurant.index');
    // 取得餐廳資料
    Route::get('/restaurant/{restaurant}', 'RestaurantController@show')->name('restaurant.show');
});
