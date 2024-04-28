<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/login', [AuthManager::class, 'login'])->name('login');
Route::post('/login', [AuthManager::class, 'loginPost'])->name('login.post');

Route::get('/registration', [AuthManager::class, 'registration'])->name('registration');
Route::post('/registration', [AuthManager::class, 'registrationPost'])->name('registration.post');

Route::get('/logout', [AuthManager::class, 'logout'])->name('logout');

Route::get('/cat', [AuthManager::class, 'cat'])->name('cat');
Route::post('/cat', [AuthManager::class, 'catPost'])->name('cat.post');

Route::get('/myprofile', [AuthManager::class, 'myprofile'])->name('myprofile');
Route::post('/myprofile', [AuthManager::class, 'myprofileUpdate'])->name('myprofile.post');
Route::delete('/myprofile', [AuthManager::class, 'myprofileDelete'])->name('myprofile.delete');