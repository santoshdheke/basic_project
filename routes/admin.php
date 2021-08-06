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

Route::get('dashboard', 'DashboardController@index')->name('dashboard');
Route::post('logout', 'LoginController@logout')->name('logout');

Route::resource('blog-category', 'BlogCategoryController');
Route::resource('blog', 'Blog/media/santosh/ee60e00f-465b-405a-8ad7-c6e7a715243a/var/www/html/work/laravel/santosh/basic_projectController');
