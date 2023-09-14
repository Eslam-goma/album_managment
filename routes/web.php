<?php

use App\Http\Controllers\AlbumController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::resource('albums', AlbumController::class);
// routes/web.php

Route::get('albums/{album}/move-pictures', [AlbumController::class,'movePictures'])->name('albums.move-pictures');
Route::post('albums/{album}/move-pictures', [AlbumController::class,'handleMovePictures'])->name('albums.handle-move-pictures');
