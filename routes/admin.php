<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PFIIMemberController;
use App\Models\PFII_Member;
use App\Models\PFII_Accomp;
use App\Models\PFII_designation;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\PFIIMonthlyDueController;

Route::prefix('admin')->name('admin.')->group(function(){

    Route::get('pdf-attendance',[PdfController::class,'dlAttendance']);
    //this route is for view of attendance only
    Route::get('attd-view',function(){
        $members = PFII_Member::where('is_active','Y')->orderBy('lname')->get();
        return view('admin.attendance')
            ->with('title','PARDSS STA-ANA ATTENDANCE')
            ->with('members',$members);
    });


    Route::post('login_handler',[AdminController::class,'loginHandler'])->name('login_handler');
    Route::get('logout',[AdminController::class,'logOut'])->name('logout');

    Route::middleware(['admin','preventBack'])->group(function(){
        Route::get('/home', function () {
            $members = PFII_Member::where('is_active','Y')->count();
            $inactive = PFII_Member::where('is_active','N')->count();
            $accomps = PFII_Accomp::where('is_active','Y')->count();
            $desig = PFII_designation::where('is_active','Y')->count();
            return view('/admin.home')
                ->with('title','Home')
                ->with('members',$members)
                ->with('inact',$inactive)
                ->with('desig',$desig)
                ->with('accomps',$accomps);
        })->name('home');

        Route::get('/members', function () {
            return view('/admin.members')->with('title','Members');
        })->name('members');

        Route::get('/attendance', function () {
            return view('/admin.attendance')->with('title','Attendance');
        })->name('attendance');

        Route::get('/designation', function () {
            return view('/admin.designation')->with('title','Designation');
        })->name('designation');

        Route::get('/form-member', function () {
            return view('/admin.forms.f_members')->with('title','Registration');
        })->name('form-member');

        Route::get('/form-accomp', function () {
            return view('/admin.forms.f_accomp')
                    ->with('title','Accomplishment')
                    ->with('members',PFII_Member::selectRaw('id,UCASE(fname) fname,UCASE(lname) lname')->where('is_active','Y')->get());
        })->name('form-accomp');

        Route::get('/calendar', function () {
            return view('/admin.calendar')->with('title','Calendar');
        })->name('calendar');

        Route::get('monthly-due',[PFIIMonthlyDueController::class,'page'])->name('monthly-due');

        Route::get('/accomp-report', function () {
            return view('/admin.report')
                ->with('title','Accompishment Report')
                ->with('members',PFII_Member::selectRaw('id,UCASE(fname) fname,UCASE(lname) lname')->where('is_active','Y')->get());
        })->name('accomp-report');

        Route::get('/', function () {
            return view('/admin.index')->with('title','Home');
        });

        Route::post('/import/member',[PFIIMemberController::class,'importMember' ]);
        Route::get('/export/member',[PFIIMemberController::class,'exportMember' ]);
        Route::post('/import/desig',[PFIIMemberController::class,'importDesig' ]);


        Route::get('/test',function(){
            return view('sample')->with('title','Sample');
        });

        Route::get('/test2',[PFIIMonthlyDueController::class, 'index']);

    });




//    This is for admin api


});
