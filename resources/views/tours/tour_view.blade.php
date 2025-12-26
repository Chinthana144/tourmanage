@extends('layouts.layout')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>
                Tours
            </h5>
        </div>
        <div class="card-body">
            <table class="table" id="tbl_tours">
                <tr>
                    <th>Title</th>
                    <th>Date</th>
                    <th>Days</th>
                    <th>People</th>
                    <th>Price</th>
                    <th>Grand Total</th>
                    <th>Action</th>
                </tr>
                @foreach ($tours as $tour)
                    <tr data-id = "{{ $tour->id }}">
                        <td>
                            {{ $tour->tour_number }} <br>
                            {{ $tour->title }}
                        </td>
                        <td>
                            Start: <b>{{ $tour->start_date }}</b>
                            <br>
                            End: <b>{{ $tour->end_date }}</b>
                        </td>
                        <td>
                            Days: <b>{{ $tour->total_days }}</b>
                            <br>
                            Night: <b>{{ $tour->total_nights }}</b>
                        </td>
                        <td>
                            Adults: <b>{{ $tour->adults }}</b>
                            <br>
                            Children: <b>{{ $tour->children }}</b>
                        </td>
                        <td>
                            Sub Total: <b>{{ $tour->sub_total }}</b>
                            <br>
                            Discount: <b>{{ $tour->discount_amount }}</b>
                            <br>
                            Tax: <b>{{ $tour->tax_amount }}</b>
                        </td>
                        <td>{{ $tour->grand_total }}</td>
                        <td>
                            <button class="btn btn-warning btn-sm btn_edit_tour">Edit</button>
                            <form action="{{ route('tour_route.index') }}" method="get">
                                @csrf
                                <input type="hidden" name="hide_tour_id" value="{{ $tour->id }}">
                                <button type="submit" class="btn btn-success btn-sm mt-2">Routes</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

    @include('tours.add_tour_modal')
    @include('tours.edit_tour_modal')

    <script src="{{ asset('js/tour_view.js') }}"></script>
@endsection
