<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FavoriteController;

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

Route::get('/', [PlaceController::class, "index"])->name("top"); //トップページ
Route::get('/search',[PlaceController::class,"search"])->name("search");
Route::get('/places/create', [PlaceController::class, "create"])->name("shopCreate"); //お店登録
Route::get('/places/{place}', [PlaceController::class, "show"])->name("shopDetail"); //お店詳細
Route::post('/places', [PlaceController::class, "store"])->name("shopStore"); //お店保存処理
Route::get('/places/{place}/edit', [PlaceController::class, "edit"])->name("shopEdit"); //お店情報編集
Route::put('/places/{place}', [PlaceController::class, "update"])->name("shopUpdate"); //お店情報上書き保存

Route::get('/bbs/{place}',[CommentController::class, "index"])->name("shopComment"); //掲示板
Route::post('/bbs/{place}',[CommentController::class,"store"])->name("shopCommentStore");


Route::post('/places/{place}',[FavoriteController::class, "store"])->name("favoriteStore"); //お気に入り登録
Route::get('/favorites',[FavoriteController::class, "index"])->name("favorites"); //お気に入り一覧

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
