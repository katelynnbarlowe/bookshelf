<?php

use Illuminate\Support\Facades\Route;

Route::get('/shelf', function () {
    return view('shelf');
});
