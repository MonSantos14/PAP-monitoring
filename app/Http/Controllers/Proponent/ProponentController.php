<?php

namespace App\Http\Controllers\Proponent;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

use App\Models\User;

class ProponentController extends Controller
{
    //AUTH USERS
    public function _construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $office = auth()->user()->office_name;

        $proponent = User::where('user_type', 'Proponent')
                ->where('office_name', $office )    
                ->paginate(5);
        return view('college.proponent.index', [
            'proponent' => $proponent
        ]);
    }

    public function createView()
    {
        return view('college.proponent.create-proponent');
    }

    public function createProponent(Request $request)
    {
        $this->validate($request, [
            'fileInputPic' => 'mimes:jpg,jpeg|max:5048',
            'email' => 'required|email|unique:users',
            'firstname' => 'required|max:255',
            'middlename' => 'max:255',
            'lastname' => 'required|max:255',
        ]);
        
        $userType = 'Proponent';
        $defaultPass = $request->firstname.'1234';
        $campus = auth()->user()->campus;
        $office = auth()->user()->officec_name;
        
        if($request->fileInputPic == null) {
            $newImageName = $request->fileInputPic = 'default.jpg';
        } else {
            $newImageName = time() . '-' . $request->firstname . '.' . $request->fileInputPic->extension();
            $request->fileInputPic->move(public_path('img/proponent/'), $newImageName);
        }

        User::create([
            'office_name' => $office,
            'firstname' => $request->firstname,
            'middlename' => $request->middlename,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'campus' => $campus,
            'password' => Hash::make($defaultPass),
            'user_image' => $newImageName,
            'user_type' => $userType,
        ]);

        return back();
    }

    public function changePw() {
        return view('proponent.change-pass',[
            'user' => auth()->user(),
        ]);
    }

    public function updatePw(Request $request) {

        $this->validate($request, [
            'current_password' => 'required',
            'new_password' => 'required',
            'confirm_password' => 'required|same:new_password',
        ]);

        $current = auth()->user()->password;
        $user = auth()->user();

        if(Hash::check($request->current_password, $current)){
            $user->update([
                'password' => Hash::make($request->new_password)
            ]);
        } else {
            dd('doesn\'t match');
        }

        return back();
    }

    public function view(User $user){
        dd($user);
    }
}
