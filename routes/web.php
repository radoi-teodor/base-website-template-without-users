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

Route::resource('/', 'Client');

Route::get('logout', 'Client@logout');

//BLOGS
Route::get('/blog', 'Client@blog');
Route::get('/blog/{permalink}', 'Client@view_blog');
Route::post('/blog/{permalink}/add-comment', 'Client@add_comment_blog')->middleware('auth');
Route::get('/blog/{permalink}/delete-comment/{comment_id}', 'Client@delete_comment_blog')->middleware('auth');
Route::get('/delete-blog/{id}', 'Client@delete_blog')->middleware('auth');

Route::match(['get', 'post'], '/contact-us', 'Client@contact_us');

Route::get('/about-us', 'Client@about_us');

Route::get('/terms-and-conditions', 'Client@terms_and_conditions');
Route::get('/privacy-policy', 'Client@privacy_policy');

Route::get('/sitemap.xml', 'Client@sitemap');

Route::match(['get', 'post'], 'administrator', 'Administrator@login')->middleware('auth.logged')->name('login');

Route::prefix('administrator')->middleware('auth')->group(function () {

    Route::get('/statistics', 'Administrator@statistics');
    Route::get('/store-setup', 'Administrator@setup');

    Route::match(['get', 'post'], '/settings', 'Administrator@settings');

    Route::match(['get', 'post'], '/add-blog', 'Administrator@add_blog');
    Route::match(['get', 'post'], '/edit-blog', 'Administrator@edit_blog');
    Route::match(['get', 'post'], '/edit-blog/{permalink}', 'Administrator@edit_blog_permalink');
    Route::match(['get', 'post'], '/find-blog', 'Administrator@find_blog');

    Route::get('/messages', 'Administrator@messages');

    Route::match(['get','post'], '/administrators-manager', 'Administrator@administrators_manager');

    // Utils
    Route::get('/mark-read/{id}', 'Administrator@mark_read');
    Route::get('/mark-unread/{id}', 'Administrator@mark_unread');
    Route::get('/save-message/{id}', 'Administrator@save_message');
    Route::get('/delete-message/{id}', 'Administrator@delete_message');

    Route::get('/delete-user/{id}', 'Administrator@delete_user');

});
