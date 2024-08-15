<?php

namespace App\Http\Controllers;

use App\Exports\MemberExport;
use App\Models\PFII_Member;
use Illuminate\Http\Request;
use App\Imports\MemberImport;
use Maatwebsite\Excel\Facades\Excel;

class PFIIMemberController extends Controller
{
    public function importExcel(Request $request){

        $request->validate([
           'import_file' => [
               'required',
               'file'
           ]
        ]);
        Excel::import(new MemberImport, $request->file('import_file'));
//        Excel::toCollection(new MemberImport, $request->file('import_file'));
        return redirect('/admin/members')->with('status','All Goods!');
    }

    public function exportExcel(){
        return Excel::download(new MemberExport, 'members.xlsx');
    }

    public function index()
    {
        return json_encode(['data' => PFII_Member::where('is_active','Y')->get()]);
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
