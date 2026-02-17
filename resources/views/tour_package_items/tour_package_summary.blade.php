@extends('layouts.layout')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Tour Package Summary</h5>
        </div>
        <div class="card-body">
            {{-- quotation form --}}
            <div class="container">
                <h5>Genarate Quotation</h5> 
                <form action="" method="post">
                    <input type="hidden" name="tour_id" value="{{$tour->id}}">
                    <input type="hidden" name="tour_request_id" value="{{$tour->tour_request_id}}"> 
                    <div class="row">
                        <div class="col-md-6">
                            <input type="date" name="valid_date" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-primary w-100">Generate Quotation</button>
                        </div>
                    </div>
                </form>
            </div>
            
            <hr>
            <div class="row">
                <div class="col-md-4">
                    <h5>Akagi Essential</h5>
                    <table class="table table-bordered">
                        @foreach ($essential_prices as $price)
                            <tr>
                                <td>
                                    @switch($price->component_type)
                                        @case('App\Models\Locations')
                                            <span class="badge bg-primary">Locations</span>
                                        @break
                                        @case('App\Models\Hotels')
                                            <span class="badge bg-success">Hotels</span>
                                        @break
                                        @case('App\Models\Restaurants')
                                            <span class="badge bg-warning">Restaurants</span>
                                        @break
                                        @case('App\Models\Activities')
                                            <span class="badge bg-info">Activities</span>
                                        @break
                                        @case('App\Models\TravelMedia')
                                            <span class="badge bg-secondary">Transport</span>
                                        @break
                                    @endswitch  
                                </td>
                                <td>{{ $price->total_price }}</td>
                            </tr>                        
                        @endforeach
                        <tr>
                            <th>Total</th>
                            <th>{{$essential_total}}</th>
                        </tr>
                    </table>
                    
                </div>

                {{-- classic price --}}
                <div class="col-md-4">
                    <h5>Akagi Essential</h5>
                    <table class="table table-bordered">
                        @foreach ($classic_prices as $price)
                            <tr>
                                <td>
                                    @switch($price->component_type)
                                        @case('App\Models\Locations')
                                            <span class="badge bg-primary">Locations</span>
                                        @break
                                        @case('App\Models\Hotels')
                                            <span class="badge bg-success">Hotels</span>
                                        @break
                                        @case('App\Models\Restaurants')
                                            <span class="badge bg-warning">Restaurants</span>
                                        @break
                                        @case('App\Models\Activities')
                                            <span class="badge bg-info">Activities</span>
                                        @break
                                        @case('App\Models\TravelMedia')
                                            <span class="badge bg-secondary">Transport</span>
                                        @break
                                    @endswitch  
                                </td>
                                <td>{{ $price->total_price }}</td>
                            </tr>                        
                        @endforeach
                        <tr>
                            <th>Total</th>
                            <th>{{$classic_total}}</th>
                        </tr>
                    </table>
                </div>

                {{-- Signature price --}}
                 <div class="col-md-4">
                    <h5>Akagi Essential</h5>
                    <table class="table table-bordered">
                        @foreach ($signature_prices as $price)
                            <tr>
                                <td>
                                    @switch($price->component_type)
                                        @case('App\Models\Locations')
                                            <span class="badge bg-primary">Locations</span>
                                        @break
                                        @case('App\Models\Hotels')
                                            <span class="badge bg-success">Hotels</span>
                                        @break
                                        @case('App\Models\Restaurants')
                                            <span class="badge bg-warning">Restaurants</span>
                                        @break
                                        @case('App\Models\Activities')
                                            <span class="badge bg-info">Activities</span>
                                        @break
                                        @case('App\Models\TravelMedia')
                                            <span class="badge bg-secondary">Transport</span>
                                        @break
                                    @endswitch  
                                </td>
                                <td>{{ $price->total_price }}</td>
                            </tr>                        
                        @endforeach
                        <tr>
                            <th>Total</th>
                            <th>{{$signature_total}}</th>
                        </tr>
                    </table>
                    
                </div>
            </div>

            <div class="row">
                {{-- Akagi Essential --}}
                <div class="col-md-4">
                    <h5>Akagi Essential</h5>
                    <table class="table table-bordered">
                        @foreach ($essential_packages as $package)
                        <tr>
                            <td>
                                @switch($package->component_type)
                                    @case('App\Models\Locations')
                                        <span class="badge bg-primary">{{$package->component->name}}</span>
                                    @break
                                    @case('App\Models\Hotels')
                                        <span class="badge bg-success">{{$package->component->name}}</span>
                                    @break
                                    @case('App\Models\Restaurants')
                                        <span class="badge bg-warning">{{$package->component->name}}</span>
                                    @break
                                    @case('App\Models\Activities')
                                        <span class="badge bg-info">{{$package->component->name}}</span>
                                    @break
                                    @case('App\Models\TravelMedia')
                                        <span class="badge bg-secondary">{{$package->component->name}}</span>
                                    @break
                                @endswitch  
                            </td>
                            <td>{{$package->description}}</td>
                            <td>{{$package->price}}</td>
                        </tr>
                        @endforeach
                        <tr>
                            <th colspan="2">Total</th>
                            <th>{{$essential_total}}</th>
                        </tr>
                    </table>
                </div>

                {{-- classic package --}}
                <div class="col-md-4">
                    <h5>Akagi Classic</h5>
                    <table class="table table-bordered">
                        @foreach ($classic_packages as $package)
                        <tr>
                            <td>
                                @switch($package->component_type)
                                    @case('App\Models\Locations')
                                        <span class="badge bg-primary">{{$package->component->name}}</span>
                                    @break
                                    @case('App\Models\Hotels')
                                        <span class="badge bg-success">{{$package->component->name}}</span>
                                    @break
                                    @case('App\Models\Restaurants')
                                        <span class="badge bg-warning">{{$package->component->name}}</span>
                                    @break
                                    @case('App\Models\Activities')
                                        <span class="badge bg-info">{{$package->component->name}}</span>
                                    @break
                                    @case('App\Models\TravelMedia')
                                        <span class="badge bg-secondary">{{$package->component->name}}</span>
                                    @break
                                @endswitch  
                            </td>
                            <td>{{$package->description}}</td>
                            <td>{{$package->price}}</td>
                        </tr>
                        @endforeach
                        <tr>
                            <th colspan="2">Total</th>
                            <th>{{$classic_total}}</th>
                        </tr>
                    </table>
                </div>

                {{-- signature package --}}
                <div class="col-md-4">
                    <h5>Akagi Signature</h5>
                    <table class="table table-bordered">
                        @foreach ($signature_packages as $package)
                        <tr>
                            <td>
                                @switch($package->component_type)
                                    @case('App\Models\Locations')
                                        <span class="badge bg-primary">{{$package->component->name}}</span>
                                    @break
                                    @case('App\Models\Hotels')
                                        <span class="badge bg-success">{{$package->component->name}}</span>
                                    @break
                                    @case('App\Models\Restaurants')
                                        <span class="badge bg-warning">{{$package->component->name}}</span>
                                    @break
                                    @case('App\Models\Activities')
                                        <span class="badge bg-info">{{$package->component->name}}</span>
                                    @break
                                    @case('App\Models\TravelMedia')
                                        <span class="badge bg-secondary">{{$package->component->name}}</span>
                                    @break
                                @endswitch  
                            </td>
                            <td>{{$package->description}}</td>
                            <td>{{$package->price}}</td>
                        </tr>
                        @endforeach
                        <tr>
                            <th colspan="2">Total</th>
                            <th>{{$signature_total}}</th>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
