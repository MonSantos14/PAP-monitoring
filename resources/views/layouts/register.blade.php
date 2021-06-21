@extends('index')

@section('content')
    <div class="container center-row">
        <div class="log-in">
        <h2 class="text-title">Sign Up</h2>

        @if(session('status'))
            <div class="text-warning">
                {{ session('status') }}
            </div>
        @endif
        <form action="{{ route('register') }}" class="form" method="post">
            @csrf
            @error('name')
                <div class="text-warning-plain">
                    {{$message}}
                </div>
            @enderror
            <div class="form-control">
                <input
                    class="input"
                    type="text"
                    name="name"
                    id="name"
                    onkeyup="this.setAttribute('value', this.value);"
                    value="{{ old('name')}}"
                />
                <label class="label" for="name">Name</label>
            </div>
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
            @error('is_admin')
                <div class="text-warning-plain">
                    {{$message}}
                </div>
            @enderror
            <div class="form-control">
                <input
                    class="input"
                    type="text"
                    name="user_type"
                    id="user_type"
                    onkeyup="this.setAttribute('value', this.value);"
                    value=""
                />
                <label class="label" for="user_type">Enter user type</label>
            </div>
            @error('password')
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
            <div class="form-control">
                <input
                    class="input"
                    type="password"
                    name="password_confirmation"
                    id="password_confirmation"
                    onkeyup="this.setAttribute('value', this.value);"
                    value=""
                />
                <label class="label" for="password_confirmation">Confirm Password</label>
            </div>
            <button class="btn btn-sign" type="submit">Register</button>
        </form>
        </div>
    </div>
@endsection