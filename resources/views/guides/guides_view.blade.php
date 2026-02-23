@extends('layouts.layout')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>
                Guides
                <button class="btn btn-primary btn-sm float-end" id="btn_add_guide">Add Guider</button>
            </h5>
        </div>
        <div class="card-body">
            <p>content</p>
        </div>
    </div>

    @include('guides.add_guide_modal')

    <script src="{{ asset('js/guide_view.js') }}"></script>
@endsection
