<ul class="nav nav-tabs" id="packageTabs" role="tablist">
    <li class="nav-item" role="presentation">
        <button class="nav-link active"
                id="standard-tab"
                data-bs-toggle="tab"
                data-bs-target="#location_standard_{{$item['id']}}"
                type="button"
                role="tab">
            Akagi Essential
        </button>
    </li>

    <li class="nav-item" role="presentation">
        <button class="nav-link"
                id="comfort-tab"
                data-bs-toggle="tab"
                data-bs-target="#location_comfort_{{$item['id']}}"
                type="button"
                role="tab">
            Akagi Classic
        </button>
    </li>

    <li class="nav-item" role="presentation">
        <button class="nav-link"
                id="premium-tab"
                data-bs-toggle="tab"
                data-bs-target="#location_premium_{{$item['id']}}"
                type="button"
                role="tab">
            Akagi Signature
        </button>
    </li>
</ul>

<div class="tab-content mt-3" id="packageTabsContent">
    <!-- Standard -->
    <div class="tab-pane fade show active" id="location_standard_{{$item['id']}}" role="tabpanel">
        <h5>Location Essential Package</h5>

        <table class="table">
            @foreach ($item['essential_price'] as $price)
                <tr>
                    <td>{{$price['season']}}</td>
                    <td>{{$price['price_mode']}}</td>
                    <td>{{$price['description']}}</td>
                    <td>{{$price['price']}}</td>
                    <td>
                        <input type="checkbox" style="width:1.5rem; height:1.5rem;">
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

    <!-- Comfort -->
    <div class="tab-pane fade" id="location_comfort_{{$item['id']}}" role="tabpanel">
        <h5>Location Classic Package</h5>
        <p>3 to 4 star hotels, private transport, upgraded meals.</p>

        {{-- @include('tour.packages.comfort') --}}
    </div>

    <!-- Premium -->
    <div class="tab-pane fade" id="location_premium_{{$item['id']}}" role="tabpanel">
        <h5>Location Signature Package</h5>
        <p>Luxury hotels, private guide, premium experiences.</p>

        {{-- @include('tour.packages.premium') --}}
    </div>
</div>