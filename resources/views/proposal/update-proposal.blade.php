@extends('index')

@section('content')

    <section class="section-A">`
        <div class="contain">
        <div class="buttons">
            <a class="btn btn-default" href="college.html" class="btn">Go Back</a>
        </div>

            <div class="center-column">
               <form class="width-3 self-center faculty-form" action="{{ route('add-members') }}" method="get">
                @csrf
                <h2 class="text-xl px-1">
                    <span class="text-primary">Add</span> Members
                </h2>  
                <input
                class="search-block"
                type="text"
                name="search"
                placeholder="Search for members..."
                value=""
                />
                <button class="btn btn-search">Search</button>
              </form>
            </div>

            <div class="width-3">
                @if ($search)
                    @foreach ($faculties as $faculty)
                        <div class="faculty-item center-row justify-between width-2 border-curve m-1 p-1">
                            <div class="left">
                                <h2 class="text-s">{{ $faculty->faculty_fullname }}</h2>
                                <p class="text-s"><i class="fa fa-id-card-o"></i>{{ $faculty->faculty_id }}</p>
                                <p class="text-s">
                                    <i class="fa fa-envelope"></i> {{ $faculty->faculty_email }}
                                </p>
                            </div>
                            <div class="right flex">
                                <form action="{{ route('add-member-ui', $faculty->id) }}" method="post">
                                    @csrf
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
            </div>
        </div>
  </section>
@endsection