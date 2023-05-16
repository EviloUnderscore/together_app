<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\Activity;
use App\Models\Category;
use App\Http\Controllers\ActivityController;

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

// Base route when the user is NOT authentificate and goes to Login or Register
Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

// All routes if user is logged
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard', [
            'categories' => Category::all()
        ]);
    })->name('dashboard');

    Route::get('/activity/{id}', [ActivityController::class, 'getActivityById'])
    ->name('details');

    Route::get('/activities/create', function () {
        return Inertia::render('ActivityCreate', [
            'categories' => Category::all()
        ]);
    })->name('create');

    Route::post('/activities/store', [ActivityController::class, 'store'])
    ->name('store');
});
