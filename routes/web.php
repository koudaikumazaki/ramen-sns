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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('stores', StoreController::class);
Route::prefix('stores')->name('stores.')->group(function(){
  Route::put('/{store}/like', 'StoreController@like')->name('like');
  Route::delete('/{store}/like', 'StoreController@unlike')->name('unlike');
});
