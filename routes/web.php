<?php

use App\Http\Controllers\Officer\CriminalController;
use App\Http\Controllers\Officer\JadwalKunjunganController;
use App\Http\Controllers\Officer\MainController;
use App\Http\Controllers\Officer\PengunjungController;
use App\Http\Controllers\Officer\PetugasController;
use App\Http\Controllers\Officer\UserController;
use App\Http\Controllers\Officer\VisitorController;
use App\Http\Controllers\Officer\WargaRutanController;
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

Route::group(['prefix'=>'officer'], function() {
	Route::get('dashboard', [MainController::class, 'index'])->name('officer.dashboard');

	Route::resource('user', UserController::class, ['as'=>'officer']);

	Route::get('data/pengunjung', [PengunjungController::class, 'index'])->name('officer.pengunjung.index');
	Route::get('data/pengunjung/create', [PengunjungController::class, 'create'])->name('officer.pengunjung.create');
	Route::post('data/pengunjung', [PengunjungController::class, 'store'])->name('officer.pengunjung.store');
	Route::get('data/pengunjung/{pengunjung}', [PengunjungController::class, 'edit'])->name('officer.pengunjung.edit');
	Route::put('data/pengunjung/{pengunjung}', [PengunjungController::class, 'update'])->name('officer.pengunjung.update');
	Route::delete('data/pengunjung/{pengunjung}', [PengunjungController::class, 'destroy'])->name('officer.pengunjung.destroy');
	
	Route::get('data/petugas', [PetugasController::class, 'index'])->name('officer.petugas.index');
	Route::get('data/petugas/create', [PetugasController::class, 'create'])->name('officer.petugas.create');
	Route::post('data/petugas', [PetugasController::class, 'store'])->name('officer.petugas.store');
	Route::get('data/petugas/{petugas}', [PetugasController::class, 'edit'])->name('officer.petugas.edit');
	Route::put('data/petugas/{petugas}', [PetugasController::class, 'update'])->name('officer.petugas.update');
	Route::delete('data/petugas/{petugas}', [PetugasController::class, 'destroy'])->name('officer.petugas.destroy');
	
	Route::get('data/warga_rutan', [WargaRutanController::class, 'index'])->name('officer.warga_rutan.index');
	Route::get('data/warga_rutan/create', [WargaRutanController::class, 'create'])->name('officer.warga_rutan.create');
	Route::post('data/warga_rutan', [WargaRutanController::class, 'store'])->name('officer.warga_rutan.store');
	Route::get('data/warga_rutan/{warga_rutan}', [WargaRutanController::class, 'edit'])->name('officer.warga_rutan.edit');
	Route::put('data/warga_rutan/{warga_rutan}', [WargaRutanController::class, 'update'])->name('officer.warga_rutan.update');
	Route::delete('data/warga_rutan/{warga_rutan}', [WargaRutanController::class, 'destroy'])->name('officer.warga_rutan.destroy');
	
	Route::get('data/jadwal_kunjungan', [JadwalKunjunganController::class, 'index'])->name('officer.jadwal_kunjungan.index');
	Route::get('data/jadwal_kunjungan/create', [JadwalKunjunganController::class, 'create'])->name('officer.jadwal_kunjungan.create');
	Route::post('data/jadwal_kunjungan', [JadwalKunjunganController::class, 'store'])->name('officer.jadwal_kunjungan.store');
	Route::get('data/jadwal_kunjungan/{jadwal_kunjungan}', [JadwalKunjunganController::class, 'edit'])->name('officer.jadwal_kunjungan.edit');
	Route::put('data/jadwal_kunjungan/{jadwal_kunjungan}', [JadwalKunjunganController::class, 'update'])->name('officer.jadwal_kunjungan.update');
	Route::delete('data/jadwal_kunjungan/{jadwal_kunjungan}', [JadwalKunjunganController::class, 'destroy'])->name('officer.jadwal_kunjungan.destroy');
	
	// Route::get('criminal', [CriminalController::class, 'index'])->name('officer.criminal.index');
	// Route::get('criminal/create', [CriminalController::class, 'create'])->name('officer.criminal.create');
	// Route::post('criminal', [CriminalController::class, 'store'])->name('officer.criminal.store');
	// Route::put('criminal/{criminal}', [CriminalController::class, 'update'])->name('officer.criminal.update');
	// Route::get('criminal/{criminal}', [CriminalController::class, 'show'])->name('officer.criminal.show');
	// Route::delete('criminal/{criminal}', [CriminalController::class, 'destroy'])->name('officer.criminal.destroy');

	// Route::get('visitor/tahanan', [VisitorController::class, 'tahanan'])->name('officer.visitor.tahanan');
	// Route::get('visitor/pidana', [VisitorController::class, 'pidana'])->name('officer.visitor.pidana');
	// Route::get('visitor/kunjungan/{id}', [VisitorController::class, 'detail_kunjungan'])->name('officer.visitor.kunjungan.detail');
	
	// Route::get('jadwal-jaga', [MainController::class, 'jadwal_jaga'])->name('officer.jadwal-jaga');
	// Route::post('jadwal-jaga/create-jadwal', [MainController::class, 'create_jadwal'])->name('officer.jadwal.create');
	// Route::post('jadwal-jaga/create-petugas', [MainController::class, 'create_petugas'])->name('officer.create.petugas');
	// Route::delete('jadwal-jaga/delete-petugas/{petugas}', [MainController::class, 'delete_petugas'])->name('officer.delete.petugas');

	// Route::get('laporan', [MainController::class, 'laporan'])->name('officer.laporan');

	// Route::get('tahanan-download', [MainController::class, 'tahananPdf'])->name('officer.download.tahanan');
	// Route::get('pidana-download', [MainController::class, 'pidanaPdf'])->name('officer.download.pidana');
});


// Route::get('criminal', [CriminalController::class, 'index'])->name('officer.criminal.index');
// Route::get('criminal/create', [CriminalController::class, 'create'])->name('officer.criminal.create');
// Route::post('criminal', [CriminalController::class, 'store'])->name('officer.criminal.store');
// Route::get('criminal/{criminal}/edit', [CriminalController::class, 'edit'])->name('officer.criminal.edit');
// Route::put('criminal/{criminal}', [CriminalController::class, 'update'])->name('officer.criminal.update');
// Route::get('criminal/{criminal}', [CriminalController::class, 'show'])->name('officer.criminal.show');
// Route::delete('criminal/{criminal}', [CriminalController::class, 'destroy'])->name('officer.criminal.destroy');