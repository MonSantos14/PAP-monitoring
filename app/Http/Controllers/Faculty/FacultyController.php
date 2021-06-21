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

        $search = request()->query('search');
        
        $faculties = auth()->user()->createFaculty;

        if ($search) {
            $faculties = Faculty::where('faculty_fullname', 'LIKE', "%{$search}%")
                                    ->get();
        }else {
            $faculties = auth()->user()->createFaculty;
        }
        
        return view('faculty.index', [ 
            'faculties' => $faculties
        ]);
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
        $fullname = $request->faculty_firstname . ' ' . $request->faculty_lastname;

        $request->faculty_image->move(public_path('images'), $newImageName);
        $college = auth()->user()->name;

        $request->user()->createFaculty()->create([
            'faculty_id' => $request->faculty_id,
            'faculty_college' => $college,
            'faculty_firstname' => $request->faculty_firstname,
            'faculty_lastname' => $request->faculty_lastname,
            'faculty_fullname' => $fullname,
            'faculty_type' => $request->faculty_type,
            'faculty_email' => $request->faculty_email,
            'faculty_image' => $newImageName
        ]);
        
        return redirect()->route('faculty');
    }

    public function edit($id)
    {
        $faculties = auth()->user()->createFaculty;
        $data = Faculty::where('id', 'LIKE', "{$id}")->get();
        // dd($data);
        return view('faculty.edit', [
            'faculties' => $faculties,
        ]) ->with('faculty', Faculty::where('id', 'LIKE', "{$id}")
            ->first());
    }

    public function update(Request $request, $id)
    {
        $fullname = $request->faculty_firstname . ' ' . $request->faculty_lastname;

        Faculty::where('id', $id)
                ->update([
                    'faculty_id' => $request->faculty_id,
                    'faculty_firstname' => $request->faculty_firstname,
                    'faculty_lastname' => $request->faculty_lastname,
                    'faculty_fullname' => $fullname,
                    'faculty_email' => $request->faculty_email
        ]);
        
        return redirect()->route('faculty');
            
    }

    public function imageLayout($id)
    {
        $faculties = auth()->user()->createFaculty;
        $data = Faculty::where('id', 'LIKE', "{$id}")->get();
        // dd($data);
        return view('faculty.edit-image', [
            'faculties' => $faculties,
        ]) ->with('faculty', Faculty::where('id', 'LIKE', "{$id}")->first());
    }

    public function editImage(Request $request, $id) {
        Faculty::where('id', $id)
                ->update([
                    'faculty_image' => $request->faculty_image
        ]);
        
        return redirect()->route('faculty');
    }
}
