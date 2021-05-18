<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/fe0adfa825.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <title>PAP's-Monitoring System</title>
</head>
<body>
    <div class="navbar center-row">
        <div>
            <ul>
                <h2>RDE</h2>
                <li>
                    <a href="{{ route('home') }}">Home</a>
                </li>
                <li>
                    <a href="{{ route('dashboard') }}">Dashboard</a>
                </li>
                <li>
                    <a href="{{ route('draft') }}">Drafts</a>
                </li>
            </ul>
        </div>
        <ul>
            @auth
                <li><a href="">{{ auth()->user()->name }}</a></li>
                <li>
                    <form action="{{ route('logout') }}" method="post" class="inline">
                        @csrf
                        <button type="submit" class="btn-link">Logout</button>
                    </form>    
                </li>
            @endauth

            @guest
                <li><a href="{{ route('login') }}">Login</a></li>
            @endguest
        </ul>
    </div>
    @yield('content')
</body>
</html>