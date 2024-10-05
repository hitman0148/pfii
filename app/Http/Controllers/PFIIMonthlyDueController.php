<?php

namespace App\Http\Controllers;

use App\Models\MD_Months;
use App\Models\PFIIMonthlyDue;
use Illuminate\Http\Request;

class PFIIMonthlyDueController extends Controller
{

    public function page(){
        $year = MD_Months::select('month','year')->where('is_deleted','N')->get();
        return view('admin.monthly-due')->with('title','Monthly Due')->with('years',$year);
    }

    public function index(){
        return PFIIMonthlyDue::all();
    }

    public function store(Request $req){

        $monthly = new PFIIMonthlyDue();
        $monthly->mid = $req->mid;
        $monthly->date = $req->date;
        $monthly->amt = $req->amt;
        $monthly->date_created = date('Y-m-d');
        $monthly->created_by = $req->created_by;
        if($monthly->save()){
            $msg['statusCode'] = 200;
            $msg['msg'] = 'Success';
        }else{
            $msg['statusCode'] = 500;
            $msg['msg'] = 'Error';
        }

        return response()->json($msg);
    }

    public function update(){
        return response()->json(['data' => 'Test']);
    }
}
