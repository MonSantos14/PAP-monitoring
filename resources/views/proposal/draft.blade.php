@extends('index')

@section('content')
    <section class="section-A">
        <div class="contain">
            <div class="between">
                <div class="buttons">
                <a class="btn btn-secondary-dark" href="partners.html"
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
                        <div>
                            <a href="proposal.html">
                                <li class="proposal-item center-row">
                                    <div class="left">
                                        <h2 class="text-l">Project-1</h2>
                                        <p class="text-s">Project Duration:</p>
                                        <p class="text-s">Project Leader: Teamleader</p>
                                    </div>
                                    <div class="right">
                                        <p class="text-s status pending">Pending...</p>
                                        <p class="text-s date">20/04/2021</p>
                                    </div>
                                </li>
                            </a>
                        </div>
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection