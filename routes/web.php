<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenteriController;
use App\Http\Controllers\BphController;
use Illuminate\Support\Facades\Auth;


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


// Route untuk mengarahkan menteri ke chart kementrian mereka
Route::get('/menteri/prokerchart', [MenteriController::class, 'redirectToProkerChart']);

// Route untuk menampilkan chart berdasarkan ID kementrian
Route::get('/menteri/prokerchart/{id_kementrian}', [MenteriController::class, 'showChart'])->name('prokerchart');


Route::get('/bph/prokerchart', [BphController::class, 'showChart']);




