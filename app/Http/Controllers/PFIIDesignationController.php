<?php

namespace App\Http\Controllers;

use App\Models\PFII_designation;
use Illuminate\Http\Request;

class PFIIDesignationController extends Controller
{

    public function index()
    {
        return PFII_designation::all();
    }


    public function store(Request $request)
    {
        $des = new PFII_designation();
        $des->designation = $request->designation;
//        $des->is_active = $request->is_active;
        $des->date_created = date('Y-m-d');
        $des->created_by = $request->created_by;
        if($des->save()){
            $msg = [
                'status' => 'Success',
                'statusCode' => 200
            ];
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
        return PFII_designation::where('id',$id)->get();
    }


    public function update(Request $request)
    {
        return PFII_designation::where('id',$request->id)->update(['designation' => $request->designation]);
    }


    public function destroy($id)
    {
        return PFII_designation::where('id',$id)->update(['is_active' => 'N']);
    }
}
