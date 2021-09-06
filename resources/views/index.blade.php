<!DOCTYPE html>
<html class="no-js" lang="">
  <head>
    <meta charset="utf-8" />
    <title>RMO Monitoring System</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="shortcut icon" type="image/jpg" href="../rmo-icon.jpg" />
    <!-- Fontawesome-->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    />
    <!-- Bootstrap-->
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
      crossorigin="anonymous"
    />

    <!-- Main Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Raleway:wght@100;200;300;400;500;600;700&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap"
      rel="stylesheet"
    />
    <!--Main CSS-->
    <link rel="stylesheet" href="{{ asset('./css/main.css.map') }} "/>
    <link rel="stylesheet" href="{{ asset('./css/normalize.css') }} "/>
    <link rel="stylesheet" href="{{ asset('./css/main.css') }}" />
  </head>
<body>
    {{-- <div class="navbar center-row">
        <div>
            <ul>
                <h2>RDE</h2>
                @auth
                    @if ( auth()->user()->user_type === "college")
                    <li>
                        <a href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                    <li>
                        <a href="{{ route('faculty') }}">Faculty</a>
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
                                <a href="{{ route('partners') }}">Partners</a>
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
    </div> --}}
    @yield('content')


    <!-- Bootstrap JS-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- Custom JS-->
    <script src="{{ asset('./js/vendor/modernizr-3.11.2.min.js') }}"></script>
    <script src="{{ asset('./js/plugins.js') }}"></script>
    <script src="{{ asset('./js/main.js') }}"></script>

    <!-- Ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
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