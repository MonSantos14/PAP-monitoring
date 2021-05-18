@extends('index')

@section('content')
<section class="section-A">
    <div class="contain">
      <div class="buttons">
        <a class="btn btn-secondary-dark" href="{{ route('create-proposal') }}"
          >Create Proposal</a
        >
        <a class="btn btn-secondary-dark" href="{{ route('faculty') }}"
          >Go to Faculty</a
        >
      </div>

      <div class="grid-2">
        <div class="proposal">

            <ul class="proposal-collection">
                
              </ul>
            @if ($proposals->count())
                <ul>
                    @foreach ($proposals as $proposal)
                        <a href="proposal.html">
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
  </section>
@endsection