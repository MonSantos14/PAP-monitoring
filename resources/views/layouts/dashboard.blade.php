@extends('index')

@section('content')
<body class="ms-fill">
  <nav class="navbar navbar-light fixed-top bg-light p-0 shadow">
    <div class="container-fluid">
      <div class="py-3 m-0">
        <a href="dashboard.html"
          ><img src="{{ asset('img/logo/rmo-logo.png') }}" class="navbar-office-logo"
        /></a>
        <button
          class="navbar-toggler toggler-example"
          id="sidebarToggle"
          type="button"
          data-toggle="collapse"
          data-target="#navbarSupportedContent1"
          aria-controls="navbarSupportedContent1"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="dark-blue-text"
            ><i class="fas fa-angle-left fa-1x"></i
          ></span>
        </button>
      </div>
      <div class="navbar-nav px-3">
        <a class="text-center navbar-nav-text" href="#logoutModal" type="button" data-toggle="modal"><img src="{{ asset('img/logo/logout.svg') }}" class="navbar-logout-icon"><p class="mb-0 mt-1">Logout</p></a>
      </div>
    </div>
  </nav>

  <div class="d-flex wrapper" id="wrapper">
    <!-- Sidebar-->
    <div class="border-end" id="sidebar-wrapper">
      @if($user)
        <div class="sidebar-heading px-3 mt-4 text-muted row">
          <img src="{{ asset('img/') }}" class="sidebar-user-img" />
          <div class="sidebar-user-container m-auto">
            <p class="sidebar-user-name">{{ $user->name }}</p>
            <p class="sidebar-user-email">{{ $user->email }}</p>
          </div>
        </div>
      @endif

      <nav id="sidebar">
        <div class="pt-3">
          <ul class="nav flex-column list-group">
            <li class="nav-item active">
              <a class="nav-item-link" href="#"
                ><ion-icon name="grid-outline" size="large"></ion-icon>
                Dashboard</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-item-link" href="#"
                ><ion-icon name="people-outline" size="large"></ion-icon>
                Proponent</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-item-link" href="{{ route('draft') }}"
                ><ion-icon name="document-outline" size="large"></ion-icon>
                Drafts</a
              >
            </li>

            <li class="nav-item">
              <a
                href="#manageAccount"
                data-toggle="collapse"
                aria-expanded="false"
                class="dropdown-toggle nav-item-link"
                ><ion-icon name="settings-outline" size="large"></ion-icon>
                Manage Account</a
              >

              <ul
                class="collapse collapse-group list-unstyled"
                id="manageAccount"
              >
                <li class="collapse-item">
                  <a href="#"
                    ><ion-icon
                      name="lock-open-outline"
                      size="large"
                    ></ion-icon>
                    Change Password</a
                  >
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
        <h1 class="page-heading"> 
          <ion-icon name="grid-outline" size="large"></ion-icon> Dashboard
        </h1>
        <!-- Search and Create Button -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-9 pl-0">
                <form action="#" class="search-form">
                  <input
                    type="text"
                    class="search-control form-control"
                    placeholder="Search Proposal .."
                    name="search"
                    {{-- value="{{ old('search') }}" --}}
                  />
                  <button type="submit" class="search-btn btn btn-primary">
                    <i class="fa fa-search"></i>
                  </button>
                </form>
              </div>
              <div class="col-sm-3">
                <a href="#createProposal" class="btn btn-lg btn-light float-right" type="button" data-toggle="modal">CREATE <i class="fas fa-plus"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- End of Content Header -->

      <!-- Start of content table -->
      <div class="container-fluid py-3">
        <div class="card table-container">
          <div class="card-header">
            <h3 class="table-heading">List of Submitted Proposals</h3>
          </div>
          <table class="table table-hover bg-white">
            <thead>
              <tr>
                <th scope="col" width="10%">PAP No.</th>
                <th scope="col" width="35%">Proposal Title</th>
                <th scope="col" width="16%">Program Leader</th>
                <th scope="col" width="10%">Duration</th>
                <th scope="col" width="10%">Location</th>
                <th scope="col" width="9%">Status</th>
                <th scope="col" width="10%">Date</th>
              </tr>
            </thead>
            <tbody>
              @if ($proposals->count())
                @foreach ($proposals as $proposal)
                  @if ($proposal->proposal_read == 'new')
                    <tr class="unread">  
                  @else
                    <tr> 
                  @endif
                    <td class="tblink">{{ $proposal->proposal_refID }}</td>
                    <td class="tblink">
                      {{$proposal->proposal_title}}
                    </td>
                    <td>{{ $proposal->proposal_leader }}</td>
                    <td>{{ $proposal->proposal_duration }} Month/s</td>
                    <td>{{ $proposal->proposal_location }}</td>
                    <td><span class="badge status-ongoing">{{ $proposal->proposal_status }}</span></td>
                    <td>{{ date('m-s-y', strtotime($proposal->created_at)) }}</td>
                  </tr>
                @endforeach
              @else
                <td colspan="7" class="text-center td-noproposals">No Proposals</td>
              @endif
            </tbody>
          </table>
          <div class="card-footer">
            <nav aria-label="Pagination" class="float-right">
              <ul class="pagination">
                <li class="page-item">
                  <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                  </a>
                </li>
                <li class="page-item active">
                  <a class="page-link" href="#">1</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                  <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                  </a>
                </li>
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
        <img src="{{ asset('img/logo/logout.svg') }}" class="navbar-logout-icon"><span class="modal-title" id="logoutModalLabel"> LOGOUT ?</span>
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

  <!-- Modal -->
  <div class="modal fade" id="createProposal" tabindex="-1" role="dialog" aria-labelledby="createProposalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="createProposalLabel">CREATE PROJECT PROPOSAL</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="proposal-form" action="dashboard.html">
            <div class="form-group text-left">
              <label for="InputProposal" class="form-label-txt">Proposal Title</label>
              <input type="text" class="form-control" id="InputProposal" placeholder="Enter Proposal Title" required>
            </div>


            <button class="btn btn-lg btn-primary btn-block text-uppercase my-4" type="submit">CREATE</button>      
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS-->
  <script
    src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"
  ></script>
  <script
    src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"
  ></script>
  <script
    src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"
  ></script>
  <!-- Custom JS-->
  <script src="js/vendor/modernizr-3.11.2.min.js"></script>
  <script src="js/plugins.js"></script>
  <script src="js/main.js"></script>

  <!-- Ionicons -->
  <script
    type="module"
    src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"
  ></script>
  <script
    nomodule
    src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"
  ></script>
