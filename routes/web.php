<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::resource('posts', PostController::class)
    ->only(['index', 'create', 'store', 'show'])
    ->names('posts');
