<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Api Routes
|--------------------------------------------------------------------------
|
| Here is where you can register Api routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your Api!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::namespace('Api')->group(function (){

    Route::get('grupos','GrupoController@index');
    Route::post('users','UserController@store');;

    // 
    Route::get('marca/{slug}','BrandController@products');
    
    // Zonas
    Route::get('zona/{slug}','ZonaController@tiendas');
    Route::get('zonas','ZonaController@index');

    // Ubications
    // Route::post('ubication','UbicationController@store');
    Route::get('ubication/{id}','UbicationController@show');
    // Route::put('ubication/{id}','UbicationController@update');
    // Route::delete('ubication/{id}','UbicationController@destroy');
});

    Route::post('register', "PassportController@register");
    Route::post('login', "PassportController@login");

    Route::group(['middleware'=>'auth:api'], function(){

        Route::post('logout', "PassportController@logout");

        // User
        Route::post('zonas_activas','Api\UserController@zonasActivas');
        Route::post('info_user','PassportController@info_user');

        // Ubications
        Route::post('ubication','Api\UbicationController@store');
        Route::put('ubication/{id}','Api\UbicationController@update');
        Route::delete('ubication/{id}','Api\UbicationController@destroy');

        //Images
        Route::post('add_image','Api\ProductImageController@store');
        Route::delete('delete_image/{id}','Api\ProductImageController@delete');

    });