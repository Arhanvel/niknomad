<?php


use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\TagsController;
use Illuminate\Support\Facades\Route;

Route::middleware('can:admin')->group(function () {
    Route::resource('admin/posts', PostController::class)->except('show');

    Route::resource('admin/categories', CategoriesController::class)->except(['show', 'create', 'edit']);

    Route::resource('admin/tags', TagsController::class)->except(['show', 'create', 'edit']);
});
