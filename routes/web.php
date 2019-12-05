<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::prefix('/houses')->group(function (){
    Route::get('/','HouseController@create')->name('house.showFormCreate');
    Route::post('/create','HouseController@add')->name('house.add');
  });

Route::prefix('/users')->group(function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::post('/edit/{id}', 'HomeController@showFormEdit')->name('user.edit');
});
