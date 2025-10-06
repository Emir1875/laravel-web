<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\QuestionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


Route::get('/tes', function () {
    return view('welcome');
});

Route::get('/pcr', function () {
    return 'Selamat Datang di halaman PCR';
});

Route::get('/mahasiswa', function () {
    return 'Hallo Mahasiswa';
});

Route::get('/nama/{param1}', function ($param1) {
    return 'Nama saya : ' . $param1;
});

Route::get('/nim/{param1}', function ($param1) {
    return 'NIM saya : ' . $param1;
});

Route::get('/mahasiswa/{param1}', [MahasiswaController::class, 'show']
);

Route::get('/about', function () {
    return view('halaman-about');
});

Route::get('/home',[HomeController::class, 'index']);

Route::post('question/store', [QuestionController::class, 'store'])
		->name('question.store');

Route::get('/auth', [AuthController::class, 'index'])->name('login.index');
Route::post('/auth/login', [AuthController::class, 'login'])->name('login.process');

// Route untuk halaman sukses/dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('web');
