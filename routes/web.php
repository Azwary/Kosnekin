<?php

use App\Livewire\Content\Kriteria;
use App\Livewire\Content\Datakos;
use App\Livewire\Content\Subkriteria;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');
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
