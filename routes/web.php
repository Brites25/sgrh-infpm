<?php

use App\Http\Controllers\DiresaunController;
use App\Http\Controllers\MunisipiuController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use App\Models\User;

Route::get('/', function () {
    return view('welcome');
});

//Munisipiu Routes
Route::post('municipio/search', [MunisipiuController::class, 'showMunisipiu'])->name('municipio.search');
Route::resource('municipio', MunisipiuController::class);

//Diresaun Routes
Route::post('diresaun/search', [DiresaunController::class, 'showDiresaun'])->name('diresaun.search');
Route::resource('diresaun', DiresaunController::class);

Route::get('/dashboard', [PageController::class, 'index'])->name('dashboard');
Route::get('/profile', [PageController::class, 'profile'])->name('profile');
Route::get('/permanente', [PageController::class, 'permanente'])->name('permanente');
Route::get('/kontratadu', [PageController::class, 'kontratadu'])->name('kontratadu');


Route::get('/departamentu', [PageController::class, 'departamentu'])->name('departamento');
Route::get('/lisensa', [PageController::class, 'lisensa'])->name('lisensa');
Route::get('/salariu', [PageController::class, 'salariu'])->name('salariu');
Route::get('/login', [UserController::class, 'login'])->name('login');
