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



Auth::routes();

Route::get('/medlife-dashboard', 'HomeController@index');


Route::resource('card', 'AdminCardController');
Route::resource('subpage', 'AdminSubpageController');
Route::resource('lang', 'LanguagesController');
Route::resource('page', 'AdminPagesController');
Route::resource('text', 'AdminTextController');
Route::get('/pg/{pageId}/{langID}', 'PagesController@getPage')->name('getPage');
Route::put('page-update/{pageID}', 'AdminPagesController@switchNavActive')->name('page.update.nav');
Route::put('page-update-welcome/{pageID}', 'AdminPagesController@switchWelcome')->name('page.update.welcome');
Route::put('subpage-update/{subpageID}', 'AdminSubpageController@switchDropActive')->name('subpage.update.drop');
Route::get('/{langID?}', "PagesController@WelcomePage")->name('wellcome');

