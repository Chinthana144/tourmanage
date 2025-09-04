@extends('layouts.layout')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>
                Hotels
                <a href="{{ route('hotels.create') }}" class="btn btn-primary btn-sm float-end">Create Hotel</a>
            </h5>
        </div>
        <div class="card-body">
            <p>content</p>
        </div>
    </div>
@endsection
