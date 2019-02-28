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
    return view('welcome');
});

use Sassnowski\LaravelShareableModel\Shareable\ShareableLink;

Route::get('shared/{shareable_link}', ['middleware' => 'shared', function (ShareableLink $link) {
    return $link->shareable;
}]);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
Route::post('/store-post', 'HomeController@store')->name('store');
Route::get('/edit/{post}', 'HomeController@edit')->name('edit');
Route::patch('/update/{post}', 'HomeController@update')->name('update');