</body>
  {{-- <section class="section-A">
    <div class="contain">
      @if ($user->user_type === 'college')
        <div class="buttons">
          <a class="btn btn-secondary-dark" href="{{ route('create-proposal') }}"
            >Create Proposal</a
          >
        </div>
      @else
        @if ($user->user_type === 'rmo')
          <div class="buttons">
            <a class="btn btn-secondary-dark" href="{{ route('partners') }}"
              >Go to Partners</a
            >
          </div>
        @endif
      @endif

      <div class="grid-2">
        <div class="proposal">
          @if ($user->user_type === 'college')       
            @if ($proposals->count())
                <ul>
                    @foreach ($proposals as $proposal) 
                        <a href="{{ route('proposal', $proposal->id) }}">
                            <li class="proposal-item center-row">
                            <div class="left">
                                <h2 class="text-l">{{ $proposal->proposal_title }}</h2>
                                <p class="text-s">Project Duration: {{ $proposal->proposal_duration }} Month/s</p>
                                <p class="text-s">Project Leader: {{ $proposal->proposal_leader }}</p>
                            </div>
                            <div class="right">
                                <p class="text-s status pending">
                                    
                                    {{ $proposal->proposal_status }}
                                </p>
                                <p class="text-s date">{{ $proposal->updated_at }}</p>
                            </div>
                            </li>
                        </a>
                    @endforeach
                </ul>
            @else
                There are no posts
            @endif              
          @else
              @if ($user->user_type === 'rio')
                  @if ($proposalsRIO->count())
                    <ul>
                        @foreach ($proposalsRIO as $proposal)
                            <a href="{{ route('proposal', $proposal->id) }}">
                              @if($proposal->proposal_read == 'new')
                                <li class="proposal-item center-row green-border">
                              @else
                                <li class="proposal-item center-row default-border">
                              @endif
                                <div class="left">
                                    <h2 class="text-l">{{ $proposal->proposal_title }}</h2>
                                    <p class="text-s">Project Duration: {{ $proposal->proposal_duration }} Month/s</p>
                                    <p class="text-s">Project Leader: {{ $proposal->proposal_leader }}</p>
                                </div>
                                <div class="right">
                                    <p class="text-s status pending">
                                        
                                        {{ $proposal->proposal_status }}
                                    </p>
                                    <p class="text-s date">{{ $proposal->updated_at }}</p>
                                </div>
                                </li>
                            </a>
                        @endforeach
                    </ul>
                  @else
                    There are no post
                  @endif
              @else
                @if($user->user_type === 'rmo')
                  @if ($proposalsRMO->count())
                    <ul>
                        @foreach ($proposalsRMO as $proposal)
                            <a href="{{ route('proposal', $proposal->id) }}">
                                <li class="proposal-item center-row">
                                  <div class="left">
                                      <h2 class="text-l">{{ $proposal->proposal_title }}</h2>
                                      <p class="text-s">Project Duration: {{ $proposal->proposal_duration }} Month/s</p>
                                      <p class="text-s">Project Leader: {{ $proposal->proposal_leader }}</p>
                                  </div>
                                  <div class="right">
                                      <p class="text-s status pending">
                                          
                                          {{ $proposal->proposal_status }}
                                      </p>
                                      <p class="text-s date">{{ $proposal->updated_at }}</p>
                                  </div>
                                </li>
                            </a>
                        @endforeach
                    </ul>
                  @else
                      <div>No post</div>
                  @endif
                @endif
              @endif
          @endif
        </div>
        <div class="search-list">
          <input
            class="search-block"
            type="text"
            placeholder="Search proposals..."
            value=""
          />
        </div>
      </div>
    </div>
  </section> --}}
@endsection