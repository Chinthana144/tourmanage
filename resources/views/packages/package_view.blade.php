@extends('layouts.layout')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>
                Travel Packages
                <a href="/create-package" class="btn btn-primary btn-sm float-end">Create New Package</a>
            </h5>
        </div>
        <div class="card-body">
            @foreach ($packages as $package)
                <div class="row">
                    <div class="col-md-2">
                        <img src="{{$package->cover_image}}" alt="" style="width: 100%; height:auto;">
                    </div>
                    <div class="col-md-4">
                        <p>
                            {{$package->title}}
                        </p>
                    </div>
                    <div class="col-md-2">
                        <form action="{{ route('packageroute.edit') }}" method="post">
                            @csrf
                            <input type="hidden" name="hide_package_id" value="{{ $package->id }}">
                            <button type="submit" class="btn btn-outline-warning">Route</button>
                        </form>
                    </div>
                    
                </div>
            @endforeach
        </div>
    </div>
@endsection
