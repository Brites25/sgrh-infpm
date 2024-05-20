<?php

use App\Http\Controllers\MunisipiuController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use App\Models\User;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('municipio', MunisipiuController::class);
Route::post('/munisipiu/search', [MunisipiuController::class, 'showMunisipiu'])->name('munisipiu.search');

Route::get('/dashboard', [PageController::class, 'index'])->name('dashboard');
Route::get('/profile', [PageController::class, 'profile'])->name('profile');
Route::get('/permanente', [PageController::class, 'permanente'])->name('permanente');
Route::get('/kontratadu', [PageController::class, 'kontratadu'])->name('kontratadu');


Route::get('/diresaun', [PageController::class, 'diresaun'])->name('diresaun');
Route::get('/departamentu', [PageController::class, 'departamentu'])->name('departamento');
Route::get('/lisensa', [PageController::class, 'lisensa'])->name('lisensa');
Route::get('/salariu', [PageController::class, 'salariu'])->name('salariu');
Route::get('/login',[UserController::class, 'login'])->name('login');


