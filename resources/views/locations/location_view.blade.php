@extends('layouts.layout')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/location.css') }}">

    <div class="card">
        <div class="card-header">
            <h5>
                Locations
                <a href="/create-location" class="btn btn-primary btn-sm float-end">Add New Location</a>
            </h5>
        </div>
        <div class="card-body">
            @foreach ($locations as $location)
                <div class="card mb-3">
                    <div class="card-header">
                        <h5>{{ $location->name }}</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-5">
                                <p><strong>Province:</strong> {{ $location->province_name }}</p>
                                <p><strong>District:</strong> {{ $location->district_name }}</p>
                                <p><strong>City:</strong> {{ $location->city_name }}</p>
                                <p><strong>Description:</strong> {{ $location->description }}</p>
                                <p><strong>Latitude:</strong> {{ $location->latitude }}</p>
                                <p><strong>Longitude:</strong> {{ $location->longitude }}</p>
                            </div>
                            <div class="col-md-5">
                                @if ($location->primary_image)
                                    <div id="div_primary_image" class="mb-2">
                                        <img src="{{ asset($location->primary_image) }}" alt="Location Image" id="img_main">
                                    </div>
                                @endif
                                <div id="div_gallary">
                                    @if ($location->image1)
                                        <div>
                                            <img src="{{ asset($location->image1) }}" alt="Image 1" class="img_gallery">
                                        </div>
                                    @endif

                                    @if ($location->image2)
                                        <div>
                                            <img src="{{ asset($location->image2) }}" alt="" class="img_gallery">
                                        </div>
                                    @endif

                                    @if ($location->image3)
                                        <div>
                                            <img src="{{ asset($location->image3) }}" alt="" class="img_gallery">
                                        </div>
                                    @endif

                                    @if ($location->image4)
                                        <div>
                                            <img src="{{ asset($location->image4) }}" alt="" class="img_gallery">
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-2">
                                @if ($location->display)
                                    <span class="badge bg-primary mb-1">Display in website</span>     
                                @else
                                    <span class="badge bg-secondary mb-1">Not displayed in website</span>  
                                @endif

                                <form action="{{ route('location.edit') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="hide_location_id" value="{{ $location->id }}">
                                    <button type="submit" class="btn btn-outline-warning mb-3"><i class="bx bx-edit"></i> Edit</button>
                                </form>

                                <form action="{{ route('location.deactivate') }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="hide_location_id" value="{{ $location->id }}">
                                    <button type="submit" class="btn btn-outline-danger"><i class="bx bx-trash"></i> Remove</button>
                                </form>

                                <form action="{{ route('activities.index') }}" method="get">
                                    @csrf
                                    <input type="hidden" name="hide_location_id" value="{{ $location->id }}">
                                    <button type="submit" class="btn btn-primary">Activities</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            <div>
                {{ $locations->links() }}
            </div>
        </div>
    </div>
@endsection
