<?php

use App\Livewire\Content\Kriteria;
use App\Livewire\Content\Datakos;
use App\Livewire\Content\Penilaian;
use App\Livewire\Content\Subkriteria;
use App\Livewire\Dashboard\Home;
use App\Livewire\Dashboard\Pencarian;
use App\Models\penilaian as ModelsPenilaian;
use Illuminate\Support\Facades\Route;

Route::view('ex', 'welcome');
// Route::view('pencarian', 'kos');
Route::get('/', Home::class)->name('home');
Route::get('pencarian', Pencarian::class)->name('pencarian');

Route::get('penilaian', Penilaian::class)->name('penilaian');

Route::middleware(['auth'])->group(function () {
    Route::view('dashboard', 'dashboard')
        ->middleware('verified')
        ->name('dashboard');

    Route::view('profile', 'profile')
        ->name('profile');

    Route::get('kriteria', Kriteria::class)->name('kriteria');
    Route::get('datakos', Datakos::class)->name('datakos');
    Route::get('penilaian', Penilaian::class)->name('penilaian');
});


require __DIR__ . '/auth.php';
