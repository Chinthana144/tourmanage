@extends('layouts.layout')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>
                Tourists
                <a href="/create-tourist" class="btn btn-primary btn-sm float-end">Add Tourist</a>
            </h5>
        </div>
        <div class="card-body">
            <table class="table" id="tbl_tourists">
                <tr>
                    <th>Profile</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>Passport</th>
                    <th>Country</th>
                    <th>Health</th>
                    <th>Edit</th>
                </tr>
                @foreach ($tourists as $tourist)
                    <tr data-id = "{{ $tourist->id }}">
                        <td>
                            <img src="{{ asset($tourist->profile_picture) }}" alt="" style="width: 70px; height:auto; object-fit:cover; border-radius:10px;">
                        </td>
                        <td>{{ $tourist->firstname ." ".$tourist->lastname }}</td>
                        <td>{{ $tourist->email }}</td>
                        <td>{{ $tourist->phone }}</td>
                        <td>{{ $tourist->passport_no }}</td>
                        <td>
                            <img src="{{ asset('images/countries/'. $tourist->country->flag) }}" alt="">
                            {{ $tourist->country->name }}
                        </td>
                        <td>
                            <button class="btn btn-outline-success btn-sm btn_tourist_health"><i class="bx bx-heart"></i></button>
                        </td>
                        <td>
                            <button class="btn btn-outline-warning btn-sm btn_tourist_edit"><i class="bx bx-edit"></i></button>
                        </td>
                    </tr>
                   
                @endforeach
            </table>
        </div>
    </div>

    @include('tourists.tourist_health_modal')
    @include('tourists.tourist_edit_modal')

    <script src="{{ asset('js/tourist_view.js') }}"></script>
@endsection
