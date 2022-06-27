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
Route::get('/' , function(){
    return redirect()->route('login');
});

Auth::routes();


//Route::get('/wish-list' ,[App\])->name(wish.list);

Route::middleware('auth')->namespace('App\Http\Controllers')->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::post('/home' , 'HomeController@incomeStore')->name('income');

    Route::get('/wish-list' , 'wish\WishController@index')->name('wish.list');
    Route::post('/wish-list' , 'wish\WishController@store')->name('wish.list.store');
    Route::get('/wish-list/update/{id}' , 'wish\WishController@update')->name('wish.update');
    Route::post('/wish-list/update/{id}' , 'wish\WishController@updateStore')->name('wish.update.store');
    Route::get('/wish-list/delete/{id}' , 'wish\WishController@delete')->name('wish.delete');

    Route::get('/manage-income' , 'manage\ManageController@index')->name('manage');
});