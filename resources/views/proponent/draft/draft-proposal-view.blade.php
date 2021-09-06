@extends('index')

@section('content')
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
              <li class="nav-item" >
                <a class="nav-item-link" href="{{ route('dashboard-proponent') }}"><ion-icon name="grid-outline" size="large"></ion-icon> Dashboard</a>
              </li>

              <li class="nav-item active">
                <a class="nav-item-link" href="{{ route('drafts-proponent') }}"><ion-icon name="document-outline" size="large"></ion-icon> Drafts</a>
              </li>

              <li class="nav-item">
                <a href="#manageAccount" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-item-link"><ion-icon name="settings-outline" size="large"></ion-icon> Manage Account</a>
                
                <ul class="collapse collapse-group list-unstyled" id="manageAccount">
                  <li class="collapse-item">
                    <a href="profile.html"><ion-icon name="person-outline" size="large"></ion-icon> Profile</a>
                </li>
                  <li class="collapse-item">
                      <a href="change-pw.html"><ion-icon name="lock-open-outline" size="large"></ion-icon> Change Password</a>
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
                <h1 class="page-heading mt-2"><ion-icon name="document-text-outline" size="large"></ion-icon> Proposal Draft</h1>    
              </div>
              <div class="col-sm-3">
                <a href="" class="btn btn-primary btn-goback float-right"><i class="fas fa-reply"></i> Go Back</a>
              </div>

            </div>
          </div>
          <!-- End of Content Header -->

          <!-- Start of content table -->
          <div class="container-fluid py-2">
            @if ($draft)
                
            <div class="card table-container">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-9">
                            <h3 class="card-heading py-3">PAP No. {{ $draft->proposal_refID }}</h3>
                        </div>
                        
                        <div class="col-sm-3 py-3">
                            <p class="status-text float-right m-0">Status: <span class="badge status-draft">{{ $draft->proposal_status }}</span></p>
                        </div>
                    </div>
              </div>
              <div class="card-body card-body-proposal">
                  <form class="proposal-form" action="dashboard.html">
                  <div class="row pb-5">
                      <div class="col-sm-7">
                          <div class="form-group text-left">
                              <label for="InputProposalTitle" class="card-heading py-3">Proposal Title:</label>
                              <input type="text" class="form-control" id="InputProposalTitle" placeholder="Enter Proposal Title" value="{{ $draft->proposal_title }}" required>
                            </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="form-group text-left">
                            <label for="InputDuration" class="card-heading py-3">Duration (in months):</label>
                            <input type="number" min="1" class="form-control" id="InputDuration" placeholder="Enter Proposal Duration" name="proposal_duration">
                        </div>
                    </div> 
                </div>

                <div class="proposal-files-container">
                    <h3 class="card-heading py-3">Proposal Files:</h3>
                    <div class="row">
                        
                        <div class="proposal-file-link pt-3 pb-5 px-5 text-center">
                            <p class="proposal-file-text">Capsule Research Proposal</p>
                          <div class="text-center file-upload">
                            <div class="file-upload-cont">
                                <label >
                                    <input type="file" name="fileInputCRP" class="inputFile">
                                    <svg id="upload-icon" xmlns="http://www.w3.org/2000/svg" width="58.374" height="58.374" viewBox="0 0 58.374 58.374">
                                  <path id="Path_737" data-name="Path 737" d="M0,0H58.374V58.374H0Z" fill="none"/>
                                  <path id="Path_738" data-name="Path 738" d="M47.064,18.691a18.223,18.223,0,0,0-34.051-4.864,14.587,14.587,0,0,0,1.581,29.089H46.212a12.126,12.126,0,0,0,.851-24.225Zm-13.012,7.2v9.729H24.322V25.89h-7.3L29.187,13.729,41.348,25.89Z" transform="translate(0 5.729)" fill="maroon"/>
                                </svg>                          
                                <p class="pt-3" id="fileInputCRP">Choose A File</p>  
                              </label>
                            </div>
                        </div>
                    </div>

                        <div class="proposal-file-link pt-3 pb-5 px-5 text-center">
                            <p class="proposal-file-text">Line Item Budget</p>
                            <div class="text-center file-upload">
                                <div class="file-upload-cont">
                              <label >
                                <input type="file" name="fileInputLIB" class="inputFile">
                                <svg id="upload-icon" xmlns="http://www.w3.org/2000/svg" width="58.374" height="58.374" viewBox="0 0 58.374 58.374">
                                    <path id="Path_737" data-name="Path 737" d="M0,0H58.374V58.374H0Z" fill="none"/>
                                    <path id="Path_738" data-name="Path 738" d="M47.064,18.691a18.223,18.223,0,0,0-34.051-4.864,14.587,14.587,0,0,0,1.581,29.089H46.212a12.126,12.126,0,0,0,.851-24.225Zm-13.012,7.2v9.729H24.322V25.89h-7.3L29.187,13.729,41.348,25.89Z" transform="translate(0 5.729)" fill="maroon"/>
                                </svg>                          
                                <p class="pt-3" id="fileInputLIB">Choose A File</p>  
                            </label>
                        </div>
                    </div>
                </div>
                
                <div class="proposal-file-link pt-3 pb-5 px-5 text-center">
                    <p class="proposal-file-text">Curriculum Vitae</p>
                    <div class="text-center file-upload">
                        <div class="file-upload-cont">
                            <label >
                                <input type="file" name="fileInputCV" class="inputFile">
                                <svg id="upload-icon" xmlns="http://www.w3.org/2000/svg" width="58.374" height="58.374" viewBox="0 0 58.374 58.374">
                                    <path id="Path_737" data-name="Path 737" d="M0,0H58.374V58.374H0Z" fill="none"/>
                                    <path id="Path_738" data-name="Path 738" d="M47.064,18.691a18.223,18.223,0,0,0-34.051-4.864,14.587,14.587,0,0,0,1.581,29.089H46.212a12.126,12.126,0,0,0,.851-24.225Zm-13.012,7.2v9.729H24.322V25.89h-7.3L29.187,13.729,41.348,25.89Z" transform="translate(0 5.729)" fill="maroon"/>
                                </svg>                          
                                <p class="pt-3" id="fileInputCV">Choose A File</p>  
                            </label>
                        </div>
                    </div>
                        </div>
                        
                        <div class="proposal-file-link pt-3 pb-5 px-5 text-center">
                          <p class="proposal-file-text">Duties and Responsibilities</p>
                          <div class="text-center file-upload">
                              <div class="file-upload-cont">
                              <label >
                                  <input type="file" name="fileInputDR" class="inputFile">
                                <svg id="upload-icon" xmlns="http://www.w3.org/2000/svg" width="58.374" height="58.374" viewBox="0 0 58.374 58.374">
                                    <path id="Path_737" data-name="Path 737" d="M0,0H58.374V58.374H0Z" fill="none"/>
                                    <path id="Path_738" data-name="Path 738" d="M47.064,18.691a18.223,18.223,0,0,0-34.051-4.864,14.587,14.587,0,0,0,1.581,29.089H46.212a12.126,12.126,0,0,0,.851-24.225Zm-13.012,7.2v9.729H24.322V25.89h-7.3L29.187,13.729,41.348,25.89Z" transform="translate(0 5.729)" fill="maroon"/>
                                </svg>                          
                                <p class="pt-3" id="fileInputDR">Choose A File</p>  
                            </label>
                        </div>
                    </div>
                </div>
                
                        <div class="proposal-file-link pt-3 pb-5 px-5 text-center">
                            <p class="proposal-file-text">Workplan</p>
                          <div class="text-center file-upload">
                              <div class="file-upload-cont">
                                  <label >
                                      <input type="file" name="fileInputWP" class="inputFile">
                                <svg id="upload-icon" xmlns="http://www.w3.org/2000/svg" width="58.374" height="58.374" viewBox="0 0 58.374 58.374">
                                  <path id="Path_737" data-name="Path 737" d="M0,0H58.374V58.374H0Z" fill="none"/>
                                  <path id="Path_738" data-name="Path 738" d="M47.064,18.691a18.223,18.223,0,0,0-34.051-4.864,14.587,14.587,0,0,0,1.581,29.089H46.212a12.126,12.126,0,0,0,.851-24.225Zm-13.012,7.2v9.729H24.322V25.89h-7.3L29.187,13.729,41.348,25.89Z" transform="translate(0 5.729)" fill="maroon"/>
                                </svg>                          
                                <p class="pt-3" id="fileInputWP">Choose A File</p>  
                            </label>
                        </div>
                          </div>
                        </div>
                        
                    </div>
                        <button class="btn btn-lg btn-primary text-uppercase my-4 ml-4 px-5" type="submit"><i class="fas fa-save"></i> SAVE</button>     
                  </div>
                </form>
                
                <hr>
                <div class="section pb-5">
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- <div class="proposal-leader-group pt-5">
                        <h3 class="card-heading py-3">Proposal Leader:</h3>      
                      <div class="d-flex py-3">
                        <input type="text" class="form-control mr-3" id="InputProposalTitle" value="Juan Dela Cruz" disabled>
                        <a href="#" class="btn btn-lg btn-primary text-uppercase ml-auto">CHANGE</a>
                    </div>
                </div> -->

                      <div class="proposal-members-group pt-5 pb-3">
                        <h3 class="card-heading py-3">Proposal Members:</h3>
                        <a href="proposal-view-draft-add-members.html" class="link"><i class="fas fa-plus-circle"></i> ADD MEMBER</a>
                    </div>
                    
                    <div class="card listing-container">
                        <div class="card-body">
                            <ul class="list-unstyled card-listing">
                                <li class="d-flex">
                                    <p class="mr-auto">Juan Dela Cruz</p>
                            </li>

                            <li class="d-flex">
                                <p class="mr-auto">Juan Dela Cruz</p>
                                <a href="#" class="btn btn-sm btn-primary btn-remove ml-auto my-auto">REMOVE</a> 
                            </li>
                            
                        </ul>
                        </div>
                      </div>
                      
                      <div class="proposal-partner-group pt-5 pb-3">
                          <h3 class="card-heading py-3">Proposal Partners:</h3>
                          <a href="proposal-view-draft-add-partners.html" class="link"><i class="fas fa-plus-circle"></i> ADD PARTNER</a>
                        </div>
                        
                        <div class="card listing-container">
                            <div class="card-body">
                                <ul class="list-unstyled card-listing">
                                    <li class="d-flex">
                                        <img src="../img/dict-logo.png" height="50px" width="auto" class="mr-auto my-auto pr-2"/> 
                                        <p class="mr-auto my-auto">Department of Scienece and Technology</p>
                                        <a href="#" class="btn btn-sm btn-primary btn-remove ml-auto my-auto">REMOVE</a> 
                                    </li>
                                    
                                    <li class="d-flex">
                                        <img src="../img/dict-logo.png" height="50px" width="auto" class="mr-auto my-auto pr-2"/> 
                                        <p class="mr-auto my-auto">Department of Information and Communications Technology</p>
                                        <a href="#" class="btn btn-sm btn-primary btn-remove ml-auto my-auto">REMOVE</a> 
                                    </li>

                          </ul>
                        </div>
                    </div>
                    
                    
                </div>
            </div>
            
        </div>
        
        
        
        
        @endif
    </div>
    <div class="card-footer py-4">
        <a href="" class="btn btn-primary float-right submit-proposal-btn" role="button" aria-disabled="true"><i class="fas fa-paper-plane"></i> SUBMIT PROPOSAL</a>
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