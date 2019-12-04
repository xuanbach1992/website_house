<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::prefix('houses')->group(function (){
    Route::get('/create','HouseController@create')->name('house.showFormCreate');
    Route::post('/create','HouseController@add')->name('house.add');
  });

Route::prefix('/users')->group(function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::post('/edit', 'HomeController@editShow')->name('user.edit');
});
