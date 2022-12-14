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

Route::get('/', function () {
    return redirect('produits');
});

Route::resource('unites', 'App\Http\Controllers\UniteController');
Route::resource('recettes', 'App\Http\Controllers\RecetteController');
Route::resource('produits', 'App\Http\Controllers\ProduitController');



