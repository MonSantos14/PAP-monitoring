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
        $userID = auth()->user()->id;
        $proposals = Proposal::where('user_id', $userID)
                            ->paginate(5);
        $user = auth()->user(); 
        
        return view('layouts.dashboard', [
            'proposals' => $proposals,
            'user' => $user
        ]);
    }
}
