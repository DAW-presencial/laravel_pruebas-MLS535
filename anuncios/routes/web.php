<?php

use App\Http\Controllers\LanguageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
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

Route::view('/','home')->name('home');

Route::fallback(function () {
    return redirect('/home');

});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


//IMPORTANTE PORQUE CAMBIA EL IDIOMA!
Route::get('language-change', [LanguageController::class, 'changeLanguage'])->name('changeLanguage');

Route::resource('posts',PostController::class)->middleware(['auth']);


