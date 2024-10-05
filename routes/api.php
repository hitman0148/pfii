<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PFIIMemberController;
use App\Http\Controllers\PFIIDesignationController;
use App\Http\Controllers\PFIIAccompController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\PFIIMonthlyDueController;

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



// MEMBERS
Route::get('/members',[PFIIMemberController::class,'index']);
Route::get('/member/{id}',[PFIIMemberController::class,'show']);
Route::post('/member',[PFIIMemberController::class,'store']);
Route::post('/member-mod',[PFIIMemberController::class,'update']);
Route::post('/member-rem/{id}',[PFIIMemberController::class,'destroy']);


//DESIGNATION
Route::get('/designations',[PFIIDesignationController::class,'index']);
Route::get('/designation/{id}',[PFIIDesignationController::class,'show']);
Route::post('/designation',[PFIIDesignationController::class,'store']);
Route::post('/designation-mod',[PFIIDesignationController::class,'update']);
Route::post('/designation-rem/{id}',[PFIIDesignationController::class,'destroy']);


//DESIGNATION
Route::get('/accomps',[PFIIAccompController::class,'index']);
Route::get('/accomp/{id}',[PFIIAccompController::class,'show']);
Route::post('/accomp',[PFIIAccompController::class,'store']);
Route::post('/accomp-mod',[PFIIAccompController::class,'update']);
Route::post('/accomp-rem/{id}',[PFIIAccompController::class,'destroy']);


//CALENDAR
Route::get('/event',[CalendarController::class,'index']);
Route::get('/event/{id}',[CalendarController::class,'fetch']);
Route::post('/event',[CalendarController::class,'store']);
Route::post('/event-mod',[CalendarController::class,'update']);
Route::post('/event-rem/{id}',[CalendarController::class,'destroy']);


//MONTHLY DUE
Route::get('/monthly',[PFIIMonthlyDueController::class, 'index']);
Route::post('/monthly',[PFIIMonthlyDueController::class,'store']);
Route::post('/mod-monthly',[PFIIMonthlyDueController::class,'update']);
