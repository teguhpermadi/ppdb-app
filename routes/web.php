<?php

use App\Http\Controllers\DataSiswaController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');

// Route::middleware('auth')->group(function(){
//     Route::get('/datasiswa/create/{param?}', [DataSiswaController::class, 'create'])->name('datasiswa.create');
//     Route::resource('datasiswa', DataSiswaController::class);
// });

Route::controller(DataSiswaController::class)->middleware('auth')->group(function() {
    Route::get('formulir/', 'index')->name('datasiswa.index');

    Route::get('formulir/siswa/create', 'siswaCreate')->name('datasiswa.siswaCreate');
    Route::post('formulir/siswa/store', 'siswaStore')->name('datasiswa.siswaStore');
    
    Route::get('formulir/ayah/create', 'ayahCreate')->name('datasiswa.ayahCreate');
    Route::post('formulir/ayah/store', 'ayahStore')->name('datasiswa.ayahStore');

    Route::get('formulir/ibu/create', 'ibuCreate')->name('datasiswa.ibuCreate');
    Route::post('formulir/ibu/store', 'ibuStore')->name('datasiswa.ibuStore');
    
    Route::get('formulir/wali/create', 'waliCreate')->name('datasiswa.waliCreate');
    Route::post('formulir/wali/store', 'waliStore')->name('datasiswa.waliStore');
});
