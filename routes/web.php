<?php

use App\Http\Controllers\Officer\CriminalController;
use App\Http\Controllers\Officer\MainController;
use App\Http\Controllers\Officer\UserController;
use App\Http\Controllers\Officer\VisitorController;
use App\Http\Controllers\User\HistoryController;
use App\Http\Controllers\User\InformationController;
use App\Http\Controllers\User\KunjunganController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect(route('dashboard.index'));
});

//////////////////////////////////////
// Route USER mulai dari bawah sini --------------
//////////////////////////////////////
Route::group(['middleware' => ['auth']], function() {
	Route::get('dashboard', [InformationController::class, 'index'])->name('dashboard.index');

	Route::get('pendaftaran', [KunjunganController::class, 'index'])->name('kunjungan.index');
	Route::get('get_kriminal/{criminal}', [KunjunganController::class, 'get_kriminal'])->name('kunjungan.filter.kriminal'); // Menampilkan data kriminal ketika user daftar kunjungan
	Route::post('pendaftaran', [KunjunganController::class, 'daftar_kunjungan'])->name('kunjungan.store');
	
	Route::get('history', [HistoryController::class, 'index'])->name('history.index');

});

require __DIR__.'/auth.php';

//////////////////////////////////////
// Route OFFICER mulai dari bawah sini --------------
//////////////////////////////////////

require __DIR__.'/officerauth.php';

Route::group(['middleware' => ['auth:officer'], 'prefix'=>'officer'], function() {
	Route::get('dashboard', [MainController::class, 'index'])->name('officer.dashboard');

	Route::resource('user', UserController::class, ['as'=>'officer']);

	Route::get('criminal', [CriminalController::class, 'index'])->name('officer.criminal.index');
	Route::get('criminal/create', [CriminalController::class, 'create'])->name('officer.criminal.create');
	Route::post('criminal', [CriminalController::class, 'store'])->name('officer.criminal.store');
	Route::put('criminal/{criminal}', [CriminalController::class, 'update'])->name('officer.criminal.update');
	Route::get('criminal/{criminal}', [CriminalController::class, 'show'])->name('officer.criminal.show');
	Route::delete('criminal/{criminal}', [CriminalController::class, 'destroy'])->name('officer.criminal.destroy');

	Route::get('visitor', [VisitorController::class, 'index'])->name('officer.visitor.index');
	Route::get('visitor/list', [VisitorController::class, 'getVisitors'])->name('officer.visitor.list');

});


// Route::get('criminal', [CriminalController::class, 'index'])->name('officer.criminal.index');
// Route::get('criminal/create', [CriminalController::class, 'create'])->name('officer.criminal.create');
// Route::post('criminal', [CriminalController::class, 'store'])->name('officer.criminal.store');
// Route::get('criminal/{criminal}/edit', [CriminalController::class, 'edit'])->name('officer.criminal.edit');
// Route::put('criminal/{criminal}', [CriminalController::class, 'update'])->name('officer.criminal.update');
// Route::get('criminal/{criminal}', [CriminalController::class, 'show'])->name('officer.criminal.show');
// Route::delete('criminal/{criminal}', [CriminalController::class, 'destroy'])->name('officer.criminal.destroy');