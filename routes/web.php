<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

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
Route::get('/linkstorage', function () {
    Artisan::call('storage:link');
});

Route::get('/2', function () {
    return view('welcome');
});
Route::get('/', function () {
    return view('welcome2');
});

Route::middleware(['auth'])->group(function () {

    Route::get('/cancions', function () {
        return view('cancions');
    })->name('cancions');

    Route::get('/elmenu', function () {
        return view('elmenu');
    })->name('elmenu');

    Route::get('/mapa', function () {
        return view('mapa');
    })->name('mapa');

    Route::get('/elplan', function () {
        return view('elplan');
    })->name('elplan');

    Route::get('/galeria', function () {
        return view('galeria');
    })->name('galeria');

    Route::post('/cancions/save', [App\Http\Livewire\CancionsForm::class, 'saveCancion'])->name('saveCancion');

    // Route::get('/', [HomeController::class, 'home'])->name('index');
});



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::middleware(['isAdmin'])->group(function(){

    Route::get('/admin', function(){
        return view('admin');
    })->name('admin');

    Route::get('/usuarios', function(){
        return view('usuarios');
    })->name('usuarios');

    Route::get('/habitacions', function(){
        return view('habitacions');
    })->name('habitacions');

    Route::get('/presupuesto', function(){
        return view('presupuesto');
    })->name('presupuesto');

});
