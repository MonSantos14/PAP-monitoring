@extends('index')

@section('content')
    <nav class="navbar navbar-light fixed-top bg-light p-0 shadow">
        <div class="container-fluid">
            <div class="py-3 m-0">
                <a href="{{ route('dashboard-college') }}"><img src="{{ asset('./img/logo/rmo-logo.png') }}" class="navbar-office-logo"></a>
            </div>
            <div class="navbar-nav px-3">
                <a class="text-center navbar-nav-text" href="#logoutModal" type="button" data-toggle="modal"><img src="{{ asset('./img/logo/logout.svg') }}" class="navbar-logout-icon"><p class="mb-0 mt-1">Logout</p></a>
            </div>
        </div>
    </nav>

    <div class="container-fluid wrapper" id="wrapper">
        <iframe src="{{ asset('../requirements/' .$file .'#toolbar=0') }}" height="750px" width="100%"></iframe>
    </div>

    <!-- Logout Modal -->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <img src="../img/logout.svg" class="navbar-logout-icon"><span class="modal-title" id="logoutModalLabel"> LOGOUT ?</span>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <p>Are you sure you want to <span class="colored">LOGOUT</span> into your account now?</p>
                    <button type="button" class="btn btn-primary">Yes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>

                </div>
            </div>
        </div>
    </div>  
@endsection