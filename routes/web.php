<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

Route::livewire('/', 'pages::docs.home');

Route::livewire('/installation', 'pages::docs.installation');
Route::livewire('/basic-usage', 'pages::docs.basic-usage');
Route::livewire('/toasts', 'pages::docs.toasts');
Route::livewire('/timers', 'pages::docs.timers');
Route::livewire('/buttons', 'pages::docs.buttons');
Route::livewire('/button-events', 'pages::docs.button-events');
Route::livewire('/confirm', 'pages::docs.confirm');
Route::livewire('/inputs', 'pages::docs.inputs');
Route::livewire('/loading', 'pages::docs.loading');
Route::livewire('/updating', 'pages::docs.updating');
Route::livewire('/flash', 'pages::docs.flash');
Route::livewire('/customization', 'pages::docs.customization');
Route::livewire('/dependency-injection', 'pages::docs.dependency-injection');
Route::livewire('/ai-skill', 'pages::docs.ai-skill');
