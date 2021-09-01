<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{GallerieController,PhotoController,TagController, GameController, ProfilController};

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
    return view('welcome');
})->name('/');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/game', [GameController::class, 'index'])->name('game');

Route::group(['middleware' => 'auth'], function(){
    Route::resource('galleries', GallerieController::class);
    Route::get('galleries/{gallery}/vote', [GallerieController::class, 'vote'])->name('galleries.vote');
    Route::get('galleries/{gallery}/{photo}/vote', [GallerieController::class, 'votePhoto'])->name('galleries.votePhoto');

    Route::resource('photos', PhotoController::class);
    Route::get('photos/{photo}/vote', [PhotoController::class, 'vote'])->name('photos.vote');
    Route::get('photos/{photo}/{page}/voteIndex', [PhotoController::class, 'voteIndex'])->name('photos.voteIndex');
    Route::post('photos/filtre', [PhotoController::class, 'filtre'])->name('photos.filtre');

    Route::resource('tags', TagController::class);
    Route::get('tags/{tag}/{photo}/vote', [TagController::class, 'votePhoto'])->name('tags.votePhoto');

    Route::resource('profils', ProfilController::class);
});