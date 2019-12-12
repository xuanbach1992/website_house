<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

//route khoong qua controller
//Route::get('/', function () {
//    return view('page.product');
//})->name('index');
Route::get('/','HouseController@listHouses')->name('index');

Auth::routes();

Route::prefix('/houses')->group(function (){
//    Route::get('/','HouseController@listHouses')->name('product');
    Route::get('/create','HouseController@create')->name('house.showFormCreate')->middleware('auth');;
    Route::post('/create','HouseController@add')->name('house.add')->middleware('auth');;
  });

Route::prefix('/users')->group(function () {
//    Route::get('/', 'HomeController@index')->name('index');
    Route::get('change-password', 'HomeController@showChangePass')->name('showChangePassword');
    Route::post('change-password', 'HomeController@changePassword')->name('change.password');
    Route::post('/{id}/edit', 'HomeController@showFormEdit')->name('user.edit');
    Route::post('/{id}/update','HomeController@updateSuccess')->name('user.update');

});

//code template
//Route::get('/','HomeController@index')->name('index');
Route::get('/redirect/{social}', 'SocialAuthController@redirect');
Route::get('/callback/{social}', 'SocialAuthController@callback');

Route::get('/contact','HomeController@contactTest')->name('contact');
Route::get('/blog','HomeController@blogTest')->name('blog');
Route::get('/about','HomeController@aboutTest')->name('about');
