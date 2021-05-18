<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proposal;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth']);
    } 
    
    public function index() {
        $proposals = Proposal::paginate(5);

        return view('layouts.dashboard', [
            'proposals' => $proposals
        ]);
    }
}
