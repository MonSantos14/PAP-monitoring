@extends('index')

@section('content')
    <section class="section-A">
        <div class="proposal height-fit">
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
                            <input type="file" name="" id="">
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
                            <input type="file" name="" id="">
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
                            <input type="file" name="" id="">
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
                            <input type="file" name="" id="">
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
                            <input type="file" name="" id="">
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
                            <input type="file" name="" id="">
                        </div>
                            @if ($proposal->proposal_status == 'revision')
                                <form action="" method="POST">
                                    <input type="hidden" value="" name="proposal_status">
                                    <button type="submit">Save Changes</button>
                                </form>
                            @else

                            @endif
                        @endforeach
                    </div>
                </div> 
            @endif
        </div>
    </section>
@endsection