<?php

namespace App\Http\Controllers\Proposal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Proposal;

class CreateProposalController extends Controller
{
    public function index()
    {
        return view('proposal.create-proposal');
    }

    public function createProposal(Request $request)
    {
        $this->validate($request, [
            'proposal_title' => 'required|max:255',
            'proposal_duration' => 'required|max:100',
            'proposal_leader' => 'required|max:255',
        ]);

        $request->user()->createProposal()->create([
            'proposal_title' => $request->proposal_title,
            'proposal_duration' => $request->proposal_duration,
            'proposal_leader' => $request->proposal_leader,
        ]) ;

        return redirect()->route('draft');
    }
}
