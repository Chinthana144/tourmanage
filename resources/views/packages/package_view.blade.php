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
                <div class="row mb-1 p-1">
                    <div class="col-md-2">
                        <img src="{{ asset('images/packages/' . $package->cover_image) }}" alt="" class="rounded w-100">
                    </div>
                    <div class="col-md-3">
                        <p>
                            {{$package->title}}
                            <br>
                            {{ $package->description }}
                        </p>
                    </div>
                    <div class="col-md-2">
                        <p>
                            Price per Persion: <strong>{{ $package->price_per_person }}</strong>
                            <br>
                            Duration: <strong>{{ $package->duration_days }}</strong>
                        </p>
                    </div>
                    <div class="col-md-2">
                        <p>
                            Start: <strong>{{ $package->availability_startdate }}</strong>
                            <br>
                            End: <strong>{{ $package->availability_enddate }}</strong>
                        </p>
                    </div>
                    <div class="col-md-1">
                        <form action="{{ route('packageroute.edit') }}" method="post">
                            @csrf
                            <input type="hidden" name="hide_package_id" value="{{ $package->id }}">
                            <button type="submit" class="btn btn-outline-success">Route</button>
                        </form>
                    </div>
                    <div class="col-md-2">
                        <form action="{{ route('package.edit') }}" method="post">
                            @csrf
                            <input type="hidden" name="hide_package_id" value="{{ $package->id }}">
                            <button type="submit" class="btn btn-outline-warning"><i class="bx bx-edit"></i></button>
                        </form>
                    </div>
                    
                </div>
                <hr>
            @endforeach
        </div>
    </div>
@endsection
