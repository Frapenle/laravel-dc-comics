<?php

use App\Http\Controllers\Admin\ComicController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('home');
})->name('home');

// Route::get('/admin/comics', [ComicController::class, 'index'])->name('comics.index');
// Route::get('/comics/{id}', [ComicController::class, 'show'])->name('comics.show');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('comics', ComicController::class);
});
