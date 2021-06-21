@extends('index')

@section('content')
    <section class="section-A">
        <div class="contain">
            <div class="between">
                <div class="buttons">
                <a class="btn btn-secondary-dark" href="{{ route('dashboard') }}"
                    >Go to Dashboard</a
                >
                </div>
                <input
                class="search"
                type="text"
                placeholder="Search proposals..."
                value=""
                />
            </div>

            <div class="width-2-5 self-center">
                <div class="rmo-proposal">
                    <ul class="proposal-collection">
                        @foreach ($drafts as $draft)
                        <div>
                            <a href="{{ route('draft-proposal', $draft->id) }}">
                                <li class="proposal-item center-row">
                                    <div class="left">
                                        <h2 class="text-l">{{ $draft->proposal_title }}</h2>
                                        <p class="text-s">Project Duration:{{ $draft->proposal_duration }}</p>
                                        <p class="text-s">Project Leader: {{ $draft->proposal_leader }}</p>
                                    </div>
                                    <div class="right">
                                        <p class="text-s status pending">{{ $draft->proposal_status }}</p>
                                        <p class="text-s date">20/04/2021</p>
                                    </div>
                                </li>
                            </a>
                        </div>
                        @endforeach
                        <div class="width-full block">
                            {{ $drafts->links() }}
                        </div>
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection