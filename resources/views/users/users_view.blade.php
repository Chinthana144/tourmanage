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
            <table class="table" id="users_table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Profile</th>
                        <th>Role</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr data-id="{{ $user->id }}">
                            <td>{{ $user->id }}</td>
                            <td>
                                <img src="{{ asset($user->profile_picture) }}" alt="profile image" style="width: 50px; height:auto; border-radius:50%; object-fit:cover;">
                            </td>
                            <td>{{ $user->role->role }}</td>
                            <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone1 }} <br> {{ $user->phone2 }} </td>
                            <td>
                                @if ($user->status == 1)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-danger">Inactive</span>
                                @endif
                            </td>
                            <td>
                                <button class="btn btn-sm btn-outline-warning btn_edit_user"><i class="bx bx-edit"></i></button>
                                <button class="btn btn-sm btn-outline-danger"><i class="bx bx-trash"></i></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @include('users.register_modal')
    @include('users.user_edit_modal')

    <script src="{{ asset('js/users.js') }}"></script>
@endsection
