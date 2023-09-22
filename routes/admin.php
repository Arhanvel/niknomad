<?php


use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\CategoriesController;
use Illuminate\Support\Facades\Route;

Route::middleware('can:admin')->group(function () {
    Route::resource('admin/posts', PostController::class)->except('show');

    Route::resource('admin/categories', CategoriesController::class)->except(['show', 'create', 'edit']);
});
