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

Route::get('/', [VulnerabilityController::class, 'index'])
    ->name('home');

Route::get('/vulnerability/{vulnerability}', [VulnerabilityController::class, 'show'])
    ->where('vulnerability', '[0-9]+')
    ->name('vulnerability.show');

Route::middleware(['auth'])->group(function () {
    Route::prefix('dashboard')->group(function () {
        Route::get('/', [VulnerabilityController::class, 'index'])
            ->name('dashboard');

        Route::get('/my-vulnerabilities', [VulnerabilityController::class, 'indexForUser'])
            ->name('dashboard.my-vulnerabilities');
    });

    Route::prefix('vulnerability')->group(function () {
        Route::get('/new', [VulnerabilityController::class, 'create'])
            ->name('vulnerability.create');

        Route::post('/', [VulnerabilityController::class, 'store'])
            ->name('vulnerability.store');

        Route::get('/edit/{vulnerability}', [VulnerabilityController::class, 'edit'])
            ->name('vulnerability.edit');

        Route::patch('/{vulnerability}', [VulnerabilityController::class, 'update'])
            ->name('vulnerability.update');

        Route::delete('/{vulnerability}', [VulnerabilityController::class, 'destroy'])
            ->name('vulnerability.destroy');
    });
});

require __DIR__.'/auth.php';
