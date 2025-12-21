@extends('layouts.layout')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>
                Customers
                <button class="btn btn-primary btn-sm float-end" id="btn_open_add_customer">Add Customer</button>
            </h5>
        </div>
        <div class="card-body">
            <table class="table" id="tbl_customers">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Country</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($customers as $customer)
                        <tr data-id="{{ $customer->id }}">
                            <td>{{ $customer->id }}</td>
                            <td>{{ $customer->first_name }}</td>
                            <td>{{ $customer->last_name }}</td>
                            <td>{{ $customer->email }}</td>
                            <td>{{ $customer->phone_number }}</td>
                            <td>
                                <img src="{{ asset('images/countries/' . $customer->country->flag) }}" alt="" style="width: 25px; height: 15px;">
                                {{ $customer->country->name }}
                            </td>
                            <td>
                                <div class="d-flex">
                                    <button class="btn btn-sm btn-info btn_edit_customer"><i class="bx bx-edit"></i></button>
                                    <form action="{{ route('tour_requests.create') }}" method="get">
                                        @csrf
                                        <input type="hidden" name="hide_customer_id" value="{{ $customer->id }}">
                                        <button type="submit" class="btn btn-success btn-sm"><i class="bx bx-plus"></i> Tour Request</button>
                                    </form>
                                </div>
                                
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @include('customers.customer_add_modal')
    @include('customers.customer_edit_modal')

    <script src="{{ asset('js/customer_view.js') }}"></script>
@endsection
