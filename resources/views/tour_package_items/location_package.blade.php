<ul class="nav nav-tabs" id="packageTabs" role="tablist">
    <li class="nav-item" role="presentation">
        <button class="nav-link active"
                id="standard-tab"
                data-bs-toggle="tab"
                data-bs-target="#standard"
                type="button"
                role="tab">
            Akagi Essential
        </button>
    </li>

    <li class="nav-item" role="presentation">
        <button class="nav-link"
                id="comfort-tab"
                data-bs-toggle="tab"
                data-bs-target="#comfort"
                type="button"
                role="tab">
            Akagi Classic
        </button>
    </li>

    <li class="nav-item" role="presentation">
        <button class="nav-link"
                id="premium-tab"
                data-bs-toggle="tab"
                data-bs-target="#premium"
                type="button"
                role="tab">
            Akagi Signature
        </button>
    </li>
</ul>

<div class="tab-content mt-3" id="packageTabsContent">
    <!-- Standard -->
    <div class="tab-pane fade show active" id="standard" role="tabpanel">
        <h5>Location Essential Package</h5>
        <p>Basic hotels, shared transport, standard meals.</p>

        {{-- You can load blade partial here --}}
        {{-- @include('tour.packages.standard') --}}
    </div>

    <!-- Comfort -->
    <div class="tab-pane fade" id="comfort" role="tabpanel">
        <h5>Location Classic Package</h5>
        <p>3 to 4 star hotels, private transport, upgraded meals.</p>

        {{-- @include('tour.packages.comfort') --}}
    </div>

    <!-- Premium -->
    <div class="tab-pane fade" id="premium" role="tabpanel">
        <h5>Location Signature Package</h5>
        <p>Luxury hotels, private guide, premium experiences.</p>

        {{-- @include('tour.packages.premium') --}}
    </div>
</div>