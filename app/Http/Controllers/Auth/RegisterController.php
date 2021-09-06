<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{ 
    public function __construct()
    {
        $this->middleware(['guest']);
    }
    
    public function index() {
        return view('layouts.register');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'office_name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'campus' => 'required',
            'password' => 'required|confirmed',
            'user_type' => 'required',
        ]);

        User::create([
            'office_name' => $request->office_name,
            'email' => $request->email,
            'campus' => $request->campus,
            'password' => Hash::make($request->password),
            'user_type' => $request->user_type,
        ]);

        return redirect()->route('register');
    }
}
