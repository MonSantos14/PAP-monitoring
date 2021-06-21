@extends('index')

@section('content')
    <section class="section-A">
        <div class="contain">
            @foreach ($draft as $data)
            <div class="mt-3">
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <label for="proposal_title">Proposal Title:</label>
                    <input class="p-1" type="text" name="proposal_title" value="{{ $data->proposal_title }}">
                    <label for="proposal_duration">Proposal Duration:</label>
                    <input class="p-1" type="text" name="proposal_duration" value="{{ $data->proposal_duration }}">
                    <label for="proposal_leader">Proposal Leader:</label>
                    <input class="p-1" type="text" name="proposal_leader" value="{{ $data->proposal_leader }}">
                    <div>
                        <input class="block" type="file" name="proposal_CRP">
                        <label for="proposal_CRP">Capsule Research Proposal</label>
                        <input class="block" type="file" name="proposal_LIB">
                        <label for="proposal_LIB">Line Item Budget</label>
                        <input class="block" type="file" name="proposal_CVP">
                        <label for="proposal_CVP">Curriculum Vitae of the Program/Project Leader</label>
                        <input class="block" type="file" name="proposal_SDRPM">
                        <label for="proposal_SDRPM">Curriculum Vitae of the Program/Project Leader</label>
                        <input class="block" type="file" name="proposal_CERT">
                        <label for="proposal_CERT">Certification</label>
                        <input class="block" type="file" name="proposal_WP">
                        <label for="proposal_WP">Work Plan</label>
                    </div>
                    <button type="submit" class="p-1">Save</button>
                </form>
            </div>

                <div>
                    <h2 class="text-xl px-1">
                        <span class="text-primary">Proposal</span> Members
                    </h2>
                    <form action="{{ route('add-member-ui', $data->id) }}" method="get">
                        <input type="text" name="search">
                        <button type="submit">Search</button>
                        <a href="{{ route('draft-proposal',$data->id) }}" class="btn">Done</a>
                    </form>

                    <div class="width-3">
                        @if ($search)
                            @foreach ($faculties as $faculty)
                                <div class="faculty-item center-row justify-between width-2 border-curve m-1 p-1">
                                    
                                    <div >
                                        <form class="right flex" action="{{ route('add-member-ui', $data->id) }}" method="post">
                                            @csrf
                                            <div class="left">
                                                <h2>{{ $faculty->faculty_fullname }}</h2>
                                                <h3>{{ $faculty->faculty_id }}</h3>
                                                <p>{{ $faculty->faculty_email }}</p>
                                                <input type="hidden" name="faculty_id" value="{{ $faculty->id }}">
                                                <input type="hidden" name="proposal_id" value="{{ $data->id }}">
                                                <input type="hidden" name="faculty_fullname" value="{{ $faculty->faculty_fullname }}">
                                                <input type="hidden" name="faculty_college" value="{{ $user->name }}">
                                            </div>
                                            <button type="submit" class="bg-none">  
                                            <i class="fa fa-plus-circle fa-2x blue-text"></i>
                                            </button>
                                        </form>
                                    </div> 
                                </div>
                            @endforeach
                        @else
                            Add Members
                        @endif

                        <div>
                            @if ($members)
                                @foreach ($members as $member)
                                    <div>
                                        {{ $member->faculty_fullname }}
                                        {{ $member->faculty_college }}
                                    </div>
                                    <form action="" method="delete">
                                        <button>DELETE</button>
                                    </form>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>

                <div>
                    <h2 class="text-xl px-1">
                        <span class="text-primary">Proposal</span> Partners
                    </h2>
                </div>

                <div>
                    @if ($partners) 
                        @foreach ($partners as $partner)
                        <div>
                            {{ $partner->partner_name }}
                        </div>
                        @endforeach
                    @endif
                </div>
            @endforeach
        </div>
    </section>
@endsection