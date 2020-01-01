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
})->middleware('auth');


Route::get('login', array('uses' => 'LoginController@showLogin'))->name('show.login');
Route::post('login', array('uses' => 'LoginController@doLogin'))->name('login');
Route::get('logout', array('uses' => 'LoginController@doLogout'))->name('logout');


Route::get('/sign-up', array('uses' => 'UserController@showForm'))->name('show.user.reg.form');
Route::post('/register-user', array('uses' => 'UserController@create'))->name('register.user');
Route::get('/check-email', array('uses' => 'UserController@checkEmail'));

Route::get('/home', array('uses' => 'UserController@index'))->name('user.home');

