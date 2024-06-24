<?php

use App\Livewire\Content\Kriteria;
use App\Livewire\Content\Datakos;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');
Route::get('kriteria',Kriteria::class);
Route::get('datakos',Datakos::class);
Route::get('datakos', Datakos::class)->name('datakos');
Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
