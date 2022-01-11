<?php

use App\Http\Controllers\artistaController;
use App\Http\Controllers\albumController;
use App\Http\Controllers\cancionController;
use App\Http\Controllers\generoController;
use App\Http\Controllers\landingpageController;
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
Route::resource('artista',artistaController::class);
Route::resource('album',albumController::class);
Route::resource('cancion',cancionController::class);
Route::resource('genero',generoController::class);
Route::resource('landingpage',landingpageController::class);

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [ArtistaController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function(){
    Route::get('/home', [ArtistaController::class, 'index'])->name('home');
});

Route::get('/', function () {
    return view('landingpage');
}); // recordar cambiar


