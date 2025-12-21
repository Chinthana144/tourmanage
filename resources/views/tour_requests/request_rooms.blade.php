@extends('layouts.layout')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Hi {{ $customer->first_name }}, please add rooms.</h5>
        </div>
        <div class="card-body">
            <p>content</p>
        </div>
    </div>
@endsection
