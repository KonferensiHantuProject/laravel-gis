<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{HomeController, MapController};

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index']);

Route::prefix('/map')->group(function () {
    Route::get('/', [MapController::class, 'index']);
    Route::get('/saved', [MapController::class, 'saved']);

    // Location
    Route::prefix('/location')->group(function () {
        Route::get('/', [MapController::class, 'location']);
        Route::get('/{id}', [MapController::class, 'location_detail'])->name('map.location');
        Route::post('/', [MapController::class, 'save_location']);
    });
});

// Route::middleware('guest')->prefix('/app')->group(function () {
//     Route::get('/login', [Auth_Controller_A::class, 'login'])->name('login');
// });
