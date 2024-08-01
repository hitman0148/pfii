<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PFIIMemberController;


Route::prefix('admin')->name('admin.')->group(function(){


    Route::post('login_handler',[AdminController::class,'loginHandler'])->name('login_handler');

    Route::get('/home', function () {
        return view('/admin.home')->with('title','Home');
    })->name('home');

    Route::get('/members', function () {
        return view('/admin.members')->with('title','Members');
    })->name('members');

    Route::get('/designation', function () {
        return view('/admin.designation')->with('title','Designation');
    })->name('designation');

    Route::get('/form-member', function () {
        return view('/admin.forms.f_members')->with('title','Registration');
    })->name('form-member');

    Route::get('/form-accomp', function () {
        return view('/admin.forms.f_accomp')->with('title','Accomplishment');
    })->name('form-accomp');

    Route::get('/calendar', function () {
        return view('/admin.calendar')->with('title','Calendar');
    })->name('calendar');

    Route::get('/monthly-due', function () {
        return view('/admin.monthly-due')->with('title','Monthly Due');
    })->name('monthly-due');

    Route::get('/', function () {
        return view('/admin.index')->with('title','Home');
    });




//    This is for admin api


});
