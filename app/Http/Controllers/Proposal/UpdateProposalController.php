<?php

namespace App\Http\Controllers\Proposal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Proposal;
use App\Models\ProposalPartners;
use App\Models\ProposalRequirements;
use App\Models\ProposalMember;

class UpdateProposalController extends Controller
{
    public function view(Proposal $proposal)
    {
        $user = auth()->user();
        $partners = ProposalPartners::where('proposal_id', 'LIKE', $proposal->id)->get();
        $members = ProposalMember::where('proposal_id', 'LIKE', $proposal->id)->get();
        $reqs = ProposalRequirements::where('proposal_id', '=', $proposal->id)->get();

        return view('proposal.update-proposal.view', [
            'proposal' => $proposal,
            'user' => $user,
            'members' => $members,
            'partners' => $partners,
            'reqs' => $reqs,
        ]);
    }
}
