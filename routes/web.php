<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Backend Routes
|--------------------------------------------------------------------------
*/

Route::get('/admin/panel','Back\DashboardController@index')->name('admin.dashboard');
Route::get('/admin/giris','Back\AuthController@login')->name('admin.login');
Route::post('/admin/giris','Back\AuthController@loginPost')->name('admin.login.post');
Route::get('/admin/cikis','Back\AuthController@logout')->name('admin.logout');





/*
|--------------------------------------------------------------------------
| Front Routes
|--------------------------------------------------------------------------
*/

// static routes
Route::get('/', 'Front\HomepageController@index')->name('homepage');
Route::get('/iletisim','Front\HomepageController@contact')->name('contact');
Route::post('iletisim','Front\HomepageController@contactPost')->name('contact.post');

// dynamic routes
Route::get('/kategori/{categorySlug}','Front\HomepageController@category')->name('category');
Route::get('/{pageSlug}','Front\HomepageController@page')->name('page');
Route::get('/{categorySlug}/{postSlug}', 'Front\HomepageController@post')->name('post');
