<?php

use App\Http\Controllers\Officer\UserController;
use App\Http\Controllers\PengunjungController;
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

	// Route::get('user', [UserController::class, 'index'])->name('officer.user.index');
	Route::resource('user', UserController::class, ['as'=>'officer']);
});