<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HouseController;

// Route::get('/', function () {
//     return view('index');
// });
Route::get('/', [HouseController::class, 'index'])->name('houses.index');
Route::resource('houses', HouseController::class);
