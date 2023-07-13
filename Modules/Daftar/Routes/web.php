<?php
// use Modules\Daftar\Http\Controllers\DaftarController;
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

// Route::prefix('/')->group(function() {
    // Route::get('/', 'DaftarController@index');
    Route::get('/', 'DaftarController@index')->name('index');
    Route::get('daftar/create', 'DaftarController@create')->name('daftar.create');
    Route::post('daftar/store', 'DaftarController@store')->name('daftar.store');
    Route::get('daftar/{id}', 'DaftarController@show')->name('daftar.show');
    Route::get('daftar/{id}/edit', 'DaftarController@edit')->name('daftar.edit');
    Route::PATCH('daftar/{id}/update', 'DaftarController@update')->name('daftar.update');
    Route::delete('daftar/{id}/delete', 'DaftarController@destroy')->name('daftar.destroy');
// });
