@extends('index')

@section('content')
<section class="section-A">
    <div class="contain">
      <div class="buttons">
        <a class="btn btn-default" href="{{ route('dashboard') }}" class="btn">Go Back</a>
      </div>

        <div class="center-column">
            <div class="width-3 self-center">
                <form action="{{ route('create-proposal')}}" method="post" class="faculty-form">
                    @csrf
                    <h2 class="text-xl px-1">
                        <span class="text-primary">Create</span> Project Proposal
                    </h2>
                    @error('proposal_title')
                        <div class="text-warning-plain">
                            {{$message}}
                        </div>
                    @enderror
                    <div class="form-control">
                        <input
                        class="input"
                        type="text"
                        name="proposal_title"
                        id="proposal_title"
                        onkeyup="this.setAttribute('value', this.value);"
                        value=""
                        />
                        <label class="label" for="proposal_title">Project Title</label>
                    </div>
                    @error('proposal_duration')
                        <div class="text-warning-plain">
                            {{$message}}
                        </div>
                    @enderror
                    <div class="form-control">
                        <input
                        class="input"
                        type="number"
                        name="proposal_duration"
                        id="proposal_duration"
                        onkeyup="this.setAttribute('value', this.value);"
                        value=""
                        />
                        <label class="label" for="proposal_duration">Project Duration (Month/s)</label>
                    </div>
                    {{-- @error('proposal_leader')
                        <div class="text-warning-plain">
                            {{$message}}
                        </div>
                    @enderror
                    <div class="form-control">
                        <input
                        class="input"
                        type="text"
                        name="proposal_leader"
                        id="proposal_leader"
                        onkeyup="this.setAttribute('value', this.value);"
                        value=""
                        />
                        <label class="label" for="proposal_leader">Project Leader</label>
                    </div> --}}

                    <div>
                        <input class="block" type="file" accept=".pdf" name="proposal_CRP">
                        <label for="proposal_CRP">Capsule Research Proposal</label>
                        <input class="block" type="file" accept=".pdf" name="proposal_LIB">
                        <label for="proposal_LIB">Line Item Budget</label>
                        <input class="block" type="file" accept=".pdf" name="proposal_CVP">
                        <label for="proposal_CVP">Curriculum Vitae of the Program/Project Leader</label>
                        <input class="block" type="file" accept=".pdf" name="proposal_SDRPM">
                        <label for="proposal_SDRPM">Curriculum Vitae of the Program/Project Leader</label>
                        <input class="block" type="file" accept=".pdf" name="proposal_CERT">
                        <label for="proposal_CERT">Certification</label>
                        <input class="block" type="file" accept=".pdf" name="proposal_WP">
                        <label for="proposal_WP">Work Plan</label>
                    </div>

                    <button class="btn btn-secondary" type="submit">
                        Create Proposal
                    </button>
                </form>
            </div>
        </div>
    </div>
  </section>
@endsection