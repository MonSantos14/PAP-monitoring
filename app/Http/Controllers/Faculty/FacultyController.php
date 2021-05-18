<?php

namespace App\Http\Controllers\Faculty;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faculty;

class FacultyController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    } 

    public function index() {

        $data = Faculty::get();

        auth()->

        return view('faculty.index', [
            'faculties' => $faculties
        ]);
        
        // testtest
    }

    public function createFaculty(Request $request)
    {
        $this->validate($request, [
            'faculty_image' => 'mimes:jpg,jpeg|max:5048',
            'faculty_id' => 'required|string',
            'faculty_email' => 'required|email|unique:faculties',
            'faculty_firstname' => 'required|max:255',
            'faculty_lastname' => 'required|max:255',
        ]);

        $newImageName = time() . '-' . $request->faculty_firstname . '.' . $request->faculty_image->extension();

        $request->faculty_image->move(public_path('images'), $newImageName);
        
        $request->user()->createFaculty()->create([
            'faculty_id' => $request->faculty_id,
            'faculty_firstname' => $request->faculty_firstname,
            'faculty_lastname' => $request->faculty_lastname,
            'faculty_email' => $request->faculty_email,
            'faculty_image' => $newImageName
        ]);
        
        return redirect()->route('faculty');
    }
}
