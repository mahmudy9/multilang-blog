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
    return view('home');
});

Route::get('/about' , function() {
    return view('about');
});

Route::get('/contact' , function() {
    return view('contact');
});

Route::get('/gallery' , function() {
    return view('gallery');
});

Route::get('/services' , function() {
    return view('services');
});

Route::get('/category' , function() {
    return view('category');
});

Route::get('/locale/{locale}' , function($locale) {
    \Session::put('locale' , $locale);
    return redirect()->back();
});

Route::post('/contactus' , 'HomeController@contact');
Route::post('/subscribe' , 'HomeController@subscribe');

Route::get('/admin' , 'AdminController@index');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
