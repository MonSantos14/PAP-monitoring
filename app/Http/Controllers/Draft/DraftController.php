<?php

namespace App\Http\Controllers\Draft;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use DB;
use App\Models\Proposal;
use App\Models\Faculty;
use App\Models\Partner;
use App\Models\ProposalMember;
use App\Models\ProposalPartners;
use App\Models\ProposalRequirements;

class DraftController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    } 

    #DRAFTS PAGE
    public function index()
    {
        $userID = auth()->user()->id;
        // $proposal = Proposal::paginate(10);
        $drafts = Proposal::where('proposal_status', "draft")
        ->where('user_id', $userID) 
        ->orderBy('updated_at')
        ->paginate(5);
        return view('proponent.draft.drafts', [
            'drafts' => $drafts,
            'user' => auth()->user()
        ]);
    }
    #VIEW SINGLE DRAFT PAGE
    public function view(Proposal $proposal)
    {
        $members = ProposalMember::where('proposal_id', 'LIKE', $proposal->id)->get();
        $draft = Proposal::where('id', $proposal->id)->first();
        $partners = ProposalPartners::where('proposal_id', 'LIKE', $proposal->id)->get();
        $reqs = ProposalRequirements::where('proposal_id', '=', $proposal->id)->get();
        return view('proponent.draft.draft-proposal-view', [
            'draft' => $draft,
            'partners' => $partners,
            'reqs' => $reqs,
            'user' => auth()->user(),
            'members' => $members
        ]);
    }

    #UPDATE BASIC INFOS ON DRAFT
    public function update(Proposal $proposal, Request $request)
    {
        $requirements = ProposalRequirements::where('proposal_id', $proposal->id)->first();
        if($requirements) {

            if($request->proposal_CRP) {
                $prevCRP = $requirements->proposal_CRP;
                $path = 'requirements/'.$prevCRP;
                $path = public_path($path);
                File::delete($path);
                $newCRP = time() . $request->proposal_title .'proposal_CRP' . '.' . $request->proposal_CRP->extension();
                $request->proposal_CRP->move(public_path('requirements'), $newCRP);
                $proposal->requirements()->update([
                    'proposal_CRP' => $newCRP,
                ]);
            }
            if($request->proposal_LIB) {
                $prevLIB = $requirements->proposal_LIB;
                $path = 'requirements/'.$prevLIB;
                $path = public_path($path);
                File::delete($path);
                $newLIB = time() . $request->proposal_title .'proposal_LIB' . '.' . $request->proposal_LIB->extension();
                $request->proposal_LIB->move(public_path('requirements'), $newLIB);
                $proposal->requirements()->update([
                    'proposal_LIB' => $newLIB,
                ]);
            }
            if($request->proposal_CVP) {
                $prevCVP = $requirements->proposal_CVP;
                $path = 'requirements/'.$prevCVP;
                $path = public_path($path);
                File::delete($path);
                $newCVP = time() . $request->proposal_title .'proposal_CVP' . '.' . $request->proposal_CVP->extension();
                $request->proposal_CVP->move(public_path('requirements'), $newCVP);
                $proposal->requirements()->update([
                    'proposal_CVP' => $newCVP,
                ]);
            }
            if($request->proposal_SDRPM) {
                $prevSDRPM = $requirements->proposal_SDRPM;
                $path = 'requirements/'.$prevSDRPM;
                $path = public_path($path);
                File::delete($path);
                $newSDRPM = time() . $request->proposal_title .'proposal_SDRPM' . '.' . $request->proposal_SDRPM->extension();
                $request->proposal_SDRPM->move(public_path('requirements'), $newSDRPM);
                $proposal->requirements()->update([
                    'proposal_SDRPM' => $newSDRPM,
                ]);
            }
            if($request->proposal_CERT) {
                $prevCERT = $requirements->proposal_CERT;
                $path = 'requirements/'.$prevCERT;
                $path = public_path($path);
                File::delete($path);
                $newCERT = time() . $request->proposal_title .'proposal_CERT' . '.' . $request->proposal_CERT->extension();
                $request->proposal_CERT->move(public_path('requirements'), $newCERT);
                $proposal->requirements()->update([
                    'proposal_CERT' => $newCERT,
                ]);
            }
            if($request->proposal_WP) {
                $prevWP = $requirements->proposal_WP;
                $path = 'requirements/'.$prevWP;
                $path = public_path($path);
                File::delete($path);
                $newWP = time() . $request->proposal_title .'proposal_WP' . '.' . $request->proposal_WP->extension();
                $request->proposal_WP->move(public_path('requirements'), $newWP);
                $proposal->requirements()->update([
                    'proposal_WP' => $newWP,
                ]);
            }
            $proposal->update([
                'proposal_title' => $request->proposal_title,
                'proposal_duration' => $request->proposal_duration
            ]);

            return back();
        } else {

            $proposal->update([
                'proposal_title' => $request->proposal_title,
                'proposal_duration' => $request->proposal_duration
            ]);

            $this->validate($request, [
                'proposal_CRP' => 'required',
                'proposal_LIB' => 'required',
                'proposal_CVP' => 'required',
                'proposal_SDRPM' => 'required',
                'proposal_CERT' => 'required',
                'proposal_WP' => 'required'
            ]);
            
            $newCRP = date('Y-m-h') . $request->proposal_title .'proposal_CRP'. '.' . $request->proposal_CRP->extension();
            $request->proposal_CRP->move(public_path('requirements'), $newCRP);
            $newLIB = date('Y-m-h') . $request->proposal_title .'proposal_LIB'. '.' . $request->proposal_LIB->extension();
            $request->proposal_LIB->move(public_path('requirements'), $newLIB);
            $newCVP = date('Y-m-h') . $request->proposal_title .'proposal_CVP'. '.' . $request->proposal_CVP->extension();
            $request->proposal_CVP->move(public_path('requirements'), $newCVP);
            $newSDRPM = date('Y-m-h') . $request->proposal_title .'proposal_SDRPM'. '.' . $request->proposal_SDRPM->extension();
            $request->proposal_SDRPM->move(public_path('requirements'), $newSDRPM);
            $newCERT = date('Y-m-h') . $request->proposal_title .'proposal_CERT'. '.' . $request->proposal_CERT->extension();
            $request->proposal_CERT->move(public_path('requirements'), $newCERT);
            $newWP = date('Y-m-h') . $request->proposal_title .'proposal_WP'. '.' . $request->proposal_WP->extension();
            $request->proposal_WP->move(public_path('requirements'), $newWP);

            $proposal->requirements()->create([
                'proposal_CRP' => $newCRP,
                'proposal_LIB' => $newLIB,
                'proposal_CVP' => $newCVP,
                'proposal_SDRPM' => $newSDRPM,
                'proposal_CERT' => $newCERT,
                'proposal_WP' => $newWP
            ]);

            return back();
        }



    }

    #ADD/DELETE MEMBER UI
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

    #ADD MEMBER FUNCTION
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

    #ADD/DELETE PARTNER UI
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

    #ADD PARTNER FUNCTION
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

    #ADD/CHANGE TEAM LEADER UI
    public function editLeader($id)
    {
        $search = request()->query('search');
        $draftID = $id;
        $draft = Proposal::where('id', 'LIKE', $draftID)->get();
        $partners = ProposalPartners::where('proposal_id', 'LIKE', $draftID)->get();
        $members = ProposalMember::where('proposal_id', 'LIKE', $draftID)->get();
        $faculties = Faculty::get();
        $user = auth()->user();
        if ($search) {
            $faculties = Faculty::where('faculty_fullname', 'LIKE', "%{$search}%")
                        ->get();
            return view('proposal.draft.draft-update-leader', [ 
                        'draft' => $draft,
                        'members' => $members,
                        'faculties' => $faculties,
                        'partners' => $partners,
                        'search' => $search,
                        'user' => $user
                        ]);
        } else {
            return view('proposal.draft.draft-update-leader', [
                        'search' => $search,
                        'members' => $members,
                        'partners' => $partners,
                        'faculties' => $faculties,
                        'draft' => $draft,
                        'user' => $user
                        ]);
        }  
    }
    #ADD TEAM LEADER FUNCTION   
    public function addLeader(Proposal $proposal, Request $request)
    {
        $id = $proposal->id;
        $proposal->update([
            'proposal_leader' => $request->faculty_fullname
        ]);

        return redirect()->route('draft-proposal', $id);
    }
    #SEND TO RIO
    public function sendtorio(Proposal $proposal)
    {
        if($proposal->proposal_title != null && $proposal->proposal_duration != null && $proposal->proposal_leader != null){
            $data = ProposalRequirements::where('proposal_id', $proposal->id)->first();
            $partner = ProposalPartners::where('proposal_id', $proposal->id)->first();
            $member = ProposalMember::where('proposal_id', $proposal->id)->first();

            if($data->proposal_CRP != null && $data->proposal_LIB != null && $data->proposal_CVP != null && $data->proposal_SDRPM != null &&$data->proposal_CERT != null &&$data->proposal_WP != null) {
                if($partner != null && $member != null){
                    $rio = "rio";
                    $proposal->update([
                        'proposal_status' => $rio
                    ]);
                    return redirect()->route('dashboard');
                }
            }
        } else {
            dd("ERROR");
        }
    }
}
