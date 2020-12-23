<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Demo;

Route::get('/', Demo::class)->name('demo');