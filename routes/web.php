<?php

use App\Models\Shelf;
use Illuminate\Support\Facades\Route;

Route::resource('shelf',App\Http\Controllers\ShelfController::class);

Route::get('randomizer', function() {
    $shelves = Shelf::query()->where('name','!=','')->orderby('name')->get();
    return view('randomizer',compact('shelves'));
});
