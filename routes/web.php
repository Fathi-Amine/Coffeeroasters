<?php


use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PlateController;

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

Route::get('/', [PlateController::class,'index']);

Route::get('/plates/create', [PlateController::class,'create']);

Route::post('/plates', [PlateController::class,'store']);


Route::get('/plates/{plate}/edit', [PlateController::class, 'edit']);

Route::put('/plates/{plate}', [PlateController::class, 'update']);

Route::delete('/plates/{plate}', [PlateController::class, 'destroy']);

Route::get('register',[UserController::class, 'create']);
Route::post('/users',[UserController::class, 'store']);

Route::get('/login', [UserController::class, 'login']);
Route::post('/authenticate', [UserController::class, 'authenticate']);
Route::post('/logout',[UserController::class, 'logout']);
Route::get('users/{user}/editprofile', [UserController::class, 'edit']);
Route::put('users/{user}', [UserController::class,'update']);
Route::put('/reset_password',[UserController::class, 'reset']);

