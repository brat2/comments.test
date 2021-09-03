<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [CommentController::class, 'index']);

Route::get('/get', [CommentController::class, 'get']);

Route::get('/filter', [CommentController::class, 'filter']);

Route::post('/', [CommentController::class, 'add'])->middleware(['auth'])->name('addComment');

require __DIR__ . '/auth.php';
