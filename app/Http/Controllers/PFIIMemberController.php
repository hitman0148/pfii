<?php

namespace App\Http\Controllers;

use App\Exports\MemberExport;
use App\Imports\DesignationImport;
use App\Models\PFII_Member;
use Illuminate\Http\Request;
use App\Imports\MemberImport;
use Maatwebsite\Excel\Facades\Excel;

class PFIIMemberController extends Controller
{
    //===================================================================
    //Export and import
    //===================================================================

    public function importMember(Request $request){

        $request->validate([
           'import_file' => [
               'required',
               'file'
           ]
        ]);
        Excel::import(new MemberImport, $request->file('import_file'));
        return redirect('/admin/members')->with('status','All Goods!');
    }

    public function exportMember(){
        return Excel::download(new MemberExport, 'members.xlsx');
    }


    public function importDesig(Request $request){

        $request->validate([
            'import_file' => [
                'required',
                'file'
            ]
        ]);
        Excel::import(new DesignationImport, $request->file('import_file'));
        return redirect('/admin/designation')->with('status','All Goods!');
    }

    //=============================================================
    //CRUD Member
    //=============================================================


    public function index()
    {
//        return json_encode(['data' => PFII_Member::select('id_no','fname','lname','mi','bday','gender','civil_stat','address','mobile_no','date_expiration')->where('is_active','Y')->orderBy('id_no', 'ASC')->get()]);
        return json_encode(['data' => PFII_Member::selectRaw('REPLACE(id_no," ","") id_no,UCASE(fname) fname,UCASE(lname) lname,UCASE(mi) mi,bday,UCASE(gender) gender,UCASE(civil_stat) civil_stat,address,mobile_no,date_expiration')->where('is_active','Y')->orderBy('id_no', 'ASC')->get()]);
    }


    public function store(Request $request)
    {
        $member = new PFII_Member();
        $member->id_no = $request->id_no;
        $member->fname = strtoupper($request->fname);
        $member->lname = strtoupper($request->lname);
        $member->mi = strtoupper($request->mi);
        $member->bday = $request->bday;
        $member->gender = $request->gender;
        $member->civil_stat = $request->civil_stat;
        $member->address = strtoupper($request->address);
        $member->mobile_no = $request->mobile_no;
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
