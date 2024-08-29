<?php

namespace App\Http\Controllers;

use App\Models\PFII_Accomp;
use Illuminate\Http\Request;

class PFIIAccompController extends Controller
{

    public function index()
    {
//        return PFII_Accomp::all();
        return response()->json(['data' => PFII_Accomp::where('is_active','Y')->get()]);
    }


    public function store(Request $request)
    {

        $accomp = new PFII_Accomp();
        $accomp->activity_date = $request->activity_date;
        $accomp->site = $request->site;
        $accomp->activity = $request->activity;
        $accomp->remarks = $request->remarks;
        $accomp->personels = implode('+',$request->personels);
        $accomp->date_created = date('Y-m-d');
        $accomp->created_by =  $request->created_by;
        if($accomp->save()){
            $msg = array(
                'status' => 'Success',
                'statusCode' => 200
            );
        }else{
            $msg = array(
                'status' => 'Something went wrong!',
                'statusCode' => 500
            );
        }
        return response()->json($msg);
    }


    public function show($id)
    {
        return PFII_Accomp::where('id',$id)->get();
    }


    public function update(Request $request)
    {
        $data = array(
            'activity_date' => $request->activity_date,
            'site' => $request->site,
            'activity' => $request->activity,
            'remarks' => $request->remarks,
            'personels' => $request->personels,
        );
        return PFII_Accomp::where('id',$request->id)->update($data);
    }


    public function destroy($id)
    {
        return PFII_Accomp::where('id',$id)->update(['is_active'=>'N']);
    }
}
