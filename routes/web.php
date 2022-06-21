<?php

use App\Http\Controllers\PengunjungController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
	return 'ini aku broo';
    // return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/officer/dashboard', function () {
    return view('officer.dashboard');
})->middleware(['auth:officer'])->name('officer.dashboard');

require __DIR__.'/officerauth.php';

Route::get('/pengunjung', [PengunjungController::class, 'index']);
Route::get('/barang', [PengunjungController::class, 'barang'])->name('pengunjung.barang');