<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix'  =>  'admin'], function () {

Route::get('login', 'Admin\LoginController@showLoginForm')->name('admin.login');
Route::post('login', 'Admin\LoginController@login')->name('admin.login.post');
Route::get('logout', 'Admin\LoginController@logout')->name('admin.logout');

    Route::group(['middleware' => ['auth:admin']], function () {

        Route::group(['prefix'  =>   'bookings'], function() {

            Route::get('/{day}/{room}/create', 'Admin\BookingController@create')->name('admin.bookings.create');
            Route::post('/{room}', 'Admin\BookingController@store')->name('admin.bookings.store');
            Route::get('/{booking}/edit', 'Admin\BookingController@edit')->name('admin.bookings.edit');
            Route::put('/{booking}','Admin\BookingController@update')->name('admin.bookings.update');
            Route::get('/{booking}/delete', 'Admin\BookingController@delete')->name('admin.bookings.delete');
            Route::put('/money/{booking}', 'Admin\BookingController@updateMoney')->name('admin.bookings.updateMoney');
            Route::put('/status/{booking}', 'Admin\BookingController@updateStatus')->name('admin.bookings.updateStatus');

        });

        Route::group(['prefix'  =>   'charges'], function() {

            Route::get('/{booking}/index', 'Admin\ChargeController@index')->name('admin.charges.index');
            Route::get('/{booking}/create', 'Admin\ChargeController@create')->name('admin.charges.create');
            Route::post('/{booking}', 'Admin\ChargeController@store')->name('admin.charges.store');
            Route::get('/{charge}/edit', 'Admin\ChargeController@edit')->name('admin.charges.edit');
            Route::put('/{charge}', 'Admin\ChargeController@update')->name('admin.charges.update');
            Route::get('/{charge}/delete', 'Admin\ChargeController@delete')->name('admin.charges.delete');
            Route::put('/money/{charge}', 'Admin\ChargeController@updateMoney')->name('admin.charges.updateMoney');


        });

        Route::group(['prefix'  =>   'guests'], function() {

            Route::get('/all', 'Admin\GuestController@all')->name('admin.guests.all');
            Route::get('/{booking}/index', 'Admin\GuestController@index')->name('admin.guests.index');
            Route::get('/{booking}/create', 'Admin\GuestController@create')->name('admin.guests.create');
            Route::post('/{booking}', 'Admin\GuestController@store')->name('admin.guests.store');
            Route::get('/{guest}/edit', 'Admin\GuestController@edit')->name('admin.guests.edit');
            Route::put('/{guest}', 'Admin\GuestController@update')->name('admin.guests.update');
            Route::get('/{guest}/delete', 'Admin\GuestController@delete')->name('admin.guests.delete');
        });

        Route::group(['prefix'  =>   'days'], function() {

            Route::get('/', 'Admin\DayController@calendar')->name('admin.days');
            Route::get('/{day:day}', 'Admin\DayController@index')->name('admin.days.index');
            Route::get('/calendar/create', 'Admin\DayController@create')->name('admin.days.create');
            Route::post('/calendar/store', 'Admin\DayController@store')->name('admin.days.store');

        });
    });

});
