@extends('index')

@section('content')
    <div class="container center-row">
        <div class="log-in">
        <h2 class="text-title">Sign In</h2>

        @if(session('status'))
            <div class="text-warning">
                {{ session('status') }}
            </div>
        @endif
        <form action="{{ route('login') }}" class="form" method="post">
            @csrf
            @error('email')
                <div class="text-warning-plain">
                    {{$message}}
                </div>
            @enderror
            <div class="form-control">
                <input
                    class="input"
                    type="text"
                    name="email"
                    id="email"
                    onkeyup="this.setAttribute('value', this.value);"
                    value="{{ old('email')}}"
                />
                <label class="label" for="email">Email Address</label>
            </div>
            @error('email')
                <div class="text-warning-plain">
                    {{$message}}
                </div>
            @enderror
            <div class="form-control">
                <input
                    class="input"
                    type="password"
                    name="password"
                    id="password"
                    onkeyup="this.setAttribute('value', this.value);"
                    value=""
                />
                <label class="label" for="password">Password</label>
            </div>
            <button class="btn btn-sign" type="submit">Log in</button>
        </form>
        </div>
    </div>
@endsection