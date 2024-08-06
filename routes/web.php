<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/home', function () {
    return view('index');
});


//Route::get('admin/home', function () {
//    return view('admin.index')->with('title','Home');
//});
Route::get('login', function () {
    return view('admin.login')->with('title','Login');
})->name('login');

Route::get('/', function () {
    return view('admin.login')->with('title','Login');
})->name('login');


//Route::get('/',[PageController::class, 'login'])->name('login');
Route::get('/test',function(){
    return view('sample')->with('title','Sample');
});
