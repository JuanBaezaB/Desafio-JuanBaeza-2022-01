<?php

use App\Http\Controllers\artistaController;
use App\Http\Controllers\albumController;
use App\Http\Controllers\cancionController;
use App\Http\Controllers\generoController;

use App\Http\Controllers\landingpageController;
use App\Http\Controllers\artistaspublicController;
use App\Http\Controllers\albumespublicController;
use App\Http\Controllers\cancionespublicController;
use App\Http\Controllers\generospublicController;
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


Route::resource('artista',artistaController::class)->middleware('auth');
Route::resource('album',albumController::class)->middleware('auth');
Route::resource('cancion',cancionController::class)->middleware('auth');
Route::resource('genero',generoController::class)->middleware('auth');

Route::resource('artistas_public',artistaspublicController::class);
Route::resource('albumes_public',albumespublicController::class);
Route::resource('canciones_public',cancionespublicController::class);
Route::resource('generos_public',generospublicController::class);

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [ArtistaController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function(){
    Route::get('/home', [ArtistaController::class, 'index'])->name('home');
});

Route::get('/', [landingpageController::class, 'index']);



