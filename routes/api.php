<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TraineeController;
use App\Http\Controllers\TrainingController;
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

Route::post('/admin/register', [AuthController::class, 'registerAdmin'])->name('registerAdmin');
Route::post('/trainer/register', [AuthController::class, 'registerTrainer'])->name('registerTrainer');
Route::post('/trainee/register', [AuthController::class, 'registerTrainee'])->name('registerTrainee');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::group(['middleware' => ['auth:sanctum']], function () {
  Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
  Route::apiResource('/roles', RoleController::class);
  Route::apiResource('/trainings', TrainingController::class);
  Route::apiResource('/trainees', TraineeController::class);
});