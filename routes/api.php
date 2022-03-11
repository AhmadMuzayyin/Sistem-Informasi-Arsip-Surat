<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LetterController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\InstitutionController;
use App\Http\Controllers\IncomingMailController;
use App\Http\Controllers\OutgoingMailController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::controller(UserController::class)->group(function () {
    Route::get('/user', 'index');
    Route::get('/user/{user}', 'show');
    Route::post('/user', 'store');
    Route::patch('/user/{user}', 'update');
    Route::delete('/user/{id}', 'destroy');
});
Route::controller(PositionController::class)->group(function () {
    Route::get('/position', 'index');
    Route::get('/position/{position}', 'show');
    Route::post('/position', 'store');
    Route::patch('/position/{position}', 'update');
    Route::delete('/position/{id}', 'destroy');
});
Route::controller(InstitutionController::class)->group(function () {
    Route::get('/institution', 'index');
    Route::get('/institution/{id}', 'show');
    Route::post('/institution', 'store');
    Route::patch('/institution/{institution}', 'update');
    Route::delete('/institution/{id}', 'destroy');
});
Route::controller(LetterController::class)->group(function () {
    Route::get('/letter', 'index');
    Route::get('/letter/{id}', 'show');
    Route::post('/letter', 'store');
    Route::patch('/letter/{letter}', 'update');
    Route::delete('/letter/{id}', 'destroy');
});
Route::controller(IncomingMailController::class)->group(function () {
    Route::get('/incomingmail', 'index');
    Route::get('/incomingmail/{id}', 'show');
    Route::post('/incomingmail', 'store');
    Route::patch('/incomingmail/{incomingmail}', 'update');
    Route::delete('/incomingmail/{id}', 'destroy');
});