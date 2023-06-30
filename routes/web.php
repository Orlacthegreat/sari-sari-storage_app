<?php

use App\Http\Controllers\JunkfoodController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SoftdrinkController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/softdrinks',[SoftdrinkController::class, 'index'])->middleware(['auth'])->name('softdrinks.index');
Route::get('/softdrinks/create',[SoftdrinkController::class, 'create'])->middleware(['auth'])->name('softdrinks.create');
Route::post('/softdrinks/store',[SoftdrinkController::class, 'store'])->middleware(['auth'])->name('softdrinks.store');

Route::get('/junkfoods',[JunkfoodController::class,'index'])->middleware('auth')->name('junkfoods.index');
Route::get('/junkfoods/create',[JunkfoodController::class,'create'])->middleware('auth')->name('junkfoods.create');
Route::post('/junkfoods/store',[JunkfoodController::class,'store'])->middleware('auth')->name('junkfoods.store');


Route::get('/junkfoods/show/{id}',[JunkfoodController::class,'show'])->middleware('auth')->name('junkfoods.show');
Route::get('/junkfoods/edit/{id}',[JunkfoodController::class,'edit'])->middleware('auth')->name('junkfoods.edit');
Route::put('/junkfoods/update/{id}',[JunkfoodController::class,'update'])->middleware('auth')->name('junkfoods.update');
Route::delete('/junkfoods/destroy/{id}',[JunkfoodController::class,'destroy'])->middleware('auth')->name('junkfoods.destroy');

Route::get('/softdrinks/show/{id}',[SoftdrinkController::class, 'show'])->middleware(['auth'])->name('softdrinks.show');
Route::get('/softdrinks/edit/{id}',[SoftdrinkController::class, 'edit'])->middleware(['auth'])->name('softdrinks.edit');
Route::put('/softdrinks/update/{id}',[SoftdrinkController::class, 'update'])->middleware(['auth'])->name('softdrinks.update');
Route::delete('/softdrinks/destroy/{id}',[SoftdrinkController::class, 'destroy'])->middleware(['auth'])->name('softdrinks.destroy');






Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
