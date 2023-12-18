<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ItemController;



Route::get('/', [ItemController::class, 'index'])
    ->name('items.index');

Route::get('/create', [ItemController::class, 'create'])
->name('items.create');


Route::post('/create', [ItemController::class, 'store'])
->name('items.store');

Route::resource('items', ItemController::class);