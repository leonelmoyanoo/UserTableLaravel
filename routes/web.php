<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

/* GET */

Route::get('/', [UserController::class, 'index']);

/* POST */
Route::post('users', [UserController::class, 'store'])
    ->name('users.store');

/* DELETE */
Route::delete('users/{user}', [UserController::class, 'eliminar'])
    ->name('users.destroy');
