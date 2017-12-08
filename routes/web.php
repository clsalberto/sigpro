<?php

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');



// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

/*
 * Routes home page.
 */
Route::get('/', 'HomeController@index')->name('home');

/*
 * Routes profiles registration.
 */
Route::get('/profile', 'Auth\ProfileController@showProfile')->name('profile');

Route::get('/profile/edit', 'Auth\ProfileController@showProfileForm')->name('profile.edit');
Route::post('/profile/edit', 'Auth\ProfileController@register')->name('profile.update');

Route::get('/profile/password', 'Auth\PasswordController@showPasswordForm')->name('password.edit');
Route::post('/profile/password', 'Auth\PasswordController@register')->name('password.update');

/*
 * Routes users.
 */
Route::get('/users', 'Auth\UsersController@showUsers')->name('users');
Route::get('/user/create', 'Auth\UsersController@showRegisterUser')->name('user.create');
Route::post('/user/create', 'Auth\UsersController@register')->name('user.store');

Route::get('/users/{id}/edit', 'Auth\UsersController@showUserEdit')->name('user.edit');
Route::post('/users/{id}/edit', 'Auth\UsersController@showUserEdit')->name('user.update');

/*
 * Routes rooms.
 */
Route::get('/rooms', 'RoomController@index')->name('rooms');

/*
 * Routes frequencies.
 */
Route::get('/room/{id}/frequencies', 'FrequencyController@index')->name('frequencies');
Route::get('/room/{room_id}/{class_date_id}/frequencies', 'FrequencyController@show')->name('frequencies.students');
Route::get('/room/{room_id}/{class_date_id}/frequencies/print', 'FrequencyController@print')->name('frequencies.students.print');

Route::post('/frequency/{class_date_id}/{registration_id}/active', 'FrequencyController@active');
Route::post('/frequency/{class_date_id}/{registration_id}/inactive', 'FrequencyController@inactive');


/*
 * Routes scores.
 */
Route::get('/room/{id}/scores', 'ScoreController@index')->name('scores');
Route::get('/room/{room_id}/{class_date_id}/scores', 'ScoreController@show')->name('scores.students');
Route::post('/room/{room_id}/{class_date_id}/scores', 'ScoreController@update')->name('scores.students.update');
Route::get('/room/{room_id}/{class_date_id}/scores/print', 'ScoreController@print')->name('scores.students.print');
