<?php

use App\Livewire\Content\Kriteria;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');
Route::get('kriteria',Kriteria::class);
Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
