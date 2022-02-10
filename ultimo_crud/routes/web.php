<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LanguageController;
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
//Route::view('/','home')->name('home');





Route::resource('posts',PostController::class);

//IMPORTANTE PORQUE CAMBIA EL IDIOMA!
Route::get('language-change', [LanguageController::class, 'changeLanguage'])->name('changeLanguage');


Route::fallback(function () {
    return redirect('/');

});

