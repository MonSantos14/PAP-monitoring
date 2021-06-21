<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faculty;
use DB;

class SearchController extends Controller
{
    public function searchMembers(Request $request) {
        $memberSearch = $request->memberSearch;
        
        $result = DB::table('faculties')
                ->Where('faculty_fullname', 'LIKE', '%'.$memberSearch.'%')
                ->orWhere('faculty_email', 'LIKE', '%'.$memberSearch.'%')
                ->orWhere('faculty_id', 'LIKE', '%'.$memberSearch.'%')
                ->get();
                
        echo $result;
    }
}
