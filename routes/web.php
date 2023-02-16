<?php

use App\Http\Controllers\Admin\ComicController as ComicController;
use App\Http\Controllers\Guest\PageController as PageController;

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

Route::get('/guest', [PageController::class, 'home'])->name('guest.home');


Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('comics', ComicController::class);
    Route::get('trashed', [ComicController::class, 'trashed'])->name('comics.trashed');
    Route::delete('comics/force-delete/{id}', [ComicController::class, 'forceDelete'])->name('comics.forceDelete');
    Route::get('comics/restore/{id}', [ComicController::class, 'restoreDeleted'])->name('comics.restore');
});
