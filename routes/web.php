<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('welcome');
})->name('home');

Auth::routes();


Route::prefix('/houses')->group(function (){
    Route::get('/','HouseController@create')->name('house.showFormCreate');
    Route::post('/create','HouseController@add')->name('house.add');
  });

Route::prefix('/users')->group(function () {
//    Route::get('/', 'HomeController@index')->name('home');
    Route::post('/{id}/edit', 'HomeController@showFormEdit')->name('user.edit');
    Route::post('/{id}/update','HomeController@updateSuccess')->name('user.update');
    Route::post('/editPass','HomeController@postCredentials')->name('user.editPass');
});

//code template
Route::get('/testIndex','HomeController@indexTest')->name('index');
Route::get('/testProduct','HomeController@productTest')->name('product');
Route::get('/testContact','HomeController@contactTest')->name('contact');
Route::get('/blogTest','HomeController@blogTest')->name('blog');
Route::get('/about','HomeController@aboutTest')->name('about');
