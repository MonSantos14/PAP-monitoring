@extends('index')

@section('content')
<section class="section-A">
    <div class="contain height-fit">
        <div class="proposal height-fit">
          @if ($user->user_type === 'college')      
                @if ($proposal)
                    <div class="">
                        <form action="" method="POST">
                            @csrf
                            <h2>PROJECT TITLE</h2>
                            <p>{{ $proposal->proposal_title }}</p>
                            <h2>PROJECT LEADER</h2>
                            <p>{{ $proposal->proposal_leader }}</p>

                            <h2>PROPOSAL MEMBERS</h2>
                            @foreach ($members as $member)
                                {{ $member->faculty_fullname }}
                            @endforeach
                            <h2>PROPOSAL PARTNERS</h2>
                            @foreach ($partners as $partner)
                                {{ $partner->partner_name }}
                            @endforeach
                        </form>
 
                        <div>
                            @csrf
                            @foreach ($reqs as $req)
                            <div>
                                <a href="{{ route('pdf', $req->proposal_CRP) }}" target="_blank" class="m-1">
                                    @if ($req->proposal_CRP_status == 'approved')
                                        <h3 class="bg-success">{{ $req->proposal_CRP }}</h3>   
                                        <p>Requirement Approved</p>
                                    @else
                                        @if ($req->proposal_CRP_status == 'declined')
                                            <h3 class="bg-danger">{{ $req->proposal_CRP }}</h3>
                                            <div>
                                                <h3>REMARKS HERE</h3>
                                            </div>
                                        @else
                                            <h3>{{ $req->proposal_CRP }}</h3>
                                        @endif
                                    @endif
                                </a>
                            </div>
                            <div>
                                <a href="{{ route('pdf', $req->proposal_LIB) }}" target="_blank" class="m-1">
                                    @if ($req->proposal_LIB_status == 'approved')
                                        <h3 class="bg-success">{{ $req->proposal_LIB }}</h3>   
                                        <p>Requirement Approved</p>
                                    @else
                                        @if ($req->proposal_LIB_status == 'declined')
                                            <h3 class="bg-danger">{{ $req->proposal_LIB }}</h3>
                                            <div>
                                                <h3>REMARKS HERE</h3>
                                            </div>
                                        @else
                                            <h3>{{ $req->proposal_LIB }}</h3>
                                        @endif
                                    @endif
                                </a>
                            </div>
                            <div>
                                <a href="{{ route('pdf', $req->proposal_CVP) }}" target="_blank" class="m-1">
                                    @if ($req->proposal_CVP_status == 'approved')
                                        <h3 class="bg-success">{{ $req->proposal_CVP }}</h3>   
                                        <p>Requirement Approved</p>
                                    @else
                                        @if ($req->proposal_CVP_status == 'declined')
                                            <h3 class="bg-danger">{{ $req->proposal_CVP }}</h3>
                                            <div>
                                                <h3>REMARKS HERE</h3>
                                            </div>
                                        @else
                                            <h3>{{ $req->proposal_CVP }}</h3>
                                        @endif
                                    @endif
                                </a>           
                            </div>
                            <div>
                                <a href="{{ route('pdf', $req->proposal_SDRPM) }}" target="_blank" class="m-1">
                                    @if ($req->proposal_SDRPM_status == 'approved')
                                        <h3 class="bg-success">{{ $req->proposal_SDRPM }}</h3>   
                                        <p>Requirement Approved</p>
                                    @else
                                        @if ($req->proposal_SDRPM_status == 'declined')
                                            <h3 class="bg-danger">{{ $req->proposal_SDRPM }}</h3>
                                            <div>
                                                <h3>REMARKS HERE</h3>
                                            </div>
                                        @else
                                            <h3>{{ $req->proposal_SDRPM }}</h3>
                                        @endif
                                    @endif
                                </a>
                            </div>
                            <div>
                                <a href="{{ route('pdf', $req->proposal_CERT) }}" target="_blank" class="m-1">
                                    @if ($req->proposal_CERT_status == 'approved')
                                        <h3 class="bg-success">{{ $req->proposal_CERT }}</h3> 
                                        <p>Requirement Approved</p>  
                                    @else
                                        @if ($req->proposal_CERT_status == 'declined')
                                            <h3 class="bg-danger">{{ $req->proposal_CERT }}</h3>
                                            <div>
                                                <h3>REMARKS HERE</h3>
                                            </div>
                                        @else
                                            <h3>{{ $req->proposal_CERT }}</h3>
                                        @endif
                                    @endif
                                </a>
                            </div>
                            <div>
                                <a href="{{ route('pdf', $req->proposal_WP) }}" target="_blank" class="m-1">
                                    @if ($req->proposal_WP_status == 'approved')
                                        <h3 class="bg-success">{{ $req->proposal_WP }}</h3> 
                                    <p>Requirement Approved</p>  
                                @else
                                    @if ($req->proposal_WP_status == 'declined')
                                        <h3 class="bg-danger">{{ $req->proposal_WP }}</h3>
                                        <div>
                                            <h3>REMARKS HERE</h3>
                                        </div>
                                    @else
                                        <h3>{{ $req->proposal_WP }}</h3>
                                    @endif
                                @endif
                                </a>
                            </div>
                                @if ($proposal->proposal_status == 'revision')
                                    <a href="{{ route('proposal-update', $proposal->id) }}">Update Proposal</a>
                                @else

                                @endif
                            @endforeach
                        </div>
                    </div> 
                @endif
          @else
              @if ($user->user_type === 'rio')
                @if ($proposal)
                    <div class="">
                        <form action="" method="POST">
                            @csrf
                            <h2>PROJECT TITLE</h2>
                            <p>{{ $proposal->proposal_title }}</p>
                            <h2>PROJECT LEADER</h2>
                            <p>{{ $proposal->proposal_leader }}</p>

                            <h2>PROPOSAL MEMBERS</h2>
                            @foreach ($members as $member)
                                {{ $member->faculty_fullname }}
                            @endforeach
                            <h2>PROPOSAL PARTNERS</h2>
                            @foreach ($partners as $partner)
                                {{ $partner->partner_name }}
                            @endforeach
                        </form>

                        <div>
                            @csrf
                            @foreach ($reqs as $req)
                                <div>
                                    <a href="{{ route('pdf', $req->proposal_CRP) }}" target="" class="m-1">
                                        @if ($req->proposal_CRP_status == 'approved')
                                            <h3 class="bg-success">{{ $req->proposal_CRP }}</h3>   
                                        @else
                                            @if ($req->proposal_CRP_status == 'declined')
                                                <h3 class="bg-danger">{{ $req->proposal_CRP }}</h3>
                                            @else
                                                <h3>{{ $req->proposal_CRP }}</h3>
                                            @endif
                                        @endif
                                    </a>
                                    <form action="{{ route('approve-CRP', $proposal->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" value="approved" name="proposal_CRP_status">
                                        <button type="submit">Approve</button>        
                                    </form>
                                    <form action="{{ route('decline-CRP', $proposal->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" value="declined" name="proposal_CRP_status">
                                        @error('remarks_CRP')
                                            <p class="bg-danger">{{ $message }}</p>
                                        @enderror
                                        <textarea placeholder="Remarks" name="remarks_CRP"></textarea>
                                        <button type="submit">Decline</button>
                                    </form>
                                </div>
                                <div>
                                    <a href="{{ route('pdf', $req->proposal_LIB) }}" target="" class="m-1">
                                        @if ($req->proposal_LIB_status == 'approved')
                                            <h3 class="bg-success">{{ $req->proposal_LIB }}</h3>   
                                        @else
                                            @if ($req->proposal_LIB_status == 'declined')
                                            <h3 class="bg-danger">{{ $req->proposal_LIB }}</h3>
                                            @else
                                            <h3>{{ $req->proposal_LIB }}</h3>
                                            @endif
                                        @endif
                                    </a>
                                    <form action="{{ route('approve-LIB', $proposal->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" value="approved" name="proposal_LIB_status">
                                        <button type="submit">Approve</button>        
                                    </form>
                                    <form action="{{ route('decline-LIB', $proposal->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" value="declined" name="proposal_LIB_status">
                                        @error('remarks_LIB')
                                            <p class="bg-danger">{{ $message }}</p>
                                        @enderror
                                        <textarea placeholder="Remarks" name="remarks_LIB"></textarea>
                                        <button type="submit">Decline</button>
                                    </form>
                                </div>
                                <div>
                                    <a href="{{ route('pdf', $req->proposal_CVP) }}" target="" class="m-1">
                                        @if ($req->proposal_CVP_status == 'approved')
                                            <h3 class="bg-success">{{ $req->proposal_CVP }}</h3>   
                                        @else
                                            @if ($req->proposal_CVP_status == 'declined')
                                                <h3 class="bg-danger">{{ $req->proposal_CVP }}</h3>
                                            @else
                                                <h3>{{ $req->proposal_CVP }}</h3>
                                            @endif
                                        @endif
                                    </a>
                                    <form action="{{ route('approve-CVP', $proposal->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" value="approved" name="proposal_CVP_status">
                                        <button type="submit">Approve</button>        
                                    </form>
                                    <form action="{{ route('decline-CVP', $proposal->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" value="declined" name="proposal_CVP_status">
                                        @error('remarks_CVP')
                                            <p class="bg-danger">{{ $message }}</p>
                                        @enderror
                                        <textarea placeholder="Remarks" name="remarks_CVP"></textarea>
                                        <button type="submit">Decline</button>
                                    </form>
                                </div>
                                <div>
                                    <a href="{{ route('pdf', $req->proposal_SDRPM) }}" target="" class="m-1">
                                        @if ($req->proposal_SDRPM_status == 'approved')
                                        <h3 class="bg-success">{{ $req->proposal_SDRPM }}</h3>   
                                    @else
                                        @if ($req->proposal_SDRPM_status == 'declined')
                                        <h3 class="bg-danger">{{ $req->proposal_SDRPM }}</h3>
                                        @else
                                        <h3>{{ $req->proposal_SDRPM }}</h3>
                                        @endif
                                    @endif
                                    </a>
                                    <form action="{{ route('approve-SDRPM', $proposal->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" value="approved" name="proposal_SDRPM_status">
                                        <button type="submit">Approve</button>        
                                    </form>
                                    <form action="{{ route('decline-SDRPM', $proposal->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" value="declined" name="proposal_SDRPM_status">
                                        @error('remarks_SDRPM')
                                            <p class="bg-danger">{{ $message }}</p>
                                        @enderror
                                        <textarea placeholder="Remarks" name="remarks_SDRPM"></textarea>
                                        <button type="submit">Decline</button>
                                    </form>
                                </div>
                                <div>
                                    <a href="{{ route('pdf', $req->proposal_CERT) }}" target="" class="m-1">
                                        @if ($req->proposal_CERT_status == 'approved')
                                        <h3 class="bg-success">{{ $req->proposal_CERT }}</h3>   
                                    @else
                                        @if ($req->proposal_CERT_status == 'declined')
                                        <h3 class="bg-danger">{{ $req->proposal_CERT }}</h3>
                                        @else
                                        <h3>{{ $req->proposal_CERT }}</h3>
                                        @endif
                                    @endif
                                    </a>
                                    <form action="{{ route('approve-CERT', $proposal->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" value="approved" name="proposal_CERT_status">
                                        <button type="submit">Approve</button>        
                                    </form>
                                    <form action="{{ route('decline-CERT', $proposal->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" value="declined" name="proposal_CERT_status">
                                        @error('remarks_CERT')
                                            <p class="bg-danger">{{ $message }}</p>
                                        @enderror
                                        <textarea placeholder="Remarks" name="remarks_CERT"></textarea>
                                        <button type="submit">Decline</button>
                                    </form>
                                </div>
                                <div>
                                    <a href="{{ route('pdf', $req->proposal_WP) }}" target="" class="m-1">
                                        @if ($req->proposal_WP_status == 'approved')
                                        <h3 class="bg-success">{{ $req->proposal_WP }}</h3>   
                                    @else
                                        @if ($req->proposal_WP_status == 'declined')
                                        <h3 class="bg-danger">{{ $req->proposal_WP }}</h3>
                                        @else
                                        <h3>{{ $req->proposal_WP }}</h3>
                                        @endif
                                    @endif
                                    </a>
                                    <form action="{{ route('approve-WP', $proposal->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" value="approved" name="proposal_WP_status">
                                        <button type="submit">Approve</button>        
                                    </form>
                                    <form action="{{ route('decline-WP', $proposal->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" value="declined" name="proposal_WP_status">
                                        @error('remarks_WP')
                                            <p class="bg-danger">{{ $message }}</p>
                                        @enderror
                                        <textarea placeholder="Remarks" name="remarks_WP"></textarea>
                                        <button type="submit">Decline</button>
                                    </form>

                                    <a href="{{ route('dashboard') }}">Go to Dashboard</a>
                                    @if ($req->proposal_CRP_status == 'declined' || $req->proposal_LIB_status == 'declined' ||
                                        $req->proposal_CVP_status == 'declined' || $req->proposal_SDRPM_status == 'declined' || 
                                        $req->proposal_CERT_status == 'declined' || $req->proposal_WP_status == 'declined' || $endorsement == null) 
                                        
                                        <form action="{{ route('status', $proposal->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="proposal_status" value="revision">
                                            <button type="submit">For Revision</button>
                                        </form>
                                    @else
                                        <form action="{{ route('status', $proposal->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="proposal_status" value="rmo">
                                            <button type="submit">For RMO Evaluation</button>
                                        </form>
                                    @endif
                                </div>
                                @if ($endorsement)
                                    ENDORSED
                                @endif
                                @error('proposal_endorsement')
                                    <div class="text-warning-plain">
                                        {{$message}}
                                    </div>
                                @enderror
                                <form action="{{ route('proposal', $proposal->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input class="block" type="file" accept=".pdf" name="proposal_endorsement">
                                    <label for="proposal_endorsement">Chancellor Endorsement</label>
                                    <button type="submit">Add Endorsement</button>
                                </form>
                            @endforeach
                        </div>
                    </div> 
                @endif
              @else
                @if ($proposal)
                <div class="">
                    <form action="" method="POST">
                        @csrf
                        <h2>PROJECT TITLE</h2>
                        <p>{{ $proposal->proposal_title }}</p>
                        <h2>PROJECT LEADER</h2>
                        <p>{{ $proposal->proposal_leader }}</p>

                        <h2>PROPOSAL MEMBERS</h2>
                        @foreach ($members as $member)
                            {{ $member->faculty_fullname }}
                        @endforeach
                        <h2>PROPOSAL PARTNERS</h2>
                        @foreach ($partners as $partner)
                            {{ $partner->partner_name }}
                        @endforeach
                    </form>

                    <div>
                        @csrf
                        @foreach ($reqs as $req)
                            <div>
                                {{-- , $req->proposal_CRP --}}
                                <a href="{{ route('pdf', $req->proposal_CRP) }}" target="" class="m-1">
                                    @if ($req->proposal_CRP_status == 'approved')
                                        <h3 class="bg-success">{{ $req->proposal_CRP }}</h3>   
                                    @else
                                        @if ($req->proposal_CRP_status == 'declined')
                                            <h3 class="bg-danger">{{ $req->proposal_CRP }}</h3>
                                        @else
                                            <h3>{{ $req->proposal_CRP }}</h3>
                                        @endif
                                    @endif
                                </a>
                                <form action="{{ route('approve-CRP', $proposal->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" value="approved" name="proposal_CRP_status">
                                    <button type="submit">Approve</button>        
                                </form>
                                <form action="{{ route('decline-CRP', $proposal->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" value="declined" name="proposal_CRP_status">
                                    @error('remarks_CRP')
                                        <p class="bg-danger">{{ $message }}</p>
                                    @enderror
                                    <textarea placeholder="Remarks" name="remarks_CRP"></textarea>
                                    <button type="submit">Decline</button>
                                </form>
                            </div>
                            <div>
                                <a href="{{ route('pdf', $req->proposal_LIB) }}" target="_blank" class="m-1">
                                    @if ($req->proposal_LIB_status == 'approved')
                                        <h3 class="bg-success">{{ $req->proposal_LIB }}</h3>   
                                    @else
                                        @if ($req->proposal_LIB_status == 'declined')
                                        <h3 class="bg-danger">{{ $req->proposal_LIB }}</h3>
                                        @else
                                        <h3>{{ $req->proposal_LIB }}</h3>
                                        @endif
                                    @endif
                                </a>
                                <form action="{{ route('approve-LIB', $proposal->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" value="approved" name="proposal_LIB_status">
                                    <button type="submit">Approve</button>        
                                </form>
                                <form action="{{ route('decline-LIB', $proposal->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" value="declined" name="proposal_LIB_status">
                                    @error('remarks_LIB')
                                        <p class="bg-danger">{{ $message }}</p>
                                    @enderror
                                    <textarea placeholder="Remarks" name="remarks_LIB"></textarea>
                                    <button type="submit">Decline</button>
                                </form>
                            </div>
                            <div>
                                <a href="{{ route('pdf', $req->proposal_CVP) }}" target="_blank" class="m-1">
                                    @if ($req->proposal_CVP_status == 'approved')
                                        <h3 class="bg-success">{{ $req->proposal_CVP }}</h3>   
                                    @else
                                        @if ($req->proposal_CVP_status == 'declined')
                                            <h3 class="bg-danger">{{ $req->proposal_CVP }}</h3>
                                        @else
                                            <h3>{{ $req->proposal_CVP }}</h3>
                                        @endif
                                    @endif
                                </a>
                                <form action="{{ route('approve-CVP', $proposal->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" value="approved" name="proposal_CVP_status">
                                    <button type="submit">Approve</button>        
                                </form>
                                <form action="{{ route('decline-CVP', $proposal->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" value="declined" name="proposal_CVP_status">
                                    @error('remarks_CVP')
                                        <p class="bg-danger">{{ $message }}</p>
                                    @enderror
                                    <textarea placeholder="Remarks" name="remarks_CVP"></textarea>
                                    <button type="submit">Decline</button>
                                </form>
                            </div>
                            <div>
                                <a href="{{ route('pdf', $req->proposal_SDRPM) }}" target="_blank" class="m-1">
                                    @if ($req->proposal_SDRPM_status == 'approved')
                                    <h3 class="bg-success">{{ $req->proposal_SDRPM }}</h3>   
                                @else
                                    @if ($req->proposal_SDRPM_status == 'declined')
                                    <h3 class="bg-danger">{{ $req->proposal_SDRPM }}</h3>
                                    @else
                                    <h3>{{ $req->proposal_SDRPM }}</h3>
                                    @endif
                                @endif
                                </a>
                                <form action="{{ route('approve-SDRPM', $proposal->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" value="approved" name="proposal_SDRPM_status">
                                    <button type="submit">Approve</button>        
                                </form>
                                <form action="{{ route('decline-SDRPM', $proposal->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" value="declined" name="proposal_SDRPM_status">
                                    @error('remarks_SDRPM')
                                        <p class="bg-danger">{{ $message }}</p>
                                    @enderror
                                    <textarea placeholder="Remarks" name="remarks_SDRPM"></textarea>
                                    <button type="submit">Decline</button>
                                </form>
                            </div>
                            <div>
                                <a href="{{ route('pdf', $req->proposal_CERT) }}" target="_blank" class="m-1">
                                    @if ($req->proposal_CERT_status == 'approved')
                                    <h3 class="bg-success">{{ $req->proposal_CERT }}</h3>   
                                @else
                                    @if ($req->proposal_CERT_status == 'declined')
                                    <h3 class="bg-danger">{{ $req->proposal_CERT }}</h3>
                                    @else
                                    <h3>{{ $req->proposal_CERT }}</h3>
                                    @endif
                                @endif
                                </a>
                                <form action="{{ route('approve-CERT', $proposal->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" value="approved" name="proposal_CERT_status">
                                    <button type="submit">Approve</button>        
                                </form>
                                <form action="{{ route('decline-CERT', $proposal->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" value="declined" name="proposal_CERT_status">
                                    @error('remarks_CERT')
                                        <p class="bg-danger">{{ $message }}</p>
                                    @enderror
                                    <textarea placeholder="Remarks" name="remarks_CERT"></textarea>
                                    <button type="submit">Decline</button>
                                </form>
                            </div>
                            <div>
                                <a href="{{ route('pdf', $req->proposal_WP) }}" target="_blank" class="m-1">
                                    @if ($req->proposal_WP_status == 'approved')
                                        <h3 class="bg-success">{{ $req->proposal_WP }}</h3>   
                                    @else
                                        @if ($req->proposal_WP_status == 'declined')
                                            <h3 class="bg-danger">{{ $req->proposal_WP }}</h3>
                                        @else
                                            <h3>{{ $req->proposal_WP }}</h3>
                                        @endif
                                    @endif
                                    </a>
                                    <form action="{{ route('approve-WP', $proposal->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" value="approved" name="proposal_WP_status">
                                        <button type="submit">Approve</button>        
                                    </form>
                                    <form action="{{ route('decline-WP', $proposal->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" value="declined" name="proposal_WP_status">
                                        @error('remarks_WP')
                                            <p class="bg-danger">{{ $message }}</p>
                                        @enderror
                                        <textarea placeholder="Remarks" name="remarks_WP"></textarea>
                                        <button type="submit">Decline</button>
                                    </form>

                                    <a href="{{ route('dashboard') }}">Go to Dashboard</a>
                                    @if ($req->proposal_CRP_status == 'declined' || $req->proposal_LIB_status == 'declined' ||
                                        $req->proposal_CVP_status == 'declined' || $req->proposal_SDRPM_status == 'declined' || 
                                        $req->proposal_CERT_status == 'declined' || $req->proposal_WP_status == 'declined')
                                        
                                        <form action="{{ route('status', $proposal->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="proposal_status" value="non-compliant">
                                            <button type="submit">Non-Compliant</button>
                                        </form>
                                    @else
                                        <form action="{{ route('status', $proposal->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="proposal_status" value="compliant">
                                            <button type="submit">Compliant</button>
                                        </form>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div> 
            @endif
                @endif
            @endif
        </div>
    </div>
  </section>
@endsection