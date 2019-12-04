<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('house')->group(function (){
    Route::get('/create','HouseController@create')->name('house.showFormCreate');
    Route::post('/create','HouseController@add')->name('house.add');
});
