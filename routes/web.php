<?php

use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;

Route::get('/',[ProductoController::class,'index'])->name('producto.index');

Route::post('/',[ProductoController::class,'store'])->name('producto.store');
Route::delete('/{producto}',[ProductoController::class,'destroy'])->name('producto.destroy');
Route::put('/{producto}',[ProductoController::class,'update'])->name('producto.update');
Route::get('/edit/{producto}',[ProductoController::class,'edit'])->name('producto.edit');

