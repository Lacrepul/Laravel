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

Route::redirect('/', '/ru/login');//Главная
Route::post('destroy/{product}', 'ProductController@destroy')->name('destroy');//Удаление поста

Route::group(['prefix' => '{language}'], function (){
    Route::resource('products','ProductController');//Работа с записями
    Auth::routes();
    Route::get('/profile', 'GeneralController@showProfile');//показать профиль
    Route::post('/update', 'ProductController@doUpdate');//Изменить пост
});
