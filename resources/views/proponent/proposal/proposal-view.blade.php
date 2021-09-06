@extends('index')

@section('content')
<body class="ms-fill">
    <nav class="navbar navbar-light fixed-top bg-light p-0 shadow">
        <div class="container-fluid">
          <div class="py-3 m-0">
           <a href="{{ route('dashboard-proponent') }}"><img src="{{ asset('/img/logo/rmo-logo.png') }}" class="navbar-office-logo"></a>
            </div>
          <div class="navbar-nav px-3">
              <a class="text-center navbar-nav-text" href="#logoutModal" type="button" data-toggle="modal"><img src="{{ asset('/img/logo/logout.svg') }}" class="navbar-logout-icon"><p class="mb-0 mt-1">Logout</p></a>
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
                @if ($user)
                    <!-- If no picture/logo -->
                    <div class="member-logo my-auto mr-2">JD</div>
                    <!-- else if have picture/logo -->
                    <!-- <img src="../img/dict-logo.png" height="auto" width="80px" class="my-auto pr-2"/>  -->
                    <div class="sidebar-user-container m-auto">
                        <p class="sidebar-user-name">{{ $user->firstname }} {{ $user->middlename }} {{ $user->lastname }}</p>
                        <p class="sidebar-user-email">{{ $user->email }}</p>
                    </div>
                @endif
            </div>

            <nav id="sidebar">
              <div class="pt-3">

                <ul class="nav flex-column list-group">
                  <li class="nav-item active" >
                    <a class="nav-item-link" href="{{ route('dashboard-proponent') }}"><ion-icon name="grid-outline" size="large"></ion-icon> Dashboard</a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-item-link" href="{{ route('drafts-proponent') }}"><ion-icon name="document-outline" size="large"></ion-icon> Drafts</a>
                  </li>

                  <li class="nav-item">
                    <a href="#manageAccount" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-item-link"><ion-icon name="settings-outline" size="large"></ion-icon> Manage Account</a>
                    
                    <ul class="collapse collapse-group list-unstyled" id="manageAccount">
                      <li class="collapse-item">
                        <a href="{{ route('profile-proponent',$user->email) }}"><ion-icon name="person-outline" size="large"></ion-icon> Profile</a>
                    </li>
                      <li class="collapse-item">
                          <a href="{{ route('changepw-proponent') }}"><ion-icon name="lock-open-outline" size="large"></ion-icon> Change Password</a>
                      </li>


                    </ul>
                  </li>

                </ul>

      
              </div>
            </nav>
            
        </div>
        
        <!-- Page content wrapper-->
        <div id="page-content-wrapper">
          <!-- Content Header -->
          <div class="container-fluid">
            <!-- Page Title -->
            <div class="row mb-2">
              <div class="col-sm-9 pl-0">
                <h1 class="page-heading mt-2"><ion-icon name="document-text-outline" size="large"></ion-icon> Proposal View</h1>    
              </div>
              <div class="col-sm-3">
                <a href="" class="btn btn-primary btn-goback float-right"><i class="fas fa-reply"></i> Go Back</a>
              </div>

            </div>
          </div>
          <!-- End of Content Header -->

          @if ($proposal)
            <!-- Start of content table -->
                <div class="container-fluid py-2">
                <div class="card table-container">
                    <div class="card-header">
                    <div class="row">
                        <div class="col-sm-9">
                        <h3 class="card-heading py-3">PAP No. {{ $proposal->proposal_refID }}</h3>
                        </div>

                        <div class="col-sm-3 py-3">
                        <p class="status-text float-right m-0">Status: <span class="badge status-inprogress">{{ $proposal->proposal_title }}</span></p>
                        </div>
                    </div>
                    </div>
                    <div class="card-body card-body-proposal">
                    <div class="row pb-5">
                        <div class="col-sm-7">
                        <h3 class="card-heading py-3">Location: <span class="card-text">{{ $proposal->proposal_location }}</span></h3>
                        <h3 class="card-heading py-3">Proposal Title: <span class="card-text">{{ $proposal->proposal_title }}</span></h3>
                        <h3 class="card-heading py-3">Date Submitted: <span class="card-text">{{ $proposal->proposal_title }}</span></h3>
                        <h3 class="card-heading py-3">Duration: <span class="card-text">6 month/s</span></h3>
                        <h3 class="card-heading py-3">Proposal Partners:</h3>
                        <p class="card-text">Department of Science and Technology</p>
                        </div>
                        <div class="col-sm-5">
                        <h3 class="card-heading py-3">Project Leader: <span class="card-text">Shiela Mae Liwag</span></h3>
                        <h3 class="card-heading py-3">Proposal Members:</h3>
                        <p class="card-text">Michelle Santos</p>
                        <p class="card-text">John Doe</p>
                        <p class="card-text">Christian Cruz</p>
                        <p class="card-text">Alex Santos</p>
                        <p class="card-text">Juan Dela Cruz</p>
                        </div>
                    </div>
                    <hr>


                
                    <div class="container-fluid proposal-files-container">
                        <h3 class="card-heading py-3">Proposal Files:</h3>
                        <div class="row">

                        <div class="proposal-file-link pt-3 pb-5 px-5 text-center">
                        <p class="proposal-file-text">Capsule Research Proposal</p>
                        <div class="text-center proposal-file">
                            <form action="#">
                            <div class="proposal-cont">
                            <svg id="proposal-file-icon" xmlns="http://www.w3.org/2000/svg" width="32.524" height="42.698" viewBox="0 0 32.524 42.698">
                                <path id="Path_930" data-name="Path 930" d="M64.753,42.7H89.771a3.757,3.757,0,0,0,3.753-3.753V12.509H84.767a3.757,3.757,0,0,1-3.753-3.753V0H64.753A3.757,3.757,0,0,0,61,3.753V38.945A3.757,3.757,0,0,0,64.753,42.7Zm5-25.1H84.767a1.251,1.251,0,1,1,0,2.5H69.756a1.251,1.251,0,0,1,0-2.5Zm0,5H84.767a1.251,1.251,0,1,1,0,2.5H69.756a1.251,1.251,0,0,1,0-2.5Zm0,5H84.767a1.251,1.251,0,1,1,0,2.5H69.756a1.251,1.251,0,0,1,0-2.5Zm0,5H79.764a1.251,1.251,0,0,1,0,2.5H69.756a1.251,1.251,0,0,1,0-2.5Z" transform="translate(-61)" fill="maroon"/>
                                <path id="Path_931" data-name="Path 931" d="M332.251,18.063h8.023L331,8.789v8.023A1.252,1.252,0,0,0,332.251,18.063Z" transform="translate(-308.483 -8.056)" fill="maroon"/>
                            </svg>                        
                            <p id="fileInputTxtCRP">capsule-research-proposal.pdf</p>
                            <a href="" class="btn btn-secondary" title="View Proposal"><i class="fas fa-eye"></i> View</a>
                            </div>
                        </div>
                        </form>
                        </div>

                        <div class="proposal-file-link pt-3 pb-5 px-5 text-center">
                        <p class="proposal-file-text">Line Item Budget</p>
                        <div class="text-center proposal-file">
                        <form action="#">
                        <div class="proposal-cont">
                            <svg id="proposal-file-icon" xmlns="http://www.w3.org/2000/svg" width="32.524" height="42.698" viewBox="0 0 32.524 42.698">
                            <path id="Path_930" data-name="Path 930" d="M64.753,42.7H89.771a3.757,3.757,0,0,0,3.753-3.753V12.509H84.767a3.757,3.757,0,0,1-3.753-3.753V0H64.753A3.757,3.757,0,0,0,61,3.753V38.945A3.757,3.757,0,0,0,64.753,42.7Zm5-25.1H84.767a1.251,1.251,0,1,1,0,2.5H69.756a1.251,1.251,0,0,1,0-2.5Zm0,5H84.767a1.251,1.251,0,1,1,0,2.5H69.756a1.251,1.251,0,0,1,0-2.5Zm0,5H84.767a1.251,1.251,0,1,1,0,2.5H69.756a1.251,1.251,0,0,1,0-2.5Zm0,5H79.764a1.251,1.251,0,0,1,0,2.5H69.756a1.251,1.251,0,0,1,0-2.5Z" transform="translate(-61)" fill="maroon"/>
                            <path id="Path_931" data-name="Path 931" d="M332.251,18.063h8.023L331,8.789v8.023A1.252,1.252,0,0,0,332.251,18.063Z" transform="translate(-308.483 -8.056)" fill="maroon"/>
                            </svg>                        
                            <p id="fileInputTxtLIB">line-item-budget.pdf</p>
                            <a href="" class="btn btn-secondary" title="View Proposal"><i class="fas fa-eye"></i> View</a>
                        </div>
                        </div>
                    </form>
                    </div>

                    <div class="proposal-file-link pt-3 pb-5 px-5 text-center">
                        <p class="proposal-file-text">Curriculum Vitae</p>
                    <div class="text-center proposal-file">
                        <div class="proposal-cont">
                        <svg id="proposal-file-icon" xmlns="http://www.w3.org/2000/svg" width="32.524" height="42.698" viewBox="0 0 32.524 42.698">
                            <path id="Path_930" data-name="Path 930" d="M64.753,42.7H89.771a3.757,3.757,0,0,0,3.753-3.753V12.509H84.767a3.757,3.757,0,0,1-3.753-3.753V0H64.753A3.757,3.757,0,0,0,61,3.753V38.945A3.757,3.757,0,0,0,64.753,42.7Zm5-25.1H84.767a1.251,1.251,0,1,1,0,2.5H69.756a1.251,1.251,0,0,1,0-2.5Zm0,5H84.767a1.251,1.251,0,1,1,0,2.5H69.756a1.251,1.251,0,0,1,0-2.5Zm0,5H84.767a1.251,1.251,0,1,1,0,2.5H69.756a1.251,1.251,0,0,1,0-2.5Zm0,5H79.764a1.251,1.251,0,0,1,0,2.5H69.756a1.251,1.251,0,0,1,0-2.5Z" transform="translate(-61)" fill="maroon"/>
                            <path id="Path_931" data-name="Path 931" d="M332.251,18.063h8.023L331,8.789v8.023A1.252,1.252,0,0,0,332.251,18.063Z" transform="translate(-308.483 -8.056)" fill="maroon"/>
                        </svg>                        
                        <p id="fileInputTxtCV">curriculum-vitae.pdf</p>
                        <a href="" class="btn btn-secondary" title="View Proposal"><i class="fas fa-eye"></i> View</a>
                        </div>
                    </div>
                    </div>

                    <div class="proposal-file-link pt-3 pb-5 px-5 text-center">
                    <p class="proposal-file-text">Duties and Responsibilities</p>
                    <div class="text-center proposal-file">
                    <div class="proposal-cont">
                        <svg id="proposal-file-icon" xmlns="http://www.w3.org/2000/svg" width="32.524" height="42.698" viewBox="0 0 32.524 42.698">
                        <path id="Path_930" data-name="Path 930" d="M64.753,42.7H89.771a3.757,3.757,0,0,0,3.753-3.753V12.509H84.767a3.757,3.757,0,0,1-3.753-3.753V0H64.753A3.757,3.757,0,0,0,61,3.753V38.945A3.757,3.757,0,0,0,64.753,42.7Zm5-25.1H84.767a1.251,1.251,0,1,1,0,2.5H69.756a1.251,1.251,0,0,1,0-2.5Zm0,5H84.767a1.251,1.251,0,1,1,0,2.5H69.756a1.251,1.251,0,0,1,0-2.5Zm0,5H84.767a1.251,1.251,0,1,1,0,2.5H69.756a1.251,1.251,0,0,1,0-2.5Zm0,5H79.764a1.251,1.251,0,0,1,0,2.5H69.756a1.251,1.251,0,0,1,0-2.5Z" transform="translate(-61)" fill="maroon"/>
                        <path id="Path_931" data-name="Path 931" d="M332.251,18.063h8.023L331,8.789v8.023A1.252,1.252,0,0,0,332.251,18.063Z" transform="translate(-308.483 -8.056)" fill="maroon"/>
                        </svg>                        
                        <p id="fileInputTxtDR">duties-and-responsibilities.pdf</p>
                        <a href="" class="btn btn-secondary" title="View Proposal"><i class="fas fa-eye"></i> View</a>
                    </div>
                    </div>
                </div>

                <div class="proposal-file-link pt-3 pb-5 px-5 text-center">
                <p class="proposal-file-text">Workplan</p>
                <div class="text-center proposal-file">
                <div class="proposal-cont">
                    <svg id="proposal-file-icon" xmlns="http://www.w3.org/2000/svg" width="32.524" height="42.698" viewBox="0 0 32.524 42.698">
                    <path id="Path_930" data-name="Path 930" d="M64.753,42.7H89.771a3.757,3.757,0,0,0,3.753-3.753V12.509H84.767a3.757,3.757,0,0,1-3.753-3.753V0H64.753A3.757,3.757,0,0,0,61,3.753V38.945A3.757,3.757,0,0,0,64.753,42.7Zm5-25.1H84.767a1.251,1.251,0,1,1,0,2.5H69.756a1.251,1.251,0,0,1,0-2.5Zm0,5H84.767a1.251,1.251,0,1,1,0,2.5H69.756a1.251,1.251,0,0,1,0-2.5Zm0,5H84.767a1.251,1.251,0,1,1,0,2.5H69.756a1.251,1.251,0,0,1,0-2.5Zm0,5H79.764a1.251,1.251,0,0,1,0,2.5H69.756a1.251,1.251,0,0,1,0-2.5Z" transform="translate(-61)" fill="maroon"/>
                    <path id="Path_931" data-name="Path 931" d="M332.251,18.063h8.023L331,8.789v8.023A1.252,1.252,0,0,0,332.251,18.063Z" transform="translate(-308.483 -8.056)" fill="maroon"/>
                    </svg>                        
                    <p id="fileInputTxtWP">workplan.pdf</p>
                    <a href="" class="btn btn-secondary" title="View Proposal"><i class="fas fa-eye"></i> View</a>
                </div>
                </div>

                </div>
                    
                            
                            </div>
                        </div>
                        </div>
                        <div class="card-footer py-4">

                        </div>
                    </div>
                    </div>
                </div>
            </div>
        @endif



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