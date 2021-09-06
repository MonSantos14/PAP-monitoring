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
                        <div>
                            <input class="block" type="file" name="proposal_CRP">
                            <input class="block" type="file" name="proposal_LIB">
                            <input class="block" type="file" name="proposal_CVP">
                            <input class="block" type="file" name="proposal_SDRPM">
                            <input class="block" type="file" name="proposal_CERTIFICATION">
                            <input class="block" type="file" name="proposal_WP">
                        </div>
                        <button type="submit" class="p-1">Save</button>
                    </form>
                </div>

                <h2 class="text-xl px-1">
                    <span class="text-primary">Proposal</span> Leader
                </h2>
                <form action="{{ route('add-leader-ui', $data->id) }}" method="get">
                    <input type="text" name="search">
                    <button type="submit">Search</button>
                    <a href="{{ route('draft-proposal',$data->id) }}" class="btn">Done</a>
                </form>

                <div class="width-3">
                    @if ($search)
                        @foreach ($faculties as $faculty)
                            <div class="faculty-item center-row justify-between width-2 border-curve m-1 p-1">
                                
                                <div >
                                    <form class="right flex" action="{{ route('add-leader-ui', $data->id) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <div class="left">
                                            <h2>{{ $faculty->faculty_fullname }}</h2>
                                            <h3>{{ $faculty->faculty_id }}</h3>
                                            <p>{{ $faculty->faculty_email }}</p>
                                            <input type="hidden" name="faculty_fullname" value="{{ $faculty->faculty_fullname }}">
                                        </div>
                                        <button type="submit" class="bg-none">  
                                            <i class="fa fa-plus-circle fa-2x blue-text"></i>
                                        </button>
                                    </form>
                                </div> 
                            </div>
                        @endforeach
                    @else
                        Add Leader
                    @endif
                </div>

                <div>
                    <h2 class="text-xl px-1">
                        <span class="text-primary">Proposal</span> Members
                    </h2>
                </div>

                <div>
                    @if ($members) 
                        @foreach ($members as $member)
                            <div>
                                {{ $member->faculty_fullname }}
                            </div>
                        @endforeach
                    @endif
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
                                {{ $partner->name }}
                            </div>
                        @endforeach
                    @endif
                </div>
            @endforeach
        </div>
    </section>
@endsection