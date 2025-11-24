<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\QuestionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PelangganController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;


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

Route::get('/home',[HomeController::class, 'index'])->name('home');

Route::post('question/store', [QuestionController::class, 'store'])
		->name('question.store');

Route::get('/auth', [AuthController::class, 'index'])->name('login.index');
Route::post('/auth/login', [AuthController::class, 'login'])->name('login.process');

// Route untuk halaman sukses/dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('web');

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('pelanggan', PelangganController::class);

