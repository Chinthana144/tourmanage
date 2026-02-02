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
                                <p>
                                    <b>Description:</b><br>
                                    {{ $location->description }}
                                </p>

                                <label for="">Populatiry</label>
                                <div class="div_populatiry">
                                    <i class="icon_star star_one {{$location->popularity >= 1 ? 'bx bxs-star' : 'bx bx-star'}}" data-value="1"></i>
                                    <i class="icon_star star_two {{$location->popularity >= 2 ? 'bx bxs-star' : 'bx bx-star'}}" data-value="2"></i>
                                    <i class="icon_star star_three {{$location->popularity >= 3 ? 'bx bxs-star' : 'bx bx-star'}}" data-value="3"></i>
                                    <i class="icon_star star_four {{$location->popularity >= 4 ? 'bx bxs-star' : 'bx bx-star'}}" data-value="4"></i>
                                    <i class="icon_star star_five {{$location->popularity >= 5 ? 'bx bxs-star' : 'bx bx-star'}}" data-value="5"></i>
                                    <input type="hidden" name="popularity" id="popularity" value="{{$location->popularity}}">
                                </div>

                                <p class="mt-2">
                                    @if ($location->status == 1)
                                        <span class="badge bg-primary">Available</span>
                                    @else
                                        <span class="badge bg-secondary">Not Available</span>
                                    @endif
                                </p>

                                <p class="mt-2">
                                    @if ($location->display)
                                        <span class="badge bg-primary mb-1">Display in website</span>
                                    @else
                                        <span class="badge bg-secondary mb-1">Not displayed in website</span>
                                    @endif
                                </p>

                                <div class="row">
                                    <div class="col-md-6">
                                        <form action="{{ route('location.edit') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="hide_location_id" value="{{ $location->id }}">
                                            <button type="submit" class="btn btn-outline-warning w-100"><i class="bx bx-edit"></i> Edit</button>
                                        </form>
                                    </div>
                                    <div class="col-md-6">
                                        <form action="{{ route('location.deactivate') }}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="hide_location_id" value="{{ $location->id }}">
                                            <button type="submit" class="btn btn-outline-danger w-100"><i class="bx bx-trash"></i> Remove</button>
                                        </form>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-7">
                                <div class="div_image_container">
                                    <div class="img_slide">
                                        @if ($location->primary_image)
                                            <img src="{{ asset($location->primary_image) }}" alt="Location Image">
                                        @endif
                                    </div>
                                    <div class="div_image_gallery">
                                        <div class="div_gallery_items" data-image="{{$location->primary_image}}">
                                            @if ($location->primary_image)
                                                <img src="{{ asset($location->primary_image) }}" alt="Location Image">
                                            @endif
                                        </div>
                                        <div class="div_gallery_items" data-image="{{$location->image1}}">
                                            @if ($location->image1)
                                                <img src="{{ asset($location->image1) }}" alt="Image 1">
                                            @endif
                                        </div>
                                        <div class="div_gallery_items" data-image="{{$location->image2}}">
                                            @if ($location->image2)
                                                <img src="{{ asset($location->image2) }}" alt="Image 2">
                                            @endif
                                        </div>
                                        <div class="div_gallery_items" data-image="{{$location->image3}}">
                                            @if ($location->image3)
                                                <img src="{{ asset($location->image3) }}" alt="Image 3">
                                            @endif
                                        </div>
                                        <div class="div_gallery_items" data-image="{{$location->image4}}">
                                            @if ($location->image4)
                                                <img src="{{ asset($location->image4) }}" alt="Image 4">
                                            @endif
                                        </div>
                                    </div>
                                </div>
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

    <script src="{{ asset('js/location_view.js') }}"></script>
@endsection
