<?php

namespace App\Http\Controllers\Auth\Seller;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('seller.auth.login');
    }

    public function login(Request $request)
    {
        if(Auth::guard('seller')->attempt(['email'=>$request->email,'password'=>$request->password]))
        {
            Session::put('seller',$request->email);
            
            return redirect()->intended(route('seller'))->with('success','Vous êtes connecté au panneau vendeur');
        }
        return back()->withInput($request->only('email'));
    }
}
