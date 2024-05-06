<?php

use Illuminate\Support\Facades\Route;

Route::get('admin/tags', [\App\Http\Controllers\TagController::class, 'index'])->name('admin.tags');
Route::get('admin/tags/create', [\App\Http\Controllers\TagController::class, 'create'])->name('admin.tags.create');
Route::post('admin/tags', [\App\Http\Controllers\TagController::class, 'store'])->name('admin.tags.store');
Route::get('admin/tags/{tag}/edit', [\App\Http\Controllers\TagController::class, 'edit'])->name('admin.tags.edit');
Route::put('admin/tags/{id}', [\App\Http\Controllers\TagController::class, 'update'])->name('admin.tags.update');
Route::get('admin/tags/{id}/destroy', [\App\Http\Controllers\TagController::class, 'destroy'])->name('admin.tags.destroy');

Route::get('/', function () {
    return view('welcome');
});
