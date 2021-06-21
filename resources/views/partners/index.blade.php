@extends('index')

@section('content')
<section class="section-A">
    <div class="contain">
      <div class="buttons">
        <a class="btn btn-default" href="{{ route('dashboard') }}" class="btn">Go Back</a>
      </div>

      <div class="grid-2">
        <form action="{{ route('partners') }}" method="post" class="faculty-form" enctype="multipart/form-data">
          @csrf
            <h2 class="text-xl px-1">
                <span class="text-primary">Add</span> Partner
            </h2>
            @error('partner_image')
                    <div class="text-warning-plain">
                        {{$message}}
                    </div>
            @enderror
            <div class="form-control">
                <input 
                type="file"
                name="partner_image"
                id="file-input"
                >
                
            </div>
            @error('partner_email')
                    <div class="text-warning-plain">
                        {{$message}}
                    </div>
                @enderror
            <div class="form-control">
                <input
                class="input"
                type="email"
                name="partner_email"
                maxlength="11"
                onkeyup="this.setAttribute('value', this.value);"
                value=""
                />
                <label class="label" for="">Email Address</label>
            </div>
            @error('partner_number')
                    <div class="text-warning-plain">
                        {{$message}}
                    </div>
                @enderror
            <div class="form-control">
                <input
                class="input"
                type="text"
                name="partner_number"
                maxlength="11"
                onkeyup="this.setAttribute('value', this.value);"
                value=""
                />
                <label class="label" for="">Contact Number</label>
            </div>
            @error('partner_name')
                    <div class="text-warning-plain">
                        {{$message}}
                    </div>
                @enderror
            <div class="form-control">
                <input
                class="input"
                type="text"
                name="partner_name"
                onkeyup="this.setAttribute('value', this.value);"
                value=""
                />
                <label class="label" for="">Name</label>
            </div>    
            <div class="form-control">
                <input
                class="input"
                type="date"
                name="partner_expiration"
                onkeyup="this.setAttribute('value', this.value);"
                value=""
                />
                <label class="label" for="">Contract Expiration</label>
            </div>
            <button class="btn btn-secondary" type="submit">Add Partner</button>
        </form>


        <div class="faculty">
            <form class="faculty-search" action="{{ route('partners') }}" method="get">
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
                @foreach ($partners as $partner)
                
                    <div class="justify-between">
                        <img class="width-120 border-curve" src="{{ asset('images/partners/'.$partner->partner_image) }}" alt="">
                        <li class="faculty-item center-row">
                            <div class="left">
                            <h2 class="text-s">{{ $partner->partner_name }}</h2>
                            <p class="text-s"><i class="fa fa-id-card-o"></i> {{ $partner->partner_number }}</p>
                            <p class="text-s">
                                <i class="fa fa-envelope"></i> {{ $partner->partner_email }}
                            </p>
                            </div>
                            {{-- <div class="right flex">
                            <form action="{{ route('edit-faculty', $faculty->id) }}" method="get">
                                <button class="btn-small blue">
                                <i class="fa fa-pencil-square-o"></i>
                                </button>
                            </form>
                            <button class="btn-small danger">
                                <i class="fa fa-trash"></i>
                            </button>
                            </div> --}}
                        </li>
                    </div>

                @endforeach
                
            </ul>
        </div>
      </div>
    </div>
  </section>

  
@endsection 