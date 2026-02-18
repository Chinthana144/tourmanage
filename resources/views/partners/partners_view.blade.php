@extends('layouts.layout')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>
                Partners
                <button class="btn btn-primary btn-sm float-end" id="btn_add_partner">Add Partner</button>
            </h5>
        </div>
        <div class="card-body">
            <table class="table" id="tbl_partners">
                <tr>
                    <th>Logo</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
                @foreach ($partners as $partner)
                    <tr>
                        <td>
                            <img src="{{ asset('images/main/partners/' . $partner->logo) }}" alt="logo" style="width: 100px; height:auto;">
                        </td>
                        <td>{{ $partner->name }}</td>
                        <td>{{ $partner->description }}</td>
                        <td>
                            @if ($partner->status == 1)
                                <span class="badge bg-success">Display</span>
                            @else
                                <span class="badge bg-secondary">Not Displayed</span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex">
                                <button class="btn btn-warning btn-sm btn_edit_partner" data-id="{{ $partner->id }}"><i class="bx bx-edit"></i></button>
                                <form action="{{ route('partners.destroy') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="hide_partner_id" value="{{ $partner->id }}">
                                    <button class="btn btn-danger btn-sm ms-1"><i class="bx bx-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

    @include('partners.add_partner_modal')
    @include('partners.edit_partner_modal')

    <script src="{{ asset('js/partners.js') }}"></script>
@endsection
