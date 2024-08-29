<?php

namespace App\Http\Controllers;

use App\Models\Calendar;
use Illuminate\Http\Request;

class CalendarController extends Controller
{


    public function index(){
        $res =  Calendar::where('is_active','Y')->get();
        return json_encode(['data' => $res]);
    }

    public function fetch($id){
        $res = Calendar::where('id',$id)->where('is_active','Y')->get();
        return response()->json(['data' => $res]);
    }

    public function store(Request $req){
        $cal = new Calendar();
        $cal->title = $req->ename;
        $cal->description = $req->edesc;
        $cal->start = $req->edate;
        $cal->end = $req->edate;
        $cal->className = $req->ecolor;
        $cal->icon = $req->eicon;
        $cal->allDay = $req->allDay ?? 1;
        $cal->date_created = date('Y-m-d');
        $cal->created_by = $req->created_by;
        $cal->save();
        return response()->json(['status' => 'Success','statusCode' => 200]);
    }

    public function update(Request $req){
        $id = $req->id;
        $data = [
            'title' => $req->ename,
            'description' => $req->edesc,
            'start' => $req->edate,
            'end' => $req->end,
            'className' => $req->className,
            'icon' => $req->icon,
            'allDay' => $req->allDay,
        ];
        Calendar::where('id',$id)->update($data);
        return response()->json(['status' => 'Success','statusCode' => 200]);
    }

    public function destroy(Request $req){
        $id = $req->id;
        $data = ['is_active' => 'N'];
        Calendar::where('id',$id)->update($data);
        return response()->json(['status' => 'Success','statusCode' => 200]);
    }

}
