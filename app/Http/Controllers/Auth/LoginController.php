<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']);
    }
    
    public function index() {
        return view('layouts.login');
    }

    public function login(Request $request) {

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(!auth()->attempt($request->only('email','password'))) {
            return back()->with('status','Invalid Credentials');
        }

        if(auth()->user()->user_type == 'College')
        {
            return redirect()->route('dashboard-college');
        }

        if(auth()->user()->user_type == 'Proponent')
        {
            return redirect()->route('dashboard-proponent');
        }
    }
}
