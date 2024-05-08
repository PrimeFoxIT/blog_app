<?php

use Illuminate\Support\Facades\Route;


Route::prefix('admin')
    ->name('admin.')
    ->middleware([\App\Http\Middleware\AdminAuth::class, \App\Http\Middleware\AdminAuthOnly::class])
    ->group(function () {
    Route::controller(\App\Http\Controllers\TagController::class)->group(function () {
        Route::get('tags', 'index')->name('tags');
        Route::get('tags/create', 'create')->name('tags.create');
        Route::post('tags', 'store')->name('tags.store');
        Route::get('tags/{tag}/edit', 'edit')->name('tags.edit');
        Route::put('tags/{id}', 'update')->name('tags.update');
        Route::get('tags/{id}/destroy', 'destroy')->name('tags.destroy');
    });

    Route::controller(\App\Http\Controllers\PostCategoryController::class)->group(function () {
        Route::get('post-categories', 'index')->name('post-categories');
        Route::get('post-categories/create', 'create')->name('post-categories.create');
        Route::post('post-categories', 'store')->name('post-categories.store');
        Route::get('post-categories/{category}/edit', 'edit')->name('post-categories.edit');
        Route::put('post-categories/{id}', 'update')->name('post-categories.update');
        Route::get('post-categories/{id}/destroy', 'destroy')->name('post-categories.destroy');
    });

    Route::controller(\App\Http\Controllers\PostController::class)->group(function () {
        Route::get('posts', 'index')->name('posts');
        Route::get('posts/create', 'create')->name('posts.create');
        Route::post('posts', 'store')->name('posts.store');
        Route::get('posts/{post}/edit', 'edit')->name('posts.edit');
        Route::put('posts/{id}', 'update')->name('posts.update');
        Route::get('posts/{id}/destroy', 'destroy')->name('posts.destroy');
    });

    Route::get('logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
});

Route::get('/', function () {
    return redirect()->route('admin.posts');
});

Route::get('admin/login', [\App\Http\Controllers\AuthController::class, 'index'])->name('admin.login');
Route::post('admin/login', [\App\Http\Controllers\AuthController::class, 'login'])->name('admin.login.attempt');
