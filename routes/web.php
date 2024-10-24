<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController; // Pastikan ada import ini
use App\Http\Controllers\ProfileController; // Jangan lupa untuk mengimpor ProfileController

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route untuk tugas 2
Route::get('/profile', [ProfileController::class, 'profile']);
Route::get('/user/profile', [ProfileController::class, 'profile']);
Route::get('/user/show/{id}', [UserController::class, 'show'])->name('user.show');


// Route untuk tugas 3 & 4
Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
Route::post('/user/store', [UserController::class, 'store'])->name('user.store');


// Route untuk upload profile picture
Route::post('/profile/upload', [ProfileController::class, 'uploadProfilePicture'])->name('upload.profile.picture');

// Route untuk mengarahkan ke method index pada UserController (tugas 5)
Route::get('/user', [UserController::class, 'index'])->name('user.index');

// Route untuk mengedit user
Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');

// Route untuk menghapus user (tambahan yang kurang)
Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');

Route::get('/users', [UserController::class, 'index'])->name('user.list');
