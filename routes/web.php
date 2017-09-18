<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/dashboard', 'DashboardController@index');

Route::get('/ping', function() {
    if (Auth::check())
        return "Logged In: Session";
    else
        return Auth::onceBasic() ?: "Logged in: Basic";
});

Route::group(['middleware' => 'CheckAdmin'], function() {
    Route::get('/admin/logs', 'LogController@index');

    Route::get('/admin/users', 'UserController@index');
    Route::get('/admin/users/{user}/authorize', 'UserController@grantAuthorization');
    Route::get('/admin/users/{user}/deauthorize', 'UserController@revokeAuthorization');
});

Route::get('/{any}', 'Proxy')->where('any', '.*');
