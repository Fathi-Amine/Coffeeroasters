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

Route::get('/plates/create', [PlateController::class,'create'])->middleware('admin');

Route::post('/plates', [PlateController::class,'store'])->middleware('admin');


Route::get('/plates/{plate}/edit', [PlateController::class, 'edit'])->middleware('admin');

Route::put('/plates/{plate}', [PlateController::class, 'update'])->middleware('admin');

Route::delete('/plates/{plate}', [PlateController::class, 'destroy'])->middleware('admin');

Route::get('register',[UserController::class, 'create']);
Route::post('/users',[UserController::class, 'store']);

Route::get('/login', [UserController::class, 'login']);
Route::post('/authenticate', [UserController::class, 'authenticate']);
Route::post('/logout',[UserController::class, 'logout']);
Route::get('users/{user}/editprofile', [UserController::class, 'edit']);
Route::put('users/{user}', [UserController::class,'update']);
Route::put('/reset_password',[UserController::class, 'reset']);
Route::get('/password',[UserController::class, 'show_reset_form']);
Route::post('/password/send',[UserController::class, 'sendResetLink']);
Route::get('/password/reset/{token}',[UserController::class, 'showResetForm'])->name('reset.form');
Route::post('/password/send',[UserController::class, 'sendResetLink']);
Route::post('/password/reset',[UserController::class, 'passwordReset']);

