<?php

use App\Http\Controllers\CollegeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/colleges', [CollegeController::class, 'index'])->name('colleges.index');