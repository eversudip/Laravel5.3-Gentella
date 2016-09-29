<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::group(['namespace' => 'Backend'], function () {

    Route::get('admin/dashboard', 'DashBoardController@index')->name('dashboard');

   
});

Route::group(['namespace' => 'Auth'], function () {

	/**
	 * login Routes
	 */

    Route::get('user/login', 'LoginController@showLoginForm');
    Route::post('user/login', 'LoginController@login');
    Route::get('user/logout', 'LoginController@logout');


    /**
     * Register Routes
     */
    Route::get('user/register', 'RegisterController@showRegistrationForm');
    Route::post('user/register', 'RegisterController@register');
    Route::get('register/confirm/{confirmationCode}', 'RegisterController@confirmEmail');

    /**
     * Password reset Routes
     */
   	Route::get('password/reset/{token?}', 'ResetPasswordController@showResetForm');
   	Route::post('password/reset', 'ResetPasswordController@reset');
   	Route::post('password/email', 'ResetPasswordController@sendResetLinkEmail');
   	
    

   
});


