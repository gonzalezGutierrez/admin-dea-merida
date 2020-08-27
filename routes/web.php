<?php

use Illuminate\Support\Facades\Route;

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
Auth::routes(['verify' => true]);
//Auth::routes();
Route::get('/', function () {
    return view('welcome');
});


Route::namespace('Admin')->group(function(){

    Route::get('login','AuthController@login')->middleware('guest');
    Route::post('login','AuthController@auth')->name('login');
    Route::post('logout','AuthController@logout');

    Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){
        Route::resource('usuarios','UserController');
        Route::resource('zonas','ZonaController');
        Route::resource('grupos','GroupController');
        Route::resource('productos','ProductController');
        Route::resource('marcas','BrandController');
        Route::resource('cadenas','ChainStoreController');
        Route::resource('tiendas','StoreController');
        Route::resource('palabras-claves','KeyWordController');
    });

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('reporte', "MailController@ViewFormMail");


Route::get('/email/resend', 'Api\VerificationController@resend')->name('verification.resend');

Route::get('/email/verify/{id}/{hash}', 'Api\VerificationController@verify')->name('verification.verify');