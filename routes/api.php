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

    // Rutas libres.
    Route::namespace('Api')->group(function (){
        Route::get('grupos','GrupoController@index');
        Route::post('users','UserController@store');;
    });

    Route::post('register', "PassportController@register");
    
    Route::post('login', "PassportController@login");

    //Rutas protegidas
    Route::group(['middleware'=>'auth:api'], function(){

        Route::post('logout', "PassportController@logout");
        //Prods
        Route::get('marca/{slug}','Api\BrandController@products');
        // User
        Route::post('zonas_activas','Api\UserController@zonasActivas');
        Route::post('info_user','PassportController@info_user');
        // Ubications
        Route::post('ubication','Api\UbicationController@store');
        Route::put('ubication/{id}','Api\UbicationController@update');
        Route::delete('ubication/{id}','Api\UbicationController@destroy');
        Route::get('ubication/{id}','Api\UbicationController@show');
        //Images
        Route::post('add_image','Api\ProductImageController@store');
        Route::delete('delete_image/{id}','Api\ProductImageController@delete');
        // Zonas
        Route::get('zona/{slug}','Api\ZonaController@tiendas');
        Route::get('zonas','Api\ZonaController@index');

        Route::post('mail_form','MailController@sendMail');
    });
