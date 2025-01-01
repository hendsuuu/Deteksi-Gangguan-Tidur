<?php

use App\Http\Controllers\History;
use Illuminate\Support\Facades\Route;
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
    return view('home');
})->name('home');
Route::get('/education', function () {
    return view('education');
})->name('education');
Route::get('/bantuan', function () {
    return view('bantuan');
})->name('bantuan');
Route::resource('history', History::class);
Route::get('history/{id}/download', [History::class, 'download'])->name('history.download');
Route::get('history/{id}/detail', [History::class, 'detail'])->name('history.detail');

Route::get('/predict', function () {
    return view('prediksi');
})->name('deteksi');
Route::post('/submit', [History::class, 'store'])->name('deteksi.process');
// Route::post('/store-history', )->name('history.store');