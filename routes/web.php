<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BeritaController;


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

// Route untuk login dan logout
Route::get('login', [AuthController::class, 'showLogin'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

// Route untuk mengatur bahasa
Route::get('set-language/{lang}', function ($lang) {
    session(['app_language' => $lang]);
    return redirect()->back();
})->name('setLanguage');

// Middleware untuk memeriksa autentikasi pengguna
Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return redirect()->route('berita.index'); // Redirect default ke halaman berita
    });
    Route::resource('berita', BeritaController::class);
});
