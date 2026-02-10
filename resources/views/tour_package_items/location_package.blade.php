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
                    <td>
                        <input type="number" step="0.01" name="price_{{$item['id']}}_{{$price['id']}}" class="form-control txt_price" value="{{$price['price']}}">
                    </td>
                    <td>
                        @if ($price['is_complusory'] == 1)
                            <span class="badge bg-primary">Complusory</span>
                        @else
                            <span class="badge bg-secondary">optional</span>
                        @endif
                    </td>
                    <td>
                        <input
                            type="checkbox"
                            name="chk_price_{{$item['id']}}_{{$price['id']}}"
                            class="chk_price"
                            data-item-id ="{{ $item['id'] }}"
                            style="width:1.5rem; height:1.5rem;"
                        >
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

    <!-- Comfort -->
    <div class="tab-pane fade" id="location_comfort_{{$item['id']}}" role="tabpanel">
        <h5>Location Classic Package</h5>
        <table class="table">
            @foreach ($item['classic_price'] as $price)
                <tr>
                    <td>{{$price['season']}}</td>
                    <td>{{$price['price_mode']}}</td>
                    <td>{{$price['description']}}</td>
                    <td>
                        <input type="number" step="0.01" name="price_{{$item['id']}}_{{$price['id']}}" class="form-control txt_price" value="{{$price['price']}}">
                    </td>
                    <td>
                        @if ($price['is_complusory'] == 1)
                            <span class="badge bg-primary">Complusory</span>
                        @else
                            <span class="badge bg-secondary">optional</span>
                        @endif
                    </td>
                    <td>
                        <input
                            type="checkbox"
                            name="chk_price_{{$item['id']}}_{{$price['id']}}"
                            class="chk_price"
                            data-item-id ="{{ $item['id'] }}"
                            style="width:1.5rem; height:1.5rem;"
                        >
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

    <!-- Premium -->
    <div class="tab-pane fade" id="location_premium_{{$item['id']}}" role="tabpanel">
        <h5>Location Signature Package</h5>
        <table class="table">
            @foreach ($item['signature_price'] as $price)
                <tr>
                    <td>{{$price['season']}}</td>
                    <td>{{$price['price_mode']}}</td>
                    <td>{{$price['description']}}</td>
                    <td>
                        <input type="number" step="0.01" name="price_{{$item['id']}}_{{$price['id']}}" class="form-control txt_price" value="{{$price['price']}}">
                    </td>
                    <td>
                        @if ($price['is_complusory'] == 1)
                            <span class="badge bg-primary">Complusory</span>
                        @else
                            <span class="badge bg-secondary">optional</span>
                        @endif
                    </td>
                    <td>
                        <input
                            type="checkbox"
                            name="chk_price_{{$item['id']}}_{{$price['id']}}"
                            class="chk_price"
                            data-item-id ="{{ $item['id'] }}"
                            style="width:1.5rem; height:1.5rem;"
                        >
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</div>