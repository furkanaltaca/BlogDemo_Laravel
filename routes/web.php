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

Route::get('/', 'Front\HomepageController@index')->name('homepage');
Route::get('/kategori/{categorySlug}','Front\HomepageController@category')->name('category');
Route::get('/{categorySlug}/{postSlug}', 'Front\HomepageController@post')->name('post');