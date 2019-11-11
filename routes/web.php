<?php

use Illuminate\Http\Request;
use App\Product;

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


Route::redirect('/', '/en');
Auth::routes();
Route::group(['prefix' => '{language}'], function (){
    
    Route::resource('products','ProductController');

    Route::get('/', 'GeneralController@showLogin');
    Route::get('/profile', 'GeneralController@showProfile');
    Route::get('{products}/profile', 'GeneralController@showProfile');

    Route::post('/update', 'GeneralController@doUpdate');
});
