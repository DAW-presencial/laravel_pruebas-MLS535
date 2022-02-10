<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\FlightController;
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
    return view('flights.index');
});

Route::get('language-change', [LanguageController::class, 'changeLanguage'])->name('changeLanguage');
Route::resource('flights',FlightController::class);

//Route::fallback(function () {
//    return redirect('/');
//});
