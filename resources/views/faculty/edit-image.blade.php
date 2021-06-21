@extends('index')

@section('content')
<section class="section-A">
    <div class="contain">
      <div class="buttons">
        <a class="btn btn-default" href="{{ route('dashboard') }}" class="btn">Go Back</a>
      </div>

      <div class="grid-2">
        <div class="faculty-form">
          <h2 class="text-xl px-1">
            <span class="text-primary blue-text">Edit</span> Faculty
          </h2>
          @error('faculty_image')
                <div class="text-warning-plain">
                    {{$message}}
                </div>
          @enderror
          <div class="flex relative">
            <form class="" action="{{ route('edit-image', $faculty->id)}}" method="post">
                @csrf
                @method('PUT')
              <div class="center-column">
                <img class="width-2 border-blue" src="{{ asset('images/'.$faculty->faculty_image) }}" alt="">
                <input type="file" class="width-2" name="faculty_image">
              </div>
              <button class="btn blue blue-bg text-light ">
                Save Changes
              </button>
            </form>
          </div>

          <form action="{{ route('edit-faculty', $faculty->id) }}" method="post"  enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            @error('faculty_id')
            <div class="text-warning-plain">
                    {{$message}}
                  </div>
                  @enderror
                  <div class="form-control">
                    <input
                    class="input blue-border"
                    type="text"
                    name="faculty_id"
                    onkeyup="this.setAttribute('value', this.value);"
                    value="{{ $faculty->faculty_id }}"
                    />
                    <label class="label blue-text" for="">Faculty ID no.</label>
                  </div>
                  @error('faculty_email')
                  <div class="text-warning-plain">
                    {{$message}}
                  </div>
            @enderror
            <div class="form-control">
              <input
              class="input blue-border"
              type="email"
              name="faculty_email"
              onkeyup="this.setAttribute('value', this.value);"
              value="{{ $faculty->faculty_email }}"
              />
              <label class="label blue-text" for="">Email Address</label>
            </div>
            @error('faculty_lastname')
            <div class="text-warning-plain">
              {{$message}}
            </div>
            @enderror
            <div class="form-control">
              <input
              class="input blue-border"
              type="text"
              name="faculty_lastname"
              onkeyup="this.setAttribute('value', this.value);"
              value="{{ $faculty->faculty_lastname }}"
              />
              <label class="label blue-text" for="">Last Name</label>
          </div>
          @error('faculty_firstname')
          <div class="text-warning-plain">
            {{$message}}
          </div>
          @enderror
          <div class="form-control">
            <input
            class="input blue-border"
            type="text"
            name="faculty_firstname"
            onkeyup="this.setAttribute('value', this.value);"
            value="{{ $faculty->faculty_firstname }}"
            />
            <label class="label blue-text" for="">First Name</label>
          </div>
          {{-- <button class="btn btn-secondary blue blue-bg" type="submit">Save Changes</button> --}}
        </form>
      </div>
        
        
        <div class="faculty">
          <form class="faculty-search" action="{{ route('faculty') }}" method="get">
            @csrf
            <input
              class="search-block"
              type="text"
              name="search"
              placeholder="Search faculty..."
              value=""
            />
            <button class="btn btn-search">Search</button>
          </form>
          <ul class="faculty-collection">
            @foreach ($faculties as $faculty)
            
            <div class="justify-between">
              <img class="width-120 border-curve" src="{{ asset('images/'.$faculty->faculty_image) }}" alt="">
              <li class="faculty-item center-row">
                <div class="left">
                  <h2 class="text-m">{{ $faculty->faculty_firstname }} {{ $faculty->faculty_lastname }}</h2>
                  <h2 class="text-s">{{ $faculty->user->name }}</h2>
                  <p class="text-s"><i class="fa fa-id-card-o"></i> {{ $faculty->faculty_id }}</p>
                  <p class="text-s">
                    <i class="fa fa-envelope"></i> {{ $faculty->faculty_email }}
                  </p>
                </div>
                <div class="right flex">
                  <form action="{{ route('edit-faculty', $faculty->id) }}" method="get">
                    <button class="btn-small blue">
                      <i class="fa fa-pencil-square-o"></i>
                    </button>
                  </form>
                  <button class="btn-small danger">
                    <i class="fa fa-trash"></i>
                  </button>
                </div>
              </li>
            </div>
            @endforeach
            
          </ul>
        </div>
      </div>
    </div>
  </section>

  
@endsection 