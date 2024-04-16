<?php

use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('users', [UserController::class, 'store']);

Route::post('login', [UserController::class, 'authenticate']);

Route::resource('info', InfoController::class)->only([
    'index','destroy', 'show', 'store', 'update','edit'
 ]);

 Route::resource('education', FormationController::class)->only([
    'index','destroy', 'show', 'store', 'update'
 ]);
 Route::get('education/{id}', [FormationController::class, 'edit']);

 Route::resource('experience', ExperienceController::class)->only([
    'index','destroy', 'show', 'store', 'update','edit'
 ]);
