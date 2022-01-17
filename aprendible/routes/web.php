<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Gate;
use \App\Http\Controllers\AgendaController;
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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/dashboard', function () {
    //rascar es el nombre de la puerta
    Gate::define('rascar', function(){
        return true;
        //si queremos que salga el error 403 tendremos que poner return false
    });
    abort_unless(Gate::allows('rascar'),403);
    return view('dashboard');

})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/agenda',[AgendaController::class, 'index'])->name('agenda');
