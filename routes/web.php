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
    Route::get('/create','HouseController@create')->name('house.showFormCreate')->middleware('auth');
    Route::post('/create','HouseController@add')->name('house.add')->middleware('auth');
    Route::post('/upload','HouseController@storeImage')->name('house.upload')->middleware('auth');

    //đang k sử dụng route này vì đang dùng hàm này cho form admin
    Route::get('/rent','HouseController@findByUser')->name('user.rent')->middleware('auth');

    Route::get('/book/{id}','HouseController@book')->name('house.book')->middleware('auth');

    Route::get('/detail/{id}','HouseController@showHouseDetails')->name('house.detail');
    Route::get('/searchHouse','HouseController@search')->name('search');
    Route::get('/delete/{id}','HouseController@delete')->name('house.delete')->middleware('auth');
    Route::get('/edit/{id}','HouseController@showEdit')->name('house.showEdit')->middleware('auth');
    Route::post('/edit/{id}','HouseController@updateStatus')->name('house.update')->middleware('auth');
//    Route::post('/status/{id}','HouseController@updateStatus')->name('house.status');

});

Route::prefix('/users')->group(function () {
//    Route::get('/', 'HomeController@index')->name('index');
    Route::get('/change-password', 'HomeController@showChangePass')->name('showChangePassword');
    Route::post('/change-password', 'HomeController@changePassword')->name('change.password');
    Route::get('/change-profile', 'HomeController@showFormEdit')->name('user.edit');
    Route::post('/change-profile','HomeController@updateSuccess')->name('user.update');

});

//đăng nhập bằng facebook
Route::get('/redirect/{social}', 'SocialAuthController@redirect');
Route::get('/callback/{social}', 'SocialAuthController@callback');

//search
Route::get('/getDataByCitiesId','DistrictController@getDataByCitiesId')->name('getDataByCitiesId');

//code template
//Route::get('/','HomeController@index')->name('index');
Route::get('/contact','HomeController@contactTest')->name('contact');
Route::get('/blog','HomeController@blogTest')->name('blog');
Route::get('/about','HomeController@aboutTest')->name('about');
Route::get('/property','HomeController@propertydetails')->name('property');


//code admin template
Route::get('/master','HouseController@showMaster')->name('admin.master');
Route::get('/houseManagement','HouseController@findByUser')->name('admin.house');
