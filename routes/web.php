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

Route::get('/', 'HomeController@index');

Route::get('/about' , 'HomeController@about');

Route::get('/contact' , 'HomeController@contactus');

Route::get('/gallery' , 'HomeController@gallery');

Route::get('/services' ,  'HomeController@services');

Route::get('/category/{id}' , 'HomeController@category');

Route::get('/locale/{locale}' , function($locale) {
    \Session::put('locale' , $locale);
    return redirect()->back();
});

Route::post('/contactus' , 'HomeController@contact');
Route::post('/subscribe' , 'HomeController@subscribe');

Route::get('/admin' , 'AdminController@index');
Route::get('/admin/category' , 'AdminController@categories');
Route::post('/admin/category/create' , 'AdminController@create_category');
Route::get('/admin/category/edit/{id}' , 'AdminController@edit_category');
Route::put('/admin/category/update' , 'AdminController@update_category');
Route::get('/admin/category/delete/{id}' , 'AdminController@delete_category');
Route::delete('/admin/category/destroy' , 'AdminController@destroy_category');
Route::get('/admin/category/{categortyid}' , 'AdminController@category');
Route::get('/admin/photo/{id}' , 'AdminController@photo');
Route::post('/admin/photo/create' , 'AdminController@create_photo');
Route::get('/admin/photo/delete/{id}' , 'AdminController@delete_photo');
Route::delete('/admin/photo/destroy' , 'AdminController@destroy_photo');
Route::get('/admin/aboutus' , 'AdminController@aboutus');
Route::post('/admin/aboutus/create' , 'AdminController@create_about');
Route::get('/admin/aboutus/activate/{id}' , 'AdminController@activate_about');
Route::get('/admin/aboutus/pdf/{id}' , 'AdminController@about_pdf');
Route::get('/admin/aboutus/delete/{id}' , 'AdminController@delete_about');
Route::delete('/admin/aboutus/destroy' , 'AdminController@destroy_about');
Route::get('/admin/contact/delete/{id}' , 'AdminController@delete_contact');
Route::get('/admin/contact/pdf/{id}' , 'AdminController@contact_pdf');
Route::delete('/admin/contact/destroy' , 'AdminController@destroy_contact');
Route::get('/admin/contact/file/{id}' , 'AdminController@contact_file');
Route::get('/admin/service' , 'AdminController@get_services');
Route::post('/admin/service/create' , 'AdminController@create_service');
Route::get('/admin/service/delete/{id}' , 'AdminController@delete_service');
Route::delete('/admin/service/destroy' , 'AdminController@destroy_service');

Route::get('/admin/social' , 'AdminController@get_socials');
Route::post('/admin/social/create' , 'AdminController@create_social');
Route::get('/admin/social/edit/{id}' , 'AdminController@edit_social');
Route::put('/admin/social/update' , 'AdminController@update_social');
Route::get('/admin/social/delete/{id}' , 'AdminController@delete_social');
Route::delete('/admin/social/destroy' , 'AdminController@destroy_social');
Route::get('/admin/social/activate/{id}' , 'AdminController@activate_social');

Route::get('/admin/customer' , 'AdminController@get_customers');
Route::post('/admin/customer/create' , 'AdminController@create_customer');
Route::get('/admin/customer/delete/{id}' , 'AdminController@delete_customer');
Route::delete('/admin/customer/destroy' , 'AdminController@destroy_customer');

Route::get('/admin/follower' , 'AdminController@get_followers');
Route::get('/admin/follower/delete/{id}' , 'AdminController@delete_follower');
Route::delete('/admin/follower/destroy' , 'AdminController@destroy_follower');
Route::post('/admin/follower/sendmsg' , 'AdminController@sendmsg');

Route::get('/admin/email' , 'AdminController@emails');
Route::get('/admin/email/delete/{id}' , 'AdminController@delete_email');
Route::delete('/admin/email/destroy' , 'AdminController@destroy_email');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
