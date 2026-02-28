<?php

use App\Http\Controllers\ItemController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

// Route::resource('items', ItemController::class);
Route::livewire('items', 'pages::items.index')->name('items.index');
Route::livewire('categories', 'pages::categories.index')->name('categories.index');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
});

require __DIR__.'/settings.php';
