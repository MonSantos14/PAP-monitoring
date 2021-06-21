<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/fe0adfa825.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <title>PAP's-Monitoring System</title>
    <meta name="csrf-token" content="{{ csrf_token() }}"> 
</head>
<body>
    <div class="navbar center-row">
        <div>
            <ul>
                <h2>RDE</h2>
                @auth
                    @if ( auth()->user()->user_type === "college")
                    <li>
                        <a href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                    <li>
                        <a href="{{ route('draft') }}">Drafts</a>
                    </li>  
                    @else
                        @if ( auth()->user()->user_type === "rio" )
                            <li>
                                <a href="{{ route('dashboard') }}">Dashboard</a>
                            </li>
                        @else
                            <li>
                                <a href="{{ route('dashboard') }}">Dashboard</a>
                            </li>
                            <li>
                                <a href="{{ route('draft') }}">Partners</a>
                            </li> 
                        @endif
                    @endif
                @endauth
                
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

{{-- <script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#Search').on('keyup', function(){
        $memberSearch = $(this).val();
        
        if($memberSearch == '') {
            $('#Result').html('');
            $('#Result').hide('');
        } else {
            $.ajax({
                method:"post",
                url:'create-proposal-2',
                data:JSON.stringify({
                    memberSearch:$memberSearch
                }),
                headers:{
                    'Accept':'application/json',
                    'Content-Type':'application/json'
                },
                success: function(data){
                    var searchResult ='';
                    data = JSON.parse(data);
                    console.log(data);
                    $('#memberResult').show();
                    for(let i=0; i<data.length; i++) {
                        searchResult +=`
                            <div class="faculty-item center-row justify-between width-2 border-curve m-1 p-1">
                                <div class="left">
                                    <h2 class="text-s">`+data[i].faculty_fullname+`</h2>
                                    <p class="text-s"><i class="fa fa-id-card-o"></i>`+data[i].faculty_id+`</p>
                                    <p class="text-s">
                                        <i class="fa fa-envelope"></i> `+data[i].faculty_email+`
                                    </p>
                                </div>
                                <div class="right flex">
                                    <form action="" method="post">
                                        <input type="text" value=""/>
                                        <button type="submit" class="bg-none">
                                            <i class="fa fa-plus-circle fa-2x blue-text"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        `
                    }
                    $('#memberResult').html(searchResult);
                }
            });
        }
    });
</script> --}}