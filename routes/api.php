<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PFIIMemberController;

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



// This is for members
Route::get('/members',[PFIIMemberController::class,'index']);
Route::get('/member/{id}',[PFIIMemberController::class,'show']);
Route::post('/member',[PFIIMemberController::class,'store']);
Route::post('/member-mod',[PFIIMemberController::class,'update']);
Route::post('/member-rem/{id}',[PFIIMemberController::class,'destroy']);

