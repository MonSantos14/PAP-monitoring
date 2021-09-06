<?php

namespace App\Http\Controllers\Faculty;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
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
        $id = auth()->user()->id;

        if ($search) {
            $faculties = Faculty::where('faculty_fullname', 'LIKE', "%{$search}%")
                                    ->paginate(5);
        }else {
            $faculties = Faculty::where('user_id', $id)
            ->paginate(5);
        }
        
        return view('college.faculty.index', [ 
            'faculties' => $faculties,
        ]);
    }

    public function createView() {
        return view('college.faculty.create-faculty');
    }

    public function createFaculty(Request $request)
    {
        $this->validate($request, [
            'fileInputPic' => 'mimes:jpg,jpeg|max:5048',
            'faculty_id' => 'required|string|unique:faculties',
            'faculty_email' => 'required|email|unique:faculties',
            'faculty_firstname' => 'required|max:255',
            'faculty_middlename' => 'max:255',
            'faculty_lastname' => 'required|max:255',
        ]);
        
        if($request->fileInputPic == null) {
            $newImageName = $request->fileInputPic = 'default.jpg';
        } else {
            $newImageName = time() . '-' . $request->faculty_firstname . '.' . $request->fileInputPic->extension();
            $request->fileInputPic->move(public_path('img/faculty/'), $newImageName);
        }
        
        if($request->faculty_middlename) {
            $fullname = $request->faculty_firstname . ' ' . $request->faculty_middlename . ' ' . $request->faculty_lastname;
        } else {
            $fullname = $request->faculty_firstname . ' ' . $request->faculty_lastname;
            $request->faculty_middlename = 'null';
        }
        
        // dd($fullname);

        $college = auth()->user()->office_name;

        $request->user()->createFaculty()->create([
            'faculty_id' => $request->faculty_id,
            'faculty_college' => $college,
            'faculty_firstname' => $request->faculty_firstname,
            'faculty_middlename' => $request->faculty_middlename,
            'faculty_lastname' => $request->faculty_lastname,
            'faculty_fullname' => $fullname,
            'faculty_type' => $request->faculty_type,
            'faculty_email' => $request->faculty_email,
            'faculty_image' => $newImageName
        ]);
        
        return redirect()->route('create-faculty-college');
    }

    public function edit(Faculty $faculty)
    {
        $faculties = auth()->user()->createFaculty;
        $data = Faculty::where('id', $faculty->id)->first();
        return view('college.faculty.edit-faculty', [
            'data' => $data,
            ]
        );
    }

    public function update(Request $request, $id)
    {
        if ($request->faculty_middlename){
            $fullname = $request->faculty_firstname . ' ' . $request->faculty_middlename . ' ' . $request->faculty_lastname;
        } else {
            $fullname = $request->faculty_firstname . ' ' . $request->faculty_lastname;
        }

        Faculty::where('id', $id)
                ->update([
                    'faculty_id' => $request->faculty_id,
                    'faculty_firstname' => $request->faculty_firstname,
                    'faculty_middlename' => $request->faculty_middlename,
                    'faculty_lastname' => $request->faculty_lastname,
                    'faculty_fullname' => $fullname,
                    'faculty_email' => $request->faculty_email
        ]);
        
        return redirect()->route('faculty-college');
            
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

    public function deleteFaculty(Faculty $faculty, Request $request) {

        if($faculty->faculty_image != 'default.jpg') {
            $path = 'img/faculty/'.$faculty->faculty_image;
            $path = public_path($path);
            File::delete($path);
        }

        Faculty::where('id', $faculty->id)->delete();
        return back();
    }
}
