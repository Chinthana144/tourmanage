@extends('layouts.layout')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>
                Users
                <button class="btn btn-outline-primary btn-sm float-end" id="btn_open_register_modal">Add User</button>
            </h5>
        </div>
        <div class="card-body">
            <p>content</p>
        </div>
    </div>

    @include('users.register_modal')

    <script src="{{ asset('js/users.js') }}"></script>
@endsection
