<?php

use App\Http\Controllers\DefaultController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
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

Route::get('/', [DefaultController::class, 'home'])->name('default.home');

/////////////////////////
    Route::get('/utilisateur/fake-creation', [UserController::class, 'fakeCreate']);
/////////////////////////

Route::get('/article/ajouter', [PostController::class, 'create'])->name('post.create');
Route::post('/article/ajouter', [PostController::class, 'store'])->name('post.store');
