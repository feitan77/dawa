<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix'  =>  'admin'], function () {

Route::get('login', 'Admin\LoginController@showLoginForm')->name('admin.login');
Route::post('login', 'Admin\LoginController@login')->name('admin.login.post');
Route::get('logout', 'Admin\LoginController@logout')->name('admin.logout');

    Route::group(['middleware' => ['auth:admin']], function () {

        Route::get('/', 'Admin\RoomController@index')->name('admin.rooms');

        Route::group(['prefix'  =>   'bookings'], function() {

            Route::get('/{room}/create', 'Admin\BookingController@create')->name('admin.bookings.create');
            Route::post('/{room}', 'Admin\BookingController@store')->name('admin.bookings.store');
            Route::get('/{booking}/edit', 'Admin\BookingController@edit')->name('admin.bookings.edit');
            Route::put('/{booking}', 'Admin\BookingController@update')->name('admin.bookings.update');
            Route::get('/{booking}/delete', 'Admin\BookingController@delete')->name('admin.bookings.delete');
        });
    });

});
