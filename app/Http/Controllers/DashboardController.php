<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proposal;
use App\Models\User;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth']);
    } 
    
    public function index() {
        $search = request()->query('search');
        $userID = auth()->user()->id;

        if ($search) {
            $proposals = Proposal::where('proposal_title', 'LIKE', "%{$search}%")
                                    ->orWhere('proposal_leader', 'LIKE', "%{$search}%")
                                    ->paginate(5);
        }else {
            $proposals = Proposal::where('user_id', $userID)
                                ->whereNotIn('proposal_status', ['draft'])
                                ->paginate(5);
        }
        
        $user = auth()->user(); 

        $proposalsRIO = Proposal::where('proposal_status', ['rio'])
        ->paginate(5);
        $proposalsRMO = Proposal::whereNotIn('proposal_status', ['draft', 'rio', 'new', 'revision'])
        ->paginate(5);
        // dd($proposalsRMO->count());
 
        return view('college.dashboard', [
            'user' => $user,
            'search' => $search,
            'proposals' => $proposals,
            'proposalsRIO' => $proposalsRIO,
            'proposalsRMO' => $proposalsRMO,
        ]);
    }

    public function proponent() {
        $user = auth()->user();
        $proposals = Proposal::where('user_id', $user->id)->paginate(5);
        return view('proponent.dashboard', [
            'user' => $user,
            'proposals' => $proposals
        ]);
    }
}
