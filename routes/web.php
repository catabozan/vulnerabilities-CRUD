<?php

use App\Http\Controllers\VulnerabilityController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::prefix('vulnerability')->middleware(['auth'])->group(function () {
    Route::post('/', [VulnerabilityController::class, 'store'])
        ->name('vulnerability.store');

    Route::patch('/{vulnerability}', [VulnerabilityController::class, 'update'])
        ->name('vulnerability.update');
});

require __DIR__.'/auth.php';
