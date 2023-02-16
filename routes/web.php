<?php

use App\Http\Controllers\MainController;
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

Route::get('/', [MainController :: class, 'home'])
    ->name('home');

Route::get('/movie', [MainController :: class, 'movieHome'])
    ->name('movie.home');

Route::get('/movie/delete/{movie}', [MainController :: class, 'movieDelete'])
    ->name('movie.delete');

Route::get('/movie/create', [MainController :: class, 'movieCreate'])
    ->name('movie.create');
Route::post('/movie/create', [MainController :: class, 'movieStore'])
    ->name('movie.store');

Route::get('/movie/edit/{movie}', [MainController :: class, 'movieEdit'])
    ->name('movie.edit');