<?php

use App\Http\Controllers\CollegeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/colleges', [CollegeController::class, 'index'])->name('colleges.index');
Route::get('/colleges/create', [CollegeController::class, 'create'])->name('colleges.create');
Route::post('/colleges', [CollegeController::class, 'store'])->name('colleges.store');
Route::get('/colleges/{id}/edit', [CollegeController::class, 'edit'])->name('colleges.edit');
Route::put('/colleges/{id}', [CollegeController::class, 'update'])->name('colleges.update');
Route::delete('/colleges/{id}', [CollegeController::class, 'destroy'])->name('colleges.destroy');