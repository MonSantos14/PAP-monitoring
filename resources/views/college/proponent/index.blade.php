@extends('index')

@section('content')
    <body class="ms-fill">
        <nav class="navbar navbar-light fixed-top bg-light p-0 shadow">
        <div class="container-fluid">
            <div class="py-3 m-0">
            <a href="dashboard.html"><img src="{{ asset('./img/logo/rmo-logo.png') }}" class="navbar-office-logo"></a>
            </div>
            <div class="navbar-nav px-3">
                <a class="text-center navbar-nav-text" href="#logoutModal" type="button" data-toggle="modal"><img src="{{ asset('./img/logo/logout.svg') }}" class="navbar-logout-icon"><p class="mb-0 mt-1">Logout</p></a>
            </div>
        </div>
        </nav>
        <div class="d-flex wrapper" id="wrapper">
        <!-- Sidebar-->
        <div class="border-end" id="sidebar-wrapper">
            <button class="navbar-toggler toggler-example sidebar-btn" id="sidebarToggle" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1"
            aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation"><span class="dark-blue-text"><i
                class="fas fa-angle-left fa-1x"></i></span></button>
            <div class="sidebar-heading px-3 mt-4 text-muted row">
                <!-- If no picture/logo -->
                <!-- <div class="member-logo my-auto mr-2">C</div> -->
                <!-- else if have picture/logo -->
                <img src="../img/COE.png" height="auto" width="80px" class="my-auto pr-2"/> 
                <div class="sidebar-user-container m-auto">
                    <p class="sidebar-user-name">{{ auth()->user()->name }}</p>
                    <p class="sidebar-user-email">{{ auth()->user()->email }}</p>
                </div>
                </div>
    
            <nav id="sidebar">
                <div class="pt-3">
    
                <ul class="nav flex-column list-group">
                    <li class="nav-item" >
                    <a class="nav-item-link" href="{{ route('dashboard-college') }}"><ion-icon name="grid-outline" size="large"></ion-icon> Dashboard</a>
                    </li>
    
                    <li class="nav-item">
                    <a class="nav-item-link" href="{{ route('faculty-college') }}"><ion-icon name="people-outline" size="large"></ion-icon> Faculty</a>
                    </li>
    
                    <li class="nav-item active">
                    <a class="nav-item-link" href="{{ route('proponent-college') }}"><ion-icon name="person-outline" size="large"></ion-icon> Proponent</a>
                    </li>
    
                    <li class="nav-item">
                    <a href="#manageAccount" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-item-link"><ion-icon name="settings-outline" size="large"></ion-icon> Manage Account</a>
                    
                    <ul class="collapse collapse-group list-unstyled" id="manageAccount">
                        <li class="collapse-item">
                            <a href="change-pw.html"><ion-icon name="lock-open-outline" size="large"></ion-icon> Change Password</a>
                        </li>
                    </ul>
                    </li>
                </ul>
                <!-- <footer class="page-footer font-small rgba-white-slight pt-3 fixed-bottom">
                    <div class="">
                    <a class="nav-item-link" href="drafts.html"><ion-icon name="document-outline" size="large"></ion-icon> Drafts</a>
                    </div>
                </footer>      -->
                </div>
            </nav>
        </div>
        <!-- Page content wrapper-->
        <div id="page-content-wrapper">
            <!-- Content Header -->
            <div class="container-fluid">
                <!-- Page Title -->
                <h1 class="page-heading mt-2"><ion-icon name="person-outline" size="large"></ion-icon> Proponent</h1>
                <!-- Search and Create Button -->
                <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                    <div class="col-lg-9 col-12 pl-0">
    
                        <form action="#" class="search-form">
                            <input type="text" class="search-control form-control" placeholder="Search Proposal .." name="search">
                            <button type="submit" class="search-btn btn btn-primary"><i class="fa fa-search"></i></button>
                        </form>
    
                    </div>
                    <div class="col-lg-3 col-12">
                        <a href="{{ route('create-proponent-college') }}" class="btn btn-lg btn-light float-lg-right">CREATE <i class="fas fa-plus"></i></a>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            <!-- End of Content Header -->
    
            <!-- Start of content table -->
                <div class="container-fluid py-1">
                <div class="card table-container">
                    <div class="card-header">
                    <h3 class="table-heading py-1">List of Proponents</h3>
                    </div>
                    <div class="card-body">
                    <table class="table bg-white">
                    <thead>
                        <tr>
                        <th scope="col">Proponent Information</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($proponent->count())
                            @foreach ($proponent as $data)
                                <tr >                      
                                    <td class="d-flex"> 
                                        <!-- If no picture/logo -->
                                        <div class="member-logo my-auto mr-2">JD</div>
                                        <!-- else if have picture/logo -->
                                        <!-- <img src="../img/dict-logo.png" height="auto" width="80px" class="my-auto pr-2"/>  -->
                                        <div class="member-list my-auto">
                                        <p class="mb-0">{{ $data->firstname }} {{ $data->middlename }} {{ $data->lastname }}</p>
                                        <span class="d-block">{{ $data->email }}</span>
                                        <span class="d-block">Proposal Leader Count: <b>2</b></span>
                                        <span class="d-block">Proposal Member Count: <b>10</b></span>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <td colspan="7" class="text-center td-noproposals">No Proposals</td>
                        @endif
                    </tbody>
                    </table>
                    </div>
                    <div class="card-footer">
                        <nav aria-label="Pagination" class="float-right">
                          <ul class="pagination">
                            {!!  $proponent->links() !!}
                          </ul>
                        </nav>
                    </div>
                </div>
                </div>
            </div>
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
      
      
          <!-- Delete Modal -->
          <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <span class="modal-title" id="deleteModal"><i class="fa fa-edit"></i> DELETE ?</span>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body text-center">
                  <p>Are you sure you want to <span class="colored">DELETE</span> this faculty?</p>
                  <a href="#" class="btn btn-primary">Yes</a>
                  <a href="#" class="btn btn-secondary" data-dismiss="modal">Cancel</a>
                </div>
              </div>
            </div>
          </div>
@endsection