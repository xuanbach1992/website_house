<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
//route khoong qua controller
//Route::get('/', function () {
//    return view('page.product');
//})->name('index');
Route::get('/', 'HouseController@listHouses')->name('index');
Auth::routes();
Route::prefix('/houses')->group(function () {
//    Route::get('/','HouseController@listHouses')->name('product');
    Route::get('/create', 'HouseController@create')->name('house.showFormCreate')->middleware('auth');
    Route::post('/create', 'HouseController@add')->name('house.add')->middleware('auth');
    Route::post('/upload', 'HouseController@storeImage')->name('house.upload')->middleware('auth');
    Route::post('/book/{id}', 'HouseController@book')->name('house.book.notify')->middleware('auth');
    Route::get('/rent', 'HouseController@findByUser')->name('user.rent')->middleware('auth');
    Route::get('/accept/{uid}', 'OrderController@acceptRentHouse')->name('house.notifi.accept')->middleware('auth');
    Route::get('/not-accept/{uid}', 'OrderController@noAcceptRentHouse')->name('house.notifi.not.accept')->middleware('auth');
    Route::get('/is-read/{uid}', 'OrderController@isReadNotification')->name('house.notifi.isread')->middleware('auth');
    Route::get('/detail/{id}', 'HouseController@showHouseDetails')->name('house.detail');
    Route::get('/searchHouse', 'HouseController@search')->name('search');
    Route::get('/check-in/{id}', 'HouseController@userCheckinHouse')->name('user.checkin.house')->middleware('auth');
    Route::get('/check-out/{id}', 'HouseController@userCheckoutHouse')->name('user.checkout.house')->middleware('auth');

});
Route::prefix('/users')->group(function () {
//    Route::get('/', 'HomeController@index')->name('index');
    Route::get('/change-password', 'HomeController@showChangePass')->name('showChangePassword');
    Route::post('/change-password', 'HomeController@changePassword')->name('change.password');
    Route::get('/change-profile', 'HomeController@showFormEdit')->name('user.edit');
    Route::post('/change-profile', 'HomeController@updateSuccess')->name('user.update');
});
//code admin template
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/list-house', 'HouseController@findByUser')->name('admin.house');
    Route::get('/notify', 'HouseController@showNotify')->name('admin.notify.show');
    Route::get('/rented', 'HouseController@showRented')->name('admin.house.rented');
    Route::get('/edit/{id}', 'HouseController@showEdit')->name('house.showEdit');
    Route::post('/edit/{id}', 'HouseController@updateStatus')->name('house.update');
    Route::get('/delete/{id}', 'HouseController@delete')->name('house.delete');
    Route::get('/un-rent-house', 'OrderController@destroyOrderRentHouse')->name('order.house.delete');
    Route::get('/rent-detail/{id}', 'OrderController@showRentDetailByHouse')->name('house.show.rent.detail');
});
//đăng nhập bằng facebook
Route::get('/redirect/{social}', 'SocialAuthController@redirect');
Route::get('/callback/{social}', 'SocialAuthController@callback');
//search
Route::get('/getDataByCitiesId', 'DistrictController@getDataByCitiesId')->name('getDataByCitiesId');
Route::get('/property','HomeController@propertyDetails')->name('property');
route::post('/rating/{id}','RatingController@saveRating')->name('house.rating')->middleware('auth');
route::post('/comment/{id}','CommentController@replyStar')->name('house.comment')->middleware('auth');
//code template
//Route::get('/','HomeController@index')->name('index');
Route::get('/contact','HomeController@contactTest')->name('contact');
Route::get('/blog','HomeController@blogTest')->name('blog');
Route::get('/about','HomeController@aboutTest')->name('about');
