<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', "HomeController@index");
Route::get('test', "HomeController@test");
Auth::routes();

Route::get('login/github', 'Auth\LoginController@redirectToGithub')->name('login.github');
Route::get('login/github/callback', 'Auth\LoginController@handleGithubCallback');
Route::post('/github/events', 'GithubEventsController@index')->name('github.events');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');
Route::get('/notifications', 'HomeController@notifications')->name('notifications');

Route::group(['middleware' => 'auth'], function () {
    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
    Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
    Route::post('profile/logout', 'ProfileController@logoutOtherDevices')->name('logout.other.device');
    Route::group(['prefix' => 'messages'], function () {
        Route::get('/', ['as' => 'messages', 'uses' => 'MessagesController@index']);
        Route::get('create', ['as' => 'messages.create', 'uses' => 'MessagesController@create']);
        Route::post('/', ['as' => 'messages.store', 'uses' => 'MessagesController@store']);
        Route::get('{id}', ['as' => 'messages.show', 'uses' => 'MessagesController@show']);
        Route::put('{id}', ['as' => 'messages.update', 'uses' => 'MessagesController@update']);
    });
    Route::get('/home', 'HomeController@dashboard')->name('home');
    Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');
});
Route::middleware('admin')->group(function () {
    Route::put('user/{user}/password', 'UsersController@updatePassword')->name('users.update.pass');
    Route::resource('roles', 'RoleController');
    Route::resource('user', 'UsersController');
    Route::resource('users', 'OtherUserController');
    Route::put('user/{user}/business', 'OtherUserController@updateToBusiness')->name('users.to.business');
    Route::put('user/{user}/partner', 'OtherUserController@updateToPartner')->name('users.update.partner');
    Route::get('user/{user}/account', 'OtherUserController@accountManagement')->name('users.account');

    //account manager
    Route::put('account/{user}/type', 'OtherUserController@accountToType')->name('users.account.type');
    Route::put('account/{user}/debited', 'OtherUserController@accountToDebited')->name('users.account.debited');

    Route::resource('country', 'CountryController');
    Route::resource('locality', 'LocalityController');

    //transactions
    Route::resource('transaction', 'TransactionsController');

    //payment
    Route::resource('payment', 'PaymentController');

    //payment cost
    Route::resource('paymentcost', 'PaymentCostController');

    //other service
    Route::resource('otherservice', 'OtherServiceController');

    //other services cost
    Route::resource('otherservicecost', 'OtherServiceCostController');
	
	//bank
    Route::resource('bank', 'BankController');
	
	//bank cost
    Route::resource('bankcost', 'BankCostController');
});
Route::middleware('basic')->group(function () {
    Route::get('methods/payments', 'UserPaymentController@userPayments')->name('users.payments');
    Route::get('methods/{id}/payments', 'UserPaymentController@methodPayment')->name('method.payments');
    Route::put('payments/{method}/out', 'UserPaymentController@paymentOutMethod')->name('payment.method.out');
    Route::get('methods/service', 'UserServiceController@userService')->name('users.service');
    Route::get('methods/{id}/service', 'UserServiceController@methodService')->name('method.services');
});
Route::middleware('business')->group(function () {
});
Route::middleware('partner')->group(function () {
});
