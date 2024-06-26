<?php

use App\Livewire\Content\Kriteria;
use App\Livewire\Content\Datakos;
use App\Livewire\Content\Subkriteria;
use App\Livewire\Dashboard\Home;
use App\Livewire\Dashboard\Pencarian;
use Illuminate\Support\Facades\Route;

Route::view('ex', 'welcome');
// Route::view('pencarian', 'kos');
Route::get('/',Home::class)->name('home');
Route::get('pencarian',Pencarian::class)->name('pencarian');
Route::get('kriteria',Kriteria::class)->name('kriteria');
Route::get('datakos', Datakos::class)->name('datakos');
Route::get('subkriteria', Subkriteria::class)->name('subkriteria');
Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
