<?php
// app/Http/Controllers/AuthController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    public function index()
    {
        // Menampilkan view login-form
        return view('auth.login-form');
    }

    public function login(Request $request)
    {
        // Aturan Validasi
        $rules = [
            'username' => 'required',
            'password' => [
                'required',
                'min:3',
                'regex:/[A-Z]/', // Harus mengandung huruf kapital
            ],
        ];

        // Pesan Kesalahan Bahasa Indonesia
        $messages = [
            'username.required' => '⚠️ Username wajib diisi.',
            'password.required' => '⚠️ Password wajib diisi.',
            'password.min' => '⚠️ Password minimal harus 3 karakter.',
            'password.regex' => '⚠️ Password harus mengandung minimal satu huruf kapital.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        // Jika rule tidak sesuai, redirect kembali ke halaman login
        if ($validator->fails()) {
            return Redirect::to('/auth')
                        ->withErrors($validator)
                        ->withInput();
        }

        // --- Asumsi Kredensial Valid (Hanya untuk demonstrasi) ---
        // Jika username dan password sama-sama 'admin' dan rule sudah dilalui
        if ($request->username === 'admin' && $request->password === 'Admin123') {

            // Jika memiliki value yang sama dan rule sudah berhasil dilalui, arahkan ke halaman baru
            return Redirect::to('/dashboard')
                ->with('success', '✅ Login Berhasil! Selamat datang, ' . $request->username . '!');
        }

        // Jika rule dilalui tapi kredensial tidak cocok
        return Redirect::to('/auth')
            ->with('error', '❌ Username atau password salah.')
            ->withInput();
    }
}
