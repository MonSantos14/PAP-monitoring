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
                      <li class="nav-item active" >
                        <a class="nav-item-link" href="{{ route('dashboard-college') }}"><ion-icon name="grid-outline" size="large"></ion-icon> Dashboard</a>
                      </li>
    
                      <li class="nav-item">
                        <a class="nav-item-link" href="{{ route('faculty-college') }}"><ion-icon name="people-outline" size="large"></ion-icon> Faculty</a>
                      </li>
    
                      <li class="nav-item">
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

            <!-- Start of content table -->
                <div class="container-fluid py-2">
                <div class="card table-container">
                    <div class="card-header">
                    <div class="row">
                        <div class="col-sm-9">
                        <h3 class="card-heading py-3">PAP No. {{ $proposal->proposal_refID }}</h3>
                        </div>

                        <div class="col-sm-3 py-3">
                        <p class="status-text float-right m-0">Status: <span class="badge status-inprogress">{{ $proposal->proposal_status }}</span></p>
                        </div>
                    </div>
                    </div>
                    <div class="card-body card-body-proposal">
                    <div class="row pb-5">
                        <div class="col-sm-7">
                        <h3 class="card-heading py-3">Location: <span class="card-text">{{ $proposal->proposal_location }}</span></h3>
                        <h3 class="card-heading py-3">Proposal Title: <span class="card-text">{{ $proposal->proposal_title }}</span></h3>
                        <h3 class="card-heading py-3">Date Submitted: <span class="card-text">{{ $proposal->created_at }}</span></h3>
                        <h3 class="card-heading py-3">Duration: <span class="card-text">{{ $proposal->proposal_duration }} month/s</span></h3>
                        <h3 class="card-heading py-3">Proposal Partners:</h3>
                        @foreach ($partners as $partner)
                        <p class="card-text">{{ $partner->partner_name }}</p>
                        @endforeach
                        </div>
                        <div class="col-sm-5">
                        <h3 class="card-heading py-3">Project Leader: <span class="card-text">{{ $proposal->proposal_leader }}</span></h3>
                        <h3 class="card-heading py-3">Proposal Members:</h3>
                        @foreach ($members as $member)
                        <p class="card-text">{{ $member->faculty_fullname }}</p>
                        @endforeach
                        </div>
                    </div>
                    <hr>

                    {{-- Requirements Foreach --}}
                    @foreach ($reqs as $req) 
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
                                        <p id="fileInputTxtCRP">{{ $req->proposal_CRP }}</p>
                                        <a href="{{ route('proposal-view-college',[$proposal->id,$req->proposal_CRP]) }}" class="btn btn-secondary" target="_blank" title="View Proposal"><i class="fas fa-eye"></i> View</a>
                                    </div>
                                </form>
                            </div>
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
                                        <p id="fileInputTxtLIB">{{ $req->proposal_LIB }}</p>
                                        <a href="{{ route('proposal-view-college',[$proposal->id,$req->proposal_LIB]) }}" target="_blank" class="btn btn-secondary" title="View Proposal"><i class="fas fa-eye"></i> View</a>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="proposal-file-link pt-3 pb-5 px-5 text-center">
                            <p class="proposal-file-text">Curriculum Vitae</p>
                        <div class="text-center proposal-file">
                                <div class="proposal-cont">
                                    <svg id="proposal-file-icon" xmlns="http://www.w3.org/2000/svg" width="32.524" height="42.698" viewBox="0 0 32.524 42.698">
                                        <path id="Path_930" data-name="Path 930" d="M64.753,42.7H89.771a3.757,3.757,0,0,0,3.753-3.753V12.509H84.767a3.757,3.757,0,0,1-3.753-3.753V0H64.753A3.757,3.757,0,0,0,61,3.753V38.945A3.757,3.757,0,0,0,64.753,42.7Zm5-25.1H84.767a1.251,1.251,0,1,1,0,2.5H69.756a1.251,1.251,0,0,1,0-2.5Zm0,5H84.767a1.251,1.251,0,1,1,0,2.5H69.756a1.251,1.251,0,0,1,0-2.5Zm0,5H84.767a1.251,1.251,0,1,1,0,2.5H69.756a1.251,1.251,0,0,1,0-2.5Zm0,5H79.764a1.251,1.251,0,0,1,0,2.5H69.756a1.251,1.251,0,0,1,0-2.5Z" transform="translate(-61)" fill="maroon"/>
                                        <path id="Path_931" data-name="Path 931" d="M332.251,18.063h8.023L331,8.789v8.023A1.252,1.252,0,0,0,332.251,18.063Z" transform="translate(-308.483 -8.056)" fill="maroon"/>
                                    </svg>                        
                                    <p id="fileInputTxtCV">{{ $req->proposal_CVP }}</p>
                                    <a href="{{ route('proposal-view-college',[$proposal->id,$req->proposal_CVP]) }}" target="_blank" class="btn btn-secondary" title="View Proposal"><i class="fas fa-eye"></i> View</a>
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
                                    <p id="fileInputTxtDR">{{ $req->proposal_SDRPM }}</p>
                                    <a href="{{ route('proposal-view-college',[$proposal->id,$req->proposal_SDRPM]) }}" target="_blank" class="btn btn-secondary" title="View Proposal"><i class="fas fa-eye"></i> View</a>
                                </div>
                            </div>
                        </div>

                        {{-- <div class="proposal-file-link pt-3 pb-5 px-5 text-center">
                            <p class="proposal-file-text">Certification</p>
                            <div class="text-center proposal-file">
                                <div class="proposal-cont">
                                    <svg id="proposal-file-icon" xmlns="http://www.w3.org/2000/svg" width="32.524" height="42.698" viewBox="0 0 32.524 42.698">
                                        <path id="Path_930" data-name="Path 930" d="M64.753,42.7H89.771a3.757,3.757,0,0,0,3.753-3.753V12.509H84.767a3.757,3.757,0,0,1-3.753-3.753V0H64.753A3.757,3.757,0,0,0,61,3.753V38.945A3.757,3.757,0,0,0,64.753,42.7Zm5-25.1H84.767a1.251,1.251,0,1,1,0,2.5H69.756a1.251,1.251,0,0,1,0-2.5Zm0,5H84.767a1.251,1.251,0,1,1,0,2.5H69.756a1.251,1.251,0,0,1,0-2.5Zm0,5H84.767a1.251,1.251,0,1,1,0,2.5H69.756a1.251,1.251,0,0,1,0-2.5Zm0,5H79.764a1.251,1.251,0,0,1,0,2.5H69.756a1.251,1.251,0,0,1,0-2.5Z" transform="translate(-61)" fill="maroon"/>
                                        <path id="Path_931" data-name="Path 931" d="M332.251,18.063h8.023L331,8.789v8.023A1.252,1.252,0,0,0,332.251,18.063Z" transform="translate(-308.483 -8.056)" fill="maroon"/>
                                    </svg>                        
                                    <p id="fileInputTxtCERT">certification.pdf</p>
                                    <a href="file-view.html" class="btn btn-secondary" title="View Proposal"><i class="fas fa-eye"></i> View</a>
                                </div>
                            </div>
                        </div> --}}

                        <div class="proposal-file-link pt-3 pb-5 px-5 text-center">
                            <p class="proposal-file-text">Workplan</p>
                            <div class="text-center proposal-file">
                                <div class="proposal-cont">
                                    <svg id="proposal-file-icon" xmlns="http://www.w3.org/2000/svg" width="32.524" height="42.698" viewBox="0 0 32.524 42.698">
                                    <path id="Path_930" data-name="Path 930" d="M64.753,42.7H89.771a3.757,3.757,0,0,0,3.753-3.753V12.509H84.767a3.757,3.757,0,0,1-3.753-3.753V0H64.753A3.757,3.757,0,0,0,61,3.753V38.945A3.757,3.757,0,0,0,64.753,42.7Zm5-25.1H84.767a1.251,1.251,0,1,1,0,2.5H69.756a1.251,1.251,0,0,1,0-2.5Zm0,5H84.767a1.251,1.251,0,1,1,0,2.5H69.756a1.251,1.251,0,0,1,0-2.5Zm0,5H84.767a1.251,1.251,0,1,1,0,2.5H69.756a1.251,1.251,0,0,1,0-2.5Zm0,5H79.764a1.251,1.251,0,0,1,0,2.5H69.756a1.251,1.251,0,0,1,0-2.5Z" transform="translate(-61)" fill="maroon"/>
                                    <path id="Path_931" data-name="Path 931" d="M332.251,18.063h8.023L331,8.789v8.023A1.252,1.252,0,0,0,332.251,18.063Z" transform="translate(-308.483 -8.056)" fill="maroon"/>
                                    </svg>                        
                                    <p id="fileInputTxtWP">{{ $req->proposal_WP }}</p>
                                    <a href="{{ route('proposal-view-college',[$proposal->id,$req->proposal_WP]) }}" target="_blank" class="btn btn-secondary" title="View Proposal"><i class="fas fa-eye"></i> View</a>
                                </div>
                            </div>
                        </div>
                
                    </div>
                </div>
                @endforeach

                    <div class="container-fluid pb-5">
                        <h3 class="card-heading py-3">Remarks <a tabindex="0" class="colored" role="button" data-toggle="popover" data-trigger="hover" data-html="true" data-content="Put remarks for the proponent to see what he/she needs to revised on the proposal."><i class="fa fa-info-circle"></i></a></h3>

                            <textarea name="" id="" cols="10" rows="6" class="form-control" placeholder="Enter your remarks"></textarea>

                            <div class="proposal-file-link pt-3 pb-5 pt-5">
                            <h3 class="card-heading py-5">Certification <a tabindex="0" class="colored" role="button" data-toggle="popover" data-trigger="hover" data-html="true" data-content="Upload the proposal certification with the Dean's Signature before you accept this proposal. "><i class="fa fa-info-circle"></i></a></h3>
                            <div class="text-center file-upload m-0 w-100">
                                <div class="file-upload-cont">
                                <label >
                                    <input type="file" name="fileInputWP" class="inputFile">
                                    <svg id="upload-icon" xmlns="http://www.w3.org/2000/svg" width="58.374" height="58.374" viewBox="0 0 58.374 58.374">
                                    <path id="Path_737" data-name="Path 737" d="M0,0H58.374V58.374H0Z" fill="none"/>
                                    <path id="Path_738" data-name="Path 738" d="M47.064,18.691a18.223,18.223,0,0,0-34.051-4.864,14.587,14.587,0,0,0,1.581,29.089H46.212a12.126,12.126,0,0,0,.851-24.225Zm-13.012,7.2v9.729H24.322V25.89h-7.3L29.187,13.729,41.348,25.89Z" transform="translate(0 5.729)" fill="maroon"/>
                                    </svg>                          
                                    <p class="pt-3" id="fileInputWP">Upload A File</p>  
                                </label>
                                </div>
                            </div>
                            </div>

                    </div>
                    </div>
                    <div class="card-footer py-4">
                    <a href="" class="btn btn-secondary float-right submit-proposal-btn ml-3"><i class="fas fa-times-circle"></i> FOR REVISION</a>
                    <a href="" class="btn btn-primary float-right submit-proposal-btn" aria-disabled="true" id="submitBtn"><i class="fas fa-check-circle"></i> ACCEPT</a>
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
@endsection