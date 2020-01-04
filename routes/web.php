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

// Route::get('/', function () {
//     return view('welcome');
// })->middleware('auth');

Route::get('logout', array('uses' => 'LoginController@doLogout'))->name('logout');

Route::middleware('guest')->group(function(){
    Route::get('login', array('uses' => 'LoginController@showLogin'))->name('show.login');
    Route::post('login', array('uses' => 'LoginController@doLogin'))->name('login');
    
    Route::get('/sign-up', array('uses' => 'UserController@showForm'))->name('show.user.reg.form');
    Route::post('/register-user', array('uses' => 'UserController@create'))->name('register.user');
    Route::get('/check-email', array('uses' => 'UserController@checkEmail'));
});


Route::middleware('auth')->group(function() {
    Route::get('/', function(){ return redirect()->route('user.home'); });
    Route::name('user.')->group(function(){
        Route::get('/home', array('uses' => 'UserController@index'))->name('home');
        Route::post('/create-contact', array('uses' => "ContactController@store"))->name('create.contact');
        Route::get('/contact/{contact_id?}', array('uses' => "ContactController@getContact"))->name('get.contact');
        Route::put('/contact/{contact_id?}', array('uses' => "ContactController@update"))->name('update.contact');
        Route::delete('/contact/{contact_id?}', array('uses' => 'ContactController@delete'))->name('delete.contact');
        Route::post('contact/search/{something?}', array('uses' => 'ContactController@search'))->name('search.name');
    });
});
