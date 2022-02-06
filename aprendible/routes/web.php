<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Gate;
use \App\Http\Controllers\AgendaController;
use \App\Http\Controllers\PortfolioController;
use App\Http\Controllers\MessageController;
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


Route::get('/', function(){
    return view('home');
})->name('home');

Route::view('contact', 'contact')->name('contact');
Route::post('contact', [MessageController::class, 'store']);

Route::get('/about', function(){
    return view('about');
})->name('about');




Route::resource('/project', PortfolioController::class)->names('projects');
//Route::get('/portfolio',[PortfolioController::class, 'index'])->name('projects.index');
//Route::get('/portfolio/create',[PortfolioController::class, 'create'])->name('projects.create');
//
//Route::get('/portfolio/{project}/editar',[PortfolioController::class, 'edit'])->name('projects.edit');
//Route::patch('/portfolio/{project}',[PortfolioController::class, 'update'])->name('projects.update');
//
//Route::post('/portfolio',[PortfolioController::class, 'store'])->name('projects.store');
//Route::get('/portfolio/{id}',[PortfolioController::class, 'show'])->name('portfolio.show');
//Route::delete('/portfolio/{project}',[PortfolioController::class, 'destroy'])->name('projects.destroy');
//
//
//Route::resource('/project', AgendaController::class)->names('projects')->parameters(['id'=>'project']);
