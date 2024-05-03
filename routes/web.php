<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


//Rotas HomeController
Route::get('/home', [HomeController::class, 'index'])->name('home');

//Rotas UserController
Route::get('/users', [UserController::class, 'index'])->name('users.index');//listagem
Route::get('users/create', [UserController::class, 'create'])->name('users.create');//cadastro(formulário)
Route::post('/users', [UserController::class, 'store'])->name('users.store');//criação
Route::post('users/{user}', [UserController::class, 'show'])->name('users.show');//mostrar
Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');//formulário edição
Route::put('users/{user}', [UserController::class, 'update'])->name('users.update');//update dos edits
Route::delete('users/{user}', [UserController::class, 'destroy'])->name('users.destroy');//apagar

require __DIR__.'/auth.php';
