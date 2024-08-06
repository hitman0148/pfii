<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function loginHandler(Request $request)
    {
        $fieldType = filter_var($request->login_id, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        if($fieldType == 'email'){
            $request->validate([
                'login_id' => 'required|email|exists:admins,email',
                'password' => 'required|min:5|max:45'
            ],[
                'login_id.required' => 'Email or Username is required',
                'login_id.email' => 'Invalid email address',
                'login_id.exists' => 'Email is not exists in system',
                'passsword.required' => 'Password is required'
            ]);
        }else{
            $request->validate([
                'login_id' => 'required|exists:admins,username',
                'password' => 'required|min:5|max:45',
            ],[
                'login_id.required' => 'Email or Username is required',
                'login_id.exists' => 'Username is not exists in system',
                'password.required' => 'Password is required'
            ]);
        }

        $creds = array(
            $fieldType => $request->login_id,
            'password' => $request->password
        );

        if(Auth::guard('admin')->attempt($creds)){
//        if(Auth::attempt($creds)){
            return redirect('/admin/home');
//            return redirect()->route('admin.home');
//            return view('admin.index')->with('title','Home');
        }else{
            session()->flash('fail','Incorrect credentials');
//            return redirect()->back()->withErrors(['fail','Invalid Credentials']);
            return view('admin.login')->with('title','Login');
        }
    }



    function logOut(){

        Auth('admin')->logout();
        return view('admin.login')->with('title','Login');
    }

}
