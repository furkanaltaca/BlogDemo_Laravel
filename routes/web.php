<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Backend Routes
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->name('admin.')->middleware('IsAdmin')->group(function () {
    Route::get('/', function(){
        return redirect()->route('admin.dashboard');
    });
    Route::get('panel', 'Back\DashboardController@index')->name('dashboard');

    Route::get('giris', 'Back\AuthController@login')->name('login')->middleware('IsLoggedIn')->withoutMiddleware('IsAdmin');
    Route::post('giris', 'Back\AuthController@loginPost')->name('login.post')->middleware('IsLoggedIn')->withoutMiddleware('IsAdmin');
    Route::get('cikis', 'Back\AuthController@logout')->name('logout');

    // Article Routes
    Route::patch('makaleler/updateStatus','Back\ArticleController@updateStatus')->name('makaleler.updateStatus');
    Route::get('makaleler/silinenler','Back\ArticleController@trashed')->name('makaleler.trashed');
    Route::patch('makaleler/recover','Back\ArticleController@recover')->name('makaleler.recover');
    Route::delete('makaleler/hardDelete','Back\ArticleController@hardDelete')->name('makaleler.hardDelete');
    Route::resource('makaleler', 'Back\ArticleController');
    // End Article Routes

    // Category Routes
    Route::get('kategoriler','Back\CategoryController@index')->name('kategoriler.index');
    Route::post('kategoriler/create','Back\CategoryController@create')->name('kategoriler.create');
    Route::get('kategoriler/updateStatus','Back\CategoryController@updateStatus')->name('kategoriler.updateStatus');

    // End Category Routes
});





/*
|--------------------------------------------------------------------------
| Front Routes
|--------------------------------------------------------------------------
*/

// static routes
Route::get('/', 'Front\HomepageController@index')->name('homepage');
Route::get('/iletisim', 'Front\HomepageController@contact')->name('contact');
Route::post('iletisim', 'Front\HomepageController@contactPost')->name('contact.post');

// dynamic routes
Route::get('/kategori/{categorySlug}', 'Front\HomepageController@category')->name('category');
Route::get('/{pageSlug}', 'Front\HomepageController@page')->name('page');
Route::get('/{categorySlug}/{postSlug}', 'Front\HomepageController@post')->name('post');
