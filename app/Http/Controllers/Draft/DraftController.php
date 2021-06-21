<?php

namespace App\Http\Controllers\Draft;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Proposal;
use App\Models\Faculty;
use App\Models\Partner;
use App\Models\ProposalMember;
use App\Models\ProposalPartners;

class DraftController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    } 

    public function index()
    {
        $userID = auth()->user()->id;
        // $proposal = Proposal::paginate(10);
        $drafts = Proposal::where('proposal_status', 'LIKE', "new")
                        ->where('user_id', $userID) 
                        ->orderBy('updated_at')
                        ->paginate(4);
        return view('proposal.draft.drafts', [
            'drafts' => $drafts
        ]);
    }

    public function view($id)
    {
        $draftID = $id;

        $members = ProposalMember::where('proposal_id', 'LIKE', $draftID)->get();
        $draft = Proposal::where('id', 'LIKE', $draftID)->get();
        $partners = ProposalPartners::where('proposal_id', 'LIKE', $draftID)->get();
        return view('proposal.draft.draft', [
            'draft' => $draft,
            'partners' => $partners,
            'members' => $members
        ]);
    }

    public function update(Proposal $proposal, Request $request)
    {
        $data = $proposal->requirements()->create([
            'proposal_CRP' => $request->proposal_CRP ,
            'proposal_LIB' => $request->proposal_LIB,
            'proposal_CVP' => $request->proposal_CVP,
            'proposal_SDRPM' => $request->proposal_SDRPM,
            'proposal_CERT' => $request->proposal_CERT,
            'proposal_WP' => $request->proposal_WP,
        ]);

        dd($data);
    }

    public function editmembers($id)
    {
        $search = request()->query('search');
        $draftID = $id;
        $draft = Proposal::where('id', 'LIKE', $draftID)->get();
        $partners = ProposalPartners::where('proposal_id', 'LIKE', $draftID)->get();
        $members = ProposalMember::where('proposal_id', 'LIKE', $draftID)->get();
        $user = auth()->user();

        if($search) {
            $faculties = Faculty::where('faculty_fullname', 'LIKE', "%{$search}%")
                                ->orWhere('faculty_email', 'LIKE', "%{$search}%")
                                ->orWhere('faculty_id', 'LIKE', "%{$search}%")
                                ->get();
            return view('proposal.draft.draft-update-members', [ 
                'draft' => $draft,
                'members' => $members,
                'faculties' => $faculties,
                'partners' => $partners,
                'search' => $search,
                'user' => $user
            ]);
        }else {
            return view('proposal.draft.draft-update-members', [
                'search' => $search,
                'members' => $members,
                'partners' => $partners,
                'draft' => $draft,
                'user' => $user
            ]);
        }        
    }   

    public function addMember(Proposal $proposal, Request $request)
    {  
        
        $data = ProposalMember::where('faculty_id', $request->faculty_id)->where('proposal_id', $request->proposal_id)->first();
        if($data == true) {
            dd('DATA ALREADY EXISTED');
        } else {
            $proposal->proposalmember()->create([
               'proposal_id' => $request->proposal_id,  
               'faculty_id' => $request->faculty_id,
               'faculty_college' => $request->faculty_college,
               'faculty_fullname' => $request->faculty_fullname,
           ]);
        }

       return back();
    }

    public function editPartners($id)
    {
        $search = request()->query('search');
        $draftID = $id;
        $draft = Proposal::where('id', 'LIKE', $draftID)->get();
        $partners = ProposalPartners::where('proposal_id', 'LIKE', $draftID)->get();
        $members = ProposalMember::where('proposal_id', 'LIKE', $draftID)->get();
        $user = auth()->user();
        if ($search) {
            $partners = Partner::where('partner_name', 'LIKE', "%{$search}%")
                        // ->orWhere('faculty_email', 'LIKE', "%{$search}%")
                        // ->orWhere('faculty_id', 'LIKE', "%{$search}%")
                        ->get();
            return view('proposal.draft.draft-update-partners', [ 
                        'draft' => $draft,
                        'members' => $members,
                        'partners' => $partners,
                        'search' => $search,
                        'user' => $user
                        ]);
            } else {
                return view('proposal.draft.draft-update-partners', [
                            'search' => $search,
                            'members' => $members,
                            'partners' => $partners,
                            'draft' => $draft,
                            'user' => $user
                            ]);
        }   
    }

    public function addPartner(Proposal $proposal, Request $request)
    {  
        $data = ProposalPartners::where('partner_id', $request->partner_id)
                                ->where('proposal_id', $request->proposal_id)
                                ->first();
        if($data == true) {
            dd('DATA ALREADY EXISTED');
        } else {
            $proposal->proposalpartner()->create([
               'proposal_id' => $request->proposal_id,  
               'partner_id' => $request->partner_id,
               'partner_name' => $request->partner_name,
               'partner_expiration' => $request->partner_expiration,
           ]);
        }

       return back();
    }
}
