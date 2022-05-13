<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LetterController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\InstitutionController;
use App\Http\Controllers\IncomingMailController;

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
Route::get('/', [AuthController::class, 'index'])->name('login');
Route::post('/auth', [AuthController::class, 'auth']);
Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'store']);
Route::get('logout', [AuthController::class, 'logout']);
Route::middleware(['auth'])->group(function(){
    Route::controller(DashboardController::class)->group(function(){
        Route::get('/dashboard', 'index');
        Route::get('/dashboard/chart', 'chart');
    });
    Route::middleware(['isAdmin'])->group(function(){
        Route::controller(UserController::class)->group(function () {
            Route::get('/user', 'index');
            Route::get('/user/create', 'create');
            Route::get('/user/{user}', 'show');
            Route::get('/user/{user}/edit', 'edit');
            Route::post('/user', 'store');
            Route::patch('/user/{user}', 'update');
            Route::delete('/user/{id}', 'destroy');
        });
    });
    Route::controller(PositionController::class)->group(function () {
        Route::get('/position', 'index');
        Route::get('/position/create', 'create');
        Route::get('/position/{position}', 'show');
        Route::post('/position', 'store');
        Route::post('/position/update', 'update');
        Route::delete('/position/{id}', 'destroy');
    });
    Route::controller(InstitutionController::class)->group(function () {
        Route::get('/institution', 'index');
        Route::get('/institution/create', 'create');
        Route::post('/institution', 'store');
        Route::get('/institution/{id}/edit', 'edit');
        Route::patch('/institution/{id}', 'update');
        Route::delete('/institution/{id}', 'destroy');
    });
    Route::controller(LetterController::class)->group(function () {
        Route::get('/letter', 'index');
        // Route::get('/letter', 'index');
        // Route::get('/letter/create', 'create');
        // Route::get('/letter/{id}', 'show');
        // Route::post('/letter', 'store');
        // Route::patch('/letter/{letter}', 'update');
        // Route::delete('/letter/{id}', 'destroy');
        // Route::get('/print-surat/{id}', 'print');
    });
    Route::controller(IncomingMailController::class)->group(function () {
        Route::get('/incomingmail', 'index');
        Route::get('/incomingmail/create', 'create');
        Route::get('/incomingmail/{id}/edit', 'edit');
        Route::post('/incomingmail', 'store');
        Route::patch('/incomingmail/{incomingmail}', 'update');
        Route::delete('/incomingmail/{id}', 'destroy');
    });
});