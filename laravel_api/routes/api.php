<?php

use App\Http\Controllers\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('students',[StudentController::class,'index'])->name('students.all');
Route::get('students/{id}',[StudentController::class,'show'])->name('students.show');
Route::post('students',[StudentController::class,'store'])->name('students.store');
Route::put('students/{id}',[StudentController::class,'update'])->name('students.update');
Route::delete('students/{id}',[StudentController::class,'destroy'])->name('students.destroy');
