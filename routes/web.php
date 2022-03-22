<?php

use App\Http\Controllers\TestController;
use App\Http\Controllers\TodoController;
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
    return view('welcome');
});

// Route::get('/trainer', function () {
//     return 2 + 2 / 2;
// });


// Route::get('trainer', [TestController::class, 'cubaan']);

// Route::get('todos', [TodoController::class, 'index']);

Route::resource('todos', TodoController::class);

// Dari route ke view terus
// Route::get('/', function () {
//     return view('welcome');
// });

// Dari route ke controller
// Route::get('/', [UserController::class, 'index']);

// Resource Route
// Route::resource('user', UserController::class);
