<?php

namespace App\Http\Controllers\Proposal;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use DB;
use App\Models\Proposal;
use App\Models\Faculty;
use App\Models\Partner;
use App\Models\ProposalMember;
use App\Models\ProposalPartners;
use App\Models\ChanEndorsement;
use App\Models\ProposalRequirements;

class ProposalController extends Controller
{
    public function _construct()
    {
        $this->middleware('auth');
    }

    public function collegeView(Proposal $proposal)
    {
        $user = auth()->user();
        $proposal = Proposal::where('id', $proposal->id)->first();
        $partners = ProposalPartners::where('proposal_id', $proposal->id)->get();
        $members = ProposalMember::where('proposal_id', $proposal->id)->get();
        $reqs = ProposalRequirements::where('proposal_id', $proposal->id)->get();
        // $proposalRIO = Proposal::where('proposal_status', ['rio'])->paginate(5);
        // $proposal = Proposal::where('id', $proposal->id)->first();
        // $members = ProposalMember::where('proposal_id', $proposal->id)->get();
        // $partners = ProposalPartners::where('proposal_id', $proposal->id)->get();
        // $endorsement = ChanEndorsement::where('proposal_id', $proposal->id)->first();

        // if($proposal->proposal_read == 'new') {
        //     $proposal->update([
        //         'proposal_read' => 'visited'
        //     ]);
        // }

        // return view('proposal.index', [
        //     'user' => $user,
        //     'proposalsRIO' => $proposalRIO,
        //     'proposal' => $proposal,
        //     'members' => $members,
        //     'partners' => $partners,
        //     'reqs' => $reqs,
        //     'endorsement' => $endorsement,
        // ]);
        return view('college.proposal.proposal', [
            'user' => $user,
            'reqs' => $reqs,
            'proposal' => $proposal,
            'partners' => $partners,
            'members' => $members,
        ]);
    }

    public function proponentView(Proposal $proposal)
    {
        $user = auth()->user();
        $proposal = Proposal::where('id', $proposal->id)->first();
        $partners = ProposalPartners::where('proposal_id', $proposal->id)->get();
        $members = ProposalMember::where('proposal_id', $proposal->id)->get();
        $reqs = ProposalRequirements::where('proposal_id', $proposal->id)->get();

        return view('proponent.proposal.proposal-view', [
            'user' => $user,
            'reqs' => $reqs,
            'proposal' => $proposal,
            'partners' => $partners,
            'members' => $members,
        ]);
    }

    public function fileView(Proposal $proposal, $file)
    {
        return view('college.proposal.file-view', [
            'file' => $file,
        ]);
    }

    #CHANGE STATUS
    public function proposalStatus(Proposal $proposal, Request $request){
        $request = $request->proposal_status;
        if($request == 'revision') {
            $proposal->update([
                'proposal_status' => $request
            ]);
        } else {
            if($request == 'rmo') {
                $data = ProposalRequirements::where('proposal_id', $proposal->id)->first();
                $proposal->update([
                    'proposal_status' => $request
                ]);
                $data->update([
                    "proposal_CRP_status" => null,
                    "proposal_LIB_status" => null,
                    "proposal_CVP_status" => null,
                    "proposal_SDRPM_status" => null,
                    "proposal_CERT_status" => null,
                    "proposal_WP_status" => null,
                ]);
            } else {
                if($request == 'non-compliant' || $request == 'compliant') {
                    $proposal->update([
                        'proposal_status' => $request
                    ]);

                    dd($request);
                }
            }
        }
    }

    #APPROVAL OF REQS
    public function approveCRP(Proposal $proposal, Request $request)
    {
        $proposal->requirements()->update([
            'proposal_CRP_status' => $request->proposal_CRP_status,
        ]);

        return back();
    }
    public function declineCRP(Proposal $proposal, Request $request)
    {
        $this->validate($request,[
            'remarks_CRP' => 'required'
        ]);
        $proposal->requirements()->update([
            'proposal_CRP_status' => $request->proposal_CRP_status,
        ]);

        return back();
    }
    public function approveLIB(Proposal $proposal, Request $request)
    {
        $proposal->requirements()->update([
            'proposal_LIB_status' => $request->proposal_LIB_status,
        ]);

        return back();
    }
    public function declineLIB(Proposal $proposal, Request $request)
    {
        $this->validate($request,[
            'remarks_LIB' => 'required'
        ]);
        $proposal->requirements()->update([
            'proposal_LIB_status' => $request->proposal_LIB_status,
        ]);

        return back();
    }
    public function approveCVP(Proposal $proposal, Request $request)
    {
        $proposal->requirements()->update([
            'proposal_CVP_status' => $request->proposal_CVP_status,
        ]);

        return back();
    }
    public function declineCVP(Proposal $proposal, Request $request)
    {
        $this->validate($request,[
            'remarks_CVP' => 'required'
        ]);
        $proposal->requirements()->update([
            'proposal_CVP_status' => $request->proposal_CVP_status,
        ]);

        return back();
    }
    public function approveSDRPM(Proposal $proposal, Request $request)
    {
        $proposal->requirements()->update([
            'proposal_SDRPM_status' => $request->proposal_SDRPM_status,
        ]);

        return back();
    }
    public function declineSDRPM(Proposal $proposal, Request $request)
    {
        $this->validate($request,[
            'remarks_SDRPM' => 'required'
        ]);
        $proposal->requirements()->update([
            'proposal_SDRPM_status' => $request->proposal_SDRPM_status,
        ]);

        return back();
    }
    public function approveCERT(Proposal $proposal, Request $request)
    {
        $proposal->requirements()->update([
            'proposal_CERT_status' => $request->proposal_CERT_status,
        ]);

        return back();
    }
    public function declineCERT(Proposal $proposal, Request $request)
    {
        $this->validate($request,[
            'remarks_CERT' => 'required'
        ]);
        $proposal->requirements()->update([
            'proposal_CERT_status' => $request->proposal_CERT_status,
        ]);

        return back();
    }
    public function approveWP(Proposal $proposal, Request $request)
    {
        $proposal->requirements()->update([
            'proposal_WP_status' => $request->proposal_WP_status,
        ]);

        return back();
    }
    public function declineWP(Proposal $proposal, Request $request)
    {
        $this->validate($request,[
            'remarks_WP' => 'required'
        ]);
        $proposal->requirements()->update([
            'proposal_WP_status' => $request->proposal_WP_status,
        ]);

        return back();
    }

    public function endorsement(Request $request, Proposal $proposal)
    {
        $data = ChanEndorsement::where('proposal_id', $proposal->id)->first();
        if($data != null) {
            #delete file to public folder
            $prevEndorsement = $data->proposal_endorsement;
            $path = 'requirements/'.$prevEndorsement;
            $path = public_path($path);
            File::delete($path);

            #move file to public folder
            $newEndorsement = time() . $request->proposal_endorsement .'proposal_endorsement' . $request->proposal_endorsement->extension();
            $request->proposal_endorsement->move(public_path('requirements'), $newEndorsement);
            
            #create
            $proposal->endorsement()->create([
                'proposal_endorsement' => $newendorsement
            ]);
        } else {
            #move file to public folder
            $newendorsement = time() . $request->proposal_endorsement . 'proposal_endorsement' . $request->proposal_endorsement->extension();
            $request->proposal_endorsement->move(public_path('requirements'), $newendorsement);

            #create
            $proposal->endorsement()->create([
                'proposal_endorsement' => $newendorsement
            ]);
        }
        return redirect()->route('proposal', $proposal->id);
    }
}
