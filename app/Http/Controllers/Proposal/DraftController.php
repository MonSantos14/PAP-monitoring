<?php

namespace App\Http\Controllers\Proposal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Proposal;
use App\Models\User;

class DraftController extends Controller
{
    public function index()
    {
        $proposal = Proposal::paginate(10);
        return view('proposal.draft');        
    }
}
