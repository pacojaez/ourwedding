<?php

use App\Http\Controllers\NovioController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\WelcomeController;

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
// Route::get('/', function () {
//     return view('welcome2');
// });
Route::get('/', [WelcomeController::class, 'index'])
->name('welcome');

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

});



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::middleware(['isAdmin'])->group(function(){

    Route::get('/novios', [NovioController::class, 'novios'])->name('novios');

    Route::post('/novios', [NovioController::class, 'edit'])->name('edit.novios');

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

    Route::get('/todos', function(){
        return view('todos');
    })->name('todos');

    Route::get('/clear-cache', function() {
        $exitCode = Artisan::call('cache:clear');
        $exitCodeView = Artisan::call('view:clear');
        return view('cachecleared');
    })->name('clearcache');

    Route::get('/changeInvitation', function(){
        return view('changeInvitation');
    })->name('changeInvitation');

});
