@extends('index')

@section('content')
    <section class="section-A">
        <div class="contain">
            @foreach ($draft as $data)
                <div class="mt-3">
                    <form action="{{ route('draft-proposal', $data->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <label for="proposal_title">Proposal Title:</label>
                        <input class="p-1" type="text" name="proposal_title" value="{{ $data->proposal_title }}">
                        <label for="proposal_duration">Proposal Duration:</label>
                        <input class="p-1" type="text" name="proposal_duration" value="{{ $data->proposal_duration }}">
                        <div>
                            @error('proposal_CRP')
                                <div class="text-warning-plain">
                                    {{$message}}
                                </div>
                            @enderror
                            <input class="block" type="file" accept=".pdf" name="proposal_CRP">
                            <label for="proposal_CRP">Capsule Research Proposal</label>
                            @foreach ($reqs as $req) {{ $req->proposal_CRP }} @endforeach
                            @error('proposal_LIB')
                                <div class="text-warning-plain">
                                    {{$message}}
                                </div>
                            @enderror
                            <input class="block" type="file" accept=".pdf" name="proposal_LIB">
                            <label for="proposal_LIB">Line Item Budget</label>
                            @foreach ($reqs as $req) {{ $req->proposal_LIB }} @endforeach
                            @error('proposal_CVP')
                                <div class="text-warning-plain">
                                    {{$message}}
                                </div>
                            @enderror
                            <input class="block" type="file" accept=".pdf" name="proposal_CVP">
                            <label for="proposal_CVP">Curriculum Vitae of the Program/Project Leader</label>
                            @foreach ($reqs as $req) {{ $req->proposal_CVP }} @endforeach
                            @error('proposal_SDRPM')
                                <div class="text-warning-plain">
                                    {{$message}}
                                </div>
                            @enderror
                            <input class="block" type="file" accept=".pdf" name="proposal_SDRPM">
                            <label for="proposal_SDRPM">Curriculum Vitae of the Program/Project Leader</label>
                            @foreach ($reqs as $req) {{ $req->proposal_SDRPM }} @endforeach
                            @error('proposal_CERT')
                                <div class="text-warning-plain">
                                    {{$message}}
                                </div>
                            @enderror
                            <input class="block" type="file" accept=".pdf" name="proposal_CERT">
                            <label for="proposal_CERT">Certification</label>
                            @foreach ($reqs as $req) {{ $req->proposal_CERT }} @endforeach
                            @error('proposal_WP')
                                <div class="text-warning-plain">
                                    {{$message}}
                                </div>
                            @enderror
                            <input class="block" type="file" accept=".pdf" name="proposal_WP">
                            <label for="proposal_WP">Work Plan</label>
                            @foreach ($reqs as $req) {{ $req->proposal_WP }} @endforeach
                            
                        </div>
                        <button type="submit" class="p-1">Save</button>
                    </form>
                </div>

                <div>
                    <h2 class="text-xl px-1">
                        <span class="text-primary">Project</span> Leader
                    </h2>
                    @if ($data->proposal_leader)
                       <div>{{ $data->proposal_leader }}</div> 
                       <a class="btn border-blue" href="{{ route('add-leader-ui', $data->id) }}"> Update Project Leader</a>
                    @else
                        <a href="{{ route('add-leader-ui', $data->id) }}"><i class="fa fa-plus-circle"></i> Add Project Leader</a>
                    @endif
                </div>

                <div>
                    <h2 class="text-xl px-1">
                        <span class="text-primary">Proposal</span> Members
                    </h2>
                    <a href="{{ route('add-member-ui', $data->id) }}"><i class="fa fa-plus-circle"></i> Add Member</a>
                </div>

                <div>
                    @if ($members) 
                        @foreach ($members as $member)
                        <div>
                            {{ $member->faculty_fullname }}
                            {{ $member->faculty_college }}
                            <form action="" method="delete">
                                <button>DELETE</button>
                            </form>
                        </div>
                        @endforeach
                    @endif
                </div>

                <div>
                    <h2 class="text-xl px-1">
                        <span class="text-primary">Proposal</span> Partners
                    </h2>
                    <a href="{{ route('add-partner-ui', $data->id) }}"><i class="fa fa-plus-circle"></i> Add Partner</a>
                </div>

                <div>
                    @if ($partners) 
                        @foreach ($partners as $partner)
                        <div>
                            {{ $partner->partner_name }}
                            <form action="" method="delete">
                                <button>DELETE</button>
                            </form>
                        </div>
                        @endforeach
                    @endif
                </div>
                
                <div>
                    <a class='border-blue' href="{{ route('draft') }}">Go to Draft</a>
                    <form action="{{ route('draft-proposal',$data->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit">Send to RIO</button>
                    </form>
                </div>
            @endforeach
        </div>
    </section>
@endsection