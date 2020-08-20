<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Backend Routes
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->name('admin.')->middleware('IsAdmin')->group(function () {
    Route::get('/', function () {
        return redirect()->route('admin.dashboard');
    });
    Route::get('giris', 'Back\AuthController@login')->name('login')->middleware('IsLoggedIn')->withoutMiddleware('IsAdmin');
    Route::post('giris', 'Back\AuthController@loginPost')->name('login.post')->middleware('IsLoggedIn')->withoutMiddleware('IsAdmin');
    Route::get('panel', 'Back\DashboardController@index')->name('dashboard');
    Route::get('cikis', 'Back\AuthController@logout')->name('logout');

    Route::get('makaleler/silinenler','Back\ArticleController@trashed')->name('makaleler.trashed');
    Route::get('makaleler/updateStatus','Back\ArticleController@updateStatus')->name('makaleler.updateStatus');
    Route::get('makaleler/deleteArticle/{id}','Back\ArticleController@delete')->name('makaleler.delete');
    Route::get('makaleler/recoverArticle/{id}','Back\ArticleController@recover')->name('makaleler.recover');
    Route::get('makaleler/hardDeleteArticle/{id}','Back\ArticleController@hardDelete')->name('makaleler.hardDelete');
    Route::resource('makaleler', 'Back\ArticleController');
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
