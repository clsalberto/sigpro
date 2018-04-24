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
Route::get('/users', 'Auth\UsersController@showUsers')
	->middleware('can:view-users,App\User')
	->name('users');

Route::get('/user/create', 'Auth\UsersController@showRegisterUser')
	->middleware('can:create-users,App\User')
	->name('user.create');

Route::post('/user/create', 'Auth\UsersController@register')
	->middleware('can:create-users,App\User')
	->name('user.store');

Route::get('/users/{id}/edit', 'Auth\UsersController@showUserEdit')->name('user.edit');
Route::post('/users/{id}/edit', 'Auth\UsersController@editUser')->name('user.update');

/*
 * Routes roles.
 */
Route::get('/roles', 'Auth\RolesController@showRoles')->name('roles');
Route::get('/role/create', 'Auth\RolesController@showRegisterRole')->name('role.create');
Route::post('/role/create', 'Auth\RolesController@register')->name('role.store');
Route::get('/roles/{id}/edit', 'Auth\RolesController@showRoleEdit')->name('role.edit');
Route::post('/roles/{id}/edit', 'Auth\RolesController@update')->name('role.update');

/*
 * Routes rooms.
 */
Route::get('/rooms', 'RoomController@index')->name('rooms');

/*
 * Routes frequencies.
 */
Route::get('/room/{id}/frequencies', 'FrequencyController@index')
	->middleware('can:view-frequencies,App\Frequency')
	->name('frequencies');

Route::get('/room/{room_id}/{class_date_id}/frequencies', 'FrequencyController@show')
	->middleware('can:view-frequencies,App\Frequency')
	->name('frequencies.students');

Route::get('/room/{room_id}/{class_date_id}/frequencies/print', 'FrequencyController@print')
	->middleware('can:view-frequencies,App\Frequency')
	->name('frequencies.students.print');

Route::get('/room/{room_id}/{class_date_id}/frequency/check', 'FrequencyController@checkFrequency')->name('check.frequency');
Route::get('/room/{id}/score/check', 'FrequencyController@checkScore')->name('check.score');

Route::post('/frequency/{class_date_id}/{registration_id}/active_a', 'FrequencyController@active_a')->middleware('can:post-frequencies,App\Frequency');
Route::post('/frequency/{class_date_id}/{registration_id}/inactive_a', 'FrequencyController@inactive_a')->middleware('can:post-frequencies,App\Frequency');

Route::post('/frequency/{class_date_id}/{registration_id}/active_b', 'FrequencyController@active_b')->middleware('can:post-frequencies,App\Frequency');
Route::post('/frequency/{class_date_id}/{registration_id}/inactive_b', 'FrequencyController@inactive_b')->middleware('can:post-frequencies,App\Frequency');

Route::post('/frequency/{class_date_id}/{registration_id}/active_c', 'FrequencyController@active_c')->middleware('can:post-frequencies,App\Frequency');
Route::post('/frequency/{class_date_id}/{registration_id}/inactive_c', 'FrequencyController@inactive_c')->middleware('can:post-frequencies,App\Frequency');

Route::post('/frequency/{class_date_id}/{registration_id}/active_d', 'FrequencyController@active_d')->middleware('can:post-frequencies,App\Frequency');
Route::post('/frequency/{class_date_id}/{registration_id}/inactive_d', 'FrequencyController@inactive_d')->middleware('can:post-frequencies,App\Frequency');

Route::post('/frequency/{class_date_id}/{registration_id}/active_e', 'FrequencyController@active_e')->middleware('can:post-frequencies,App\Frequency');
Route::post('/frequency/{class_date_id}/{registration_id}/inactive_e', 'FrequencyController@inactive_e')->middleware('can:post-frequencies,App\Frequency');

Route::post('/frequency/{class_date_id}/{registration_id}/active_f', 'FrequencyController@active_f')->middleware('can:post-frequencies,App\Frequency');
Route::post('/frequency/{class_date_id}/{registration_id}/inactive_f', 'FrequencyController@inactive_f')->middleware('can:post-frequencies,App\Frequency');

Route::post('/frequency/{class_date_id}/{registration_id}/justified', 'FrequencyController@justified')->middleware('can:post-frequencies,App\Frequency');
Route::post('/frequency/{class_date_id}/{registration_id}/not_justified', 'FrequencyController@not_justified')->middleware('can:post-frequencies,App\Frequency');

/*
 * Routes scores.
 */
Route::get('/room/{id}/scores', 'ScoreController@show')->name('scores.students');
Route::post('/room/{id}/scores', 'ScoreController@update')->name('scores.students.update');
Route::get('/room/{id}/scores/print', 'ScoreController@print')->name('scores.students.print');

/*
 * Routes programs content.
 */
Route::get('/room/{room_id}/{class_date_id}/content', 'ProgramContentController@index')->name('content');
Route::post('/room/{room_id}/{class_date_id}/content', 'ProgramContentController@register')->name('content.register');
Route::get('/room/{room_id}/{class_date_id}/content/show', 'ProgramContentController@show')->name('content.show');

/*
 * Routes has formula.
 */
Route::get('/room/{id}/formula', 'FormulaController@index')->name('formula');
Route::post('/room/{id}/formula', 'FormulaController@update')->name('formula.update');
