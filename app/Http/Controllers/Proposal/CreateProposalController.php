<?php
namespace App\Http\Controllers\Proposal;

#DATE
Use \Carbon\Carbon;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Proposal;
use App\Models\Partner;
use App\Models\Faculty;
use DB;

class CreateProposalController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    } 

    public function index()
    {
        return view('proposal.create-proposal');
    }

    public function createProposal(Request $request)
    {
        $proposal = Proposal::get();
        $latest = Proposal::latest()->first();
        $count = $proposal->count();
        $count = $count + 1 ;
        
        if( $proposal->count() ) {
            #Getting last proposals refID year
            $year = $latest->year;
            $counter = $latest->counter;
            
            $date = Carbon::now()->year;

            if($year == $date) {
                // Increment last Counter
                $counter = $counter + 1 ;
                $refID = 'R'. $date . '-' . $counter;
                // dd($counter,$refID);
            } else {
                $counter = 1;
                $refID = 'R'. $date . '-' . $counter;
                // dd($counter,$refID);
            }

            $this->validate($request, [
                'proposal_title' => 'required|max:255',
            ]);
            $request->user()->createProposal()->create([
                'proposal_title' => $request->proposal_title,
                'proposal_refID' => $refID,
                'counter' => $counter,
                'proposal_location' => 'Proponent',
                'year' => $date,
    
            ]);
            return redirect()->route('draft-proposal',$count);

        } else {
            #Assigning ID to redirect to draft
            $count = $proposal->count();
            $count = $count + 1 ;
            
            #Get current year
            $date = Carbon::now()->year;
            $counter = 1;

            #RefID
            $refID = 'R'. $date . '-' . $counter;
        }

        $this->validate($request, [
            'proposal_title' => 'required|max:255',
        ]);
        $request->user()->createProposal()->create([
            'proposal_title' => $request->proposal_title,
            'proposal_refID' => $refID,
            'counter' => $counter,
            'location' => 'Proponent',
            'year' => $date,

        ]);
        return redirect()->route('draft-proposal',$count);
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
