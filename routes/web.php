<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller1;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/create',[Controller1::class,'create']);
    Route::post('/save',[Controller1::class,'save']);

    Route::get('/read',[Controller1::class,'read']);
    Route::get('/update/{nim}',[Controller1::Class,'update']);
    Route::post('/edit',[Controller1::class,'edit']);

    Route::get('/delete/{nim}',[Controller1::class,'delete']);

    Route::get('/view',[Controller1::class,'view']);

    Route::get('/tampil1', [Controller1::class, 'tampil1']); 
    Route::get('/tampilkan', [Controller1::class, 'tampilkan']);
});
Route::get('/logout',[Controller1::class,'logout']);

require __DIR__.'/auth.php';
