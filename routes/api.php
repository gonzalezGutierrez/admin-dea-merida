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

Route::prefix('v1')->group(function () {

    // Rutas libres.
    Route::namespace('Api')->group(function (){
        Route::get('grupos','GrupoController@index');
        Route::post('users','UserController@store');;
    });

    Route::post('register', "PassportController@register");
    Route::post('login', "PassportController@login");
    Route::post('logout', "PassportController@logout");
    Route::post('info_user','PassportController@info_user');
    Route::post('mail_form','MailController@sendMail');

    //Rutas protegidas
    Route::group(['middleware'=>'auth:api'], function(){
        Route::namespace('Api')->group(function (){
        //Prods
        Route::get('marca/{slug}','BrandController@products');
        // User
        Route::post('zonas_activas','UserController@zonasActivas');

        // Ubications
        Route::post('ubication','UbicationController@store');
        Route::put('ubication/{id}','UbicationController@update');
        Route::delete('ubication/{id}','UbicationController@destroy');
        Route::get('ubication/{id}','UbicationController@show');

        //Images
        Route::post('add_image','ProductImageController@store');
        Route::delete('delete_image/{id}','ProductImageController@delete');
        // Zonas
        Route::get('zona/{slug}','ZonaController@tiendas');
        Route::get('zonas','ZonaController@index');
        });
    });
});