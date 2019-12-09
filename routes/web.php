<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

//không dùng
//Route::get('/', function () {
//    return view('page.home');
//})->name('home');

Auth::routes();

Route::prefix('/houses')->group(function (){
    Route::get('/','HouseController@create')->name('house.showFormCreate');
    Route::post('/create','HouseController@add')->name('house.add');
  });

Route::prefix('/users')->group(function () {
//    Route::get('/', 'HomeController@index')->name('home');
    Route::post('/change_pass','HomeController@postCredentials')->name('user.change_pass');
    Route::post('/{id}/edit', 'HomeController@showFormEdit')->name('user.edit');
    Route::post('/{id}/update','HomeController@updateSuccess')->name('user.update');

});

//code template
Route::get('/','HomeController@indexTest')->name('index');
Route::get('/product','HomeController@productTest')->name('product');
Route::get('/contact','HomeController@contactTest')->name('contact');
Route::get('/blog','HomeController@blogTest')->name('blog');
Route::get('/about','HomeController@aboutTest')->name('about');
