<?php

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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//    Route::get('/genres', [App\Http\Controllers\GenreController::class, 'index'])->name('genres.index');
//    Route::get('/singers', [App\Http\Controllers\SingerController::class, 'index'])->name('singers.index');
//    Route::get('/songs/rank', [App\Http\Controllers\SongController::class, 'rank'])->name('songs.rank');
    Route::get('/song-list', [App\Http\Controllers\SongController::class, 'index'])->name('songs.index');
    Route::get('/song/{song}', [App\Http\Controllers\SongController::class, 'show'])->name('songs.show');
    Route::get('/song/{song}/like', [App\Http\Controllers\SongController::class, 'like'])->name('songs.like');
    Route::get('/cart/{song}/add', [App\Http\Controllers\CartController::class, 'add'])->name('cart.add');
    Route::get('/cart/{song}/delete', [App\Http\Controllers\CartController::class, 'add'])->name('cart.add');
    Route::get('/cart/{song}/delete', [App\Http\Controllers\CartController::class, 'delete'])->name('cart.delete');
    Route::get('/cart/pay', [App\Http\Controllers\CartController::class, 'pay'])->name('cart.pay');
    Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart.index');
    Route::get('/buy-songs', [App\Http\Controllers\PaymentController::class, 'index'])->name('pay.index');

    Route::group(['middleware' => 'admin', 'prefix' => 'admin', 'as' => 'admin.'], function (){

        Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

        Route::get('/users', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('users.index');
        Route::get('/users/create', [App\Http\Controllers\Admin\UserController::class, 'create'])->name('users.create');
        Route::post('/users', [App\Http\Controllers\Admin\UserController::class, 'store'])->name('users.store');
        Route::get('/users/{user}/edit', [App\Http\Controllers\Admin\UserController::class, 'edit'])->name('users.edit');
        Route::put('/users/{user}', [App\Http\Controllers\Admin\UserController::class, 'update'])->name('users.update');
        Route::delete('/users/{user}', [App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('users.destroy');

        Route::get('/songs', [App\Http\Controllers\Admin\SongController::class, 'index'])->name('songs.index');
        Route::get('/songs/create', [App\Http\Controllers\Admin\SongController::class, 'create'])->name('songs.create');
        Route::post('/songs', [App\Http\Controllers\Admin\SongController::class, 'store'])->name('songs.store');
        Route::get('/songs/{song}/edit', [App\Http\Controllers\Admin\SongController::class, 'edit'])->name('songs.edit');
        Route::put('/songs/{song}', [App\Http\Controllers\Admin\SongController::class, 'update'])->name('songs.update');
        Route::delete('/songs/{song}', [App\Http\Controllers\Admin\SongController::class, 'destroy'])->name('songs.destroy');

        Route::get('/genres', [App\Http\Controllers\Admin\GenreController::class, 'index'])->name('genres.index');
        Route::get('/genres/create', [App\Http\Controllers\Admin\GenreController::class, 'create'])->name('genres.create');
        Route::post('/genres', [App\Http\Controllers\Admin\GenreController::class, 'store'])->name('genres.store');
        Route::get('/genres/{genre}/edit', [App\Http\Controllers\Admin\GenreController::class, 'edit'])->name('genres.edit');
        Route::put('/genres/{genre}', [App\Http\Controllers\Admin\GenreController::class, 'update'])->name('genres.update');
        Route::delete('/genres/{genre}', [App\Http\Controllers\Admin\GenreController::class, 'destroy'])->name('genres.destroy');

        Route::get('/singers', [App\Http\Controllers\Admin\SingerController::class, 'index'])->name('singers.index');
        Route::get('/singers/create', [App\Http\Controllers\Admin\SingerController::class, 'create'])->name('singers.create');
        Route::post('/singers', [App\Http\Controllers\Admin\SingerController::class, 'store'])->name('singers.store');
        Route::get('/singers/{singer}/edit', [App\Http\Controllers\Admin\SingerController::class, 'edit'])->name('singers.edit');
        Route::put('/singers/{singer}', [App\Http\Controllers\Admin\SingerController::class, 'update'])->name('singers.update');
        Route::delete('/singers/{singer}', [App\Http\Controllers\Admin\SingerController::class, 'destroy'])->name('singers.destroy');
    });
});
