<?php

namespace App\Http\Controllers\Auth\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('backend.auth.login');
    }

    public function login(Request $request)
    {

        if(Auth::guard('admin')->attempt(['email'=>$request->email,'password'=>$request->password]))
        {
            Session::put('admin',$request->email);
            // $data = $request->session()->all();
            
            return redirect()->intended(route('admin'))->with('success','vous êtes connecté au panneau d\'administration');
        }
        
        return back()->withInput($request->only('email'));   
    }
}
