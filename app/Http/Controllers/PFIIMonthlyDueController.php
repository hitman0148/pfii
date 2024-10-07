<?php

namespace App\Http\Controllers;

use App\Models\MD_Months;
use App\Models\PFII_Member;
use App\Models\PFIIMonthlyDue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PFIIMonthlyDueController extends Controller
{

    public function page(){
        $members = PFII_Member::where('is_active','Y')->orderBy('lname')->get();
        $year = MD_Months::select('id','month','year')->where('is_deleted','N')->get();
        return view('admin.monthly-due')
            ->with('title','Monthly Due')
            ->with('members',$members)
            ->with('years',$year);
    }

    public function index(){
        return PFIIMonthlyDue::all();
    }

    public function store(Request $req){

        try{
            DB::beginTransaction();
            $mid = PFIIMonthlyDue::where('mid',$req->mid[0])->get();
            if(count($mid)){
                PFIIMonthlyDue::where('mid',$req->mid[0])->delete();
            }

            $data = array();
            foreach($req->member_id as $key => $member_id){
                array_push($data,array(
                    'mid' => $req->mid[$key],
                    'member_id' => $req->member_id[$key],
                    'amt' => $req->amt[$key],
                    'date_created' =>date('Y-m-d H:i:s'),
                    'created_by' => 'Ruben'
                ));
            }

            if(PFIIMonthlyDue::insert($data)){
                $msg['statusCode'] = 200;
                $msg['msg'] = 'Success';
            }else{
                $msg['statusCode'] = 500;
                $msg['msg'] = 'Error';
            }
            DB::commit();
            return response()->json($msg);
        }catch (\Throwable $exception){
            DB::rollback();
            $msg['statusCode'] = 500;
            $msg['msg'] = 'Rollback';
            return response()->json($msg);
        }


    }

    public function update(){
        return response()->json(['data' => 'Test']);
    }
}
