<?php

use App\Http\Controllers\Officer\CriminalController;
use App\Http\Controllers\Officer\UserController;
use App\Http\Controllers\Officer\VisitorController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
	return 'ini aku broo';
    // return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

//////////////////////////////////////
// Route OFFICER mulai dari bawah sini --------------
//////////////////////////////////////

require __DIR__.'/officerauth.php';

Route::group(['middleware' => ['auth:officer'], 'prefix'=>'officer'], function() {
	Route::get('dashboard',  function(){
		return view('officer.dashboard');
	})->name('officer.dashboard');

	Route::resource('user', UserController::class, ['as'=>'officer']);

	Route::get('criminal', [CriminalController::class, 'index'])->name('officer.criminal.index');
	Route::get('criminal/create', [CriminalController::class, 'create'])->name('officer.criminal.create');
	Route::post('criminal', [CriminalController::class, 'store'])->name('officer.criminal.store');
	Route::put('criminal/{criminal}', [CriminalController::class, 'update'])->name('officer.criminal.update');
	Route::get('criminal/{criminal}', [CriminalController::class, 'show'])->name('officer.criminal.show');
	Route::delete('criminal/{criminal}', [CriminalController::class, 'destroy'])->name('officer.criminal.destroy');

	Route::get('visitor', [VisitorController::class, 'index'])->name('officer.visitor.index');

});


// Route::get('criminal', [CriminalController::class, 'index'])->name('officer.criminal.index');
// Route::get('criminal/create', [CriminalController::class, 'create'])->name('officer.criminal.create');
// Route::post('criminal', [CriminalController::class, 'store'])->name('officer.criminal.store');
// Route::get('criminal/{criminal}/edit', [CriminalController::class, 'edit'])->name('officer.criminal.edit');
// Route::put('criminal/{criminal}', [CriminalController::class, 'update'])->name('officer.criminal.update');
// Route::get('criminal/{criminal}', [CriminalController::class, 'show'])->name('officer.criminal.show');
// Route::delete('criminal/{criminal}', [CriminalController::class, 'destroy'])->name('officer.criminal.destroy');