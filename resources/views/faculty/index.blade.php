@extends('index')

@section('content')
<section class="section-A">
    <div class="contain">
      <div class="buttons">
        <a class="btn btn-default" href="{{ route('dashboard') }}" class="btn">Go Back</a>
      </div>

      <div class="grid-2">
        <form action="{{ route('faculty') }}" method="post" class="faculty-form" enctype="multipart/form-data">
          @csrf
          <h2 class="text-xl px-1">
            <span class="text-primary">Add</span> Faculty
          </h2>
          @error('fie_input')
                <div class="text-warning-plain">
                    {{$message}}
                </div>
          @enderror
          <div class="form-control">
            <input 
            type="file"
            name="faculty_image"
            id="file-input"
            >
            
          </div>
          @error('faculty_id')
                <div class="text-warning-plain">
                    {{$message}}
                </div>
            @enderror
          <div class="form-control">
            <input
              class="input"
              type="text"
              name="faculty_id"
              id="facultyIdInput"
              onkeyup="this.setAttribute('value', this.value);"
              value=""
            />
            <label class="label" for="">Faculty ID no.</label>
          </div>
          @error('faculty_email')
                <div class="text-warning-plain">
                    {{$message}}
                </div>
            @enderror
          <div class="form-control">
            <input
              class="input"
              type="email"
              name="faculty_email"
              onkeyup="this.setAttribute('value', this.value);"
              value=""
            />
            <label class="label" for="">Email Address</label>
          </div>
          @error('faculty_lastname')
                <div class="text-warning-plain">
                    {{$message}}
                </div>
            @enderror
          <div class="form-control">
            <input
              class="input"
              type="text"
              name="faculty_lastname"
              onkeyup="this.setAttribute('value', this.value);"
              value=""
            />
            <label class="label" for="">Last Name</label>
          </div>
          @error('faculty_firstname')
                <div class="text-warning-plain">
                    {{$message}}
                </div>
            @enderror
          <div class="form-control">
            <input
              class="input"
              type="text"
              name="faculty_firstname"
              onkeyup="this.setAttribute('value', this.value);"
              value=""
            />
            <label class="label" for="">First Name</label>
          </div>
          <button class="btn btn-secondary" type="submit">Add Faculty</button>
        </form>


        <div class="faculty">
          <div class="faculty-search">
            <input
              class="search-block"
              type="text"
              placeholder="Search faculty..."
              value=""
            />
          </div>
          <ul class="faculty-collection">
            @foreach ($faculties as $faculty)
                
            <li class="faculty-item center-row">
              <div class="left">
                <h2 class="text-m">{{ $faculty->faculty_firstname }} {{ $faculty->faculty_lastname }}</h2>
                <h2 class="text-s">{{ $faculty->user->name }}</h2>
                <p class="text-s"><i class="fa fa-id-card-o"></i>{{ $faculty->faculty_id }}</p>
                <p class="text-s">
                  <i class="fa fa-envelope"></i> {{ $faculty->faculty_email }}
                </p>
              </div>
              <div class="right">
                <button class="btn-small blue">
                  <i class="fa fa-pencil-square-o"></i>
                </button>
                <button class="btn-small danger">
                  <i class="fa fa-trash"></i>
                </button>
              </div>
            </li>
            @endforeach
            
          </ul>
        </div>
      </div>
    </div>
  </section>

  
@endsection 