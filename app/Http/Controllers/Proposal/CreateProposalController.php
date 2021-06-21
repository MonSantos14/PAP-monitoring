<?php

namespace App\Http\Controllers\Proposal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Proposal;
use App\Models\Partner;
use App\Models\Faculty;
use DB;

class CreateProposalController extends Controller
{
    public function index()
    { 
        $faculties = auth()->user()->createFaculty;
        return view('proposal.create-proposal', [ 
            'faculties' => $faculties
        ]);
    }

    public function createProposal(Request $request)
    {
        $this->validate($request, [
            'proposal_title' => 'required|max:255',
            'proposal_duration' => 'required|max:100'
        ]);

        $request->user()->createProposal()->create([
            'proposal_title' => $request->proposal_title,
            'proposal_duration' => $request->proposal_duration,
        ]);

        return redirect()->route('draft');
    }



    public function addMembers()
    {
        $search = request()->query('search');
        
        if ($search) {
            $faculties = Faculty::where('faculty_fullname', 'LIKE', "%{$search}%")
                                ->orWhere('faculty_email', 'LIKE', "%{$search}%")
                                ->orWhere('faculty_id', 'LIKE', "%{$search}%")
                                ->get();
            return view('proposal.update-proposal', [ 
                'faculties' => $faculties,
                'search' => $search
            ]);
        } else {
            return view('proposal.update-proposal', [ 
                'search' => $search
            ]);
        }
    }    
}
