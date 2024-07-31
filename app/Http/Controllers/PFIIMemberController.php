<?php

namespace App\Http\Controllers;

use App\Models\PFII_Member;
use Illuminate\Http\Request;

class PFIIMemberController extends Controller
{

    public function index()
    {
        return PFII_Member::all();
    }


    public function store(Request $request)
    {
        $member = new PFII_Member();
        $member->id_no = $request->id_no;
        $member->fname = $request->fname;
        $member->lname = $request->lname;
        $member->mi = $request->mi;
        $member->bday = $request->bday;
        $member->gender = $request->gender;
        $member->civil_stat = $request->civil_stat;
        $member->address = $request->address;
        $member->date_joined = $request->date_joined;
        $member->date_expiration = $request->date_expiration;
        if($member->save()){
            $msg = [
                'status' => 'success',
                'statusCode' => 200
            ];
        }else{
            $msg = [
                'status' => 'Something went wrong!',
                'statusCode' => 500
            ];
        }
        return response()->json($msg);
    }

    public function show($id)
    {
        return PFII_Member::where('id',$id)->get();
    }

    public function update(Request $request)
    {
        $data = array(
            'id_no' => $request->id_no,
            'fname' => $request->fname,
            'lname' => $request->lname,
            'mi' => $request->mi,
            'bday' => $request->bday,
            'gender' => $request->gender,
            'civil_stat' => $request->civil_stat,
            'address' => $request->address,
            'date_joined' => $request->date_joined,
            'date_expiration' => $request->date_expiration
        );

        return PFII_Member::where('id',$request->id)->update($data);
    }

    public function destroy($id)
    {
        return PFII_Member::where('id',$id)->update(['is_active' => 'N']);
    }
}
