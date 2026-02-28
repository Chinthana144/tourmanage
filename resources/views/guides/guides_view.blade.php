@extends('layouts.layout')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>
                Guides
                <button class="btn btn-primary btn-sm float-end" id="btn_add_guide">Add Guider</button>
            </h5>
        </div>
        <div class="card-body">
            <table class="table" id="tbl_guides">
                <tr>
                    <th>Profile</th>
                    <th>Name</th>
                    <th>Contact</th>
                    <th>Languages</th>
                    <th>Rate</th>
                    <th>Travel</th>
                    <th>Action</th>
                </tr>
                @foreach ($guides as $guide)
                    <tr>
                        <td>
                            <img src="{{ asset('images/guides/' . $guide->profile_image) }}" alt="" style="width: 100px; height:auto;">
                        </td>
                        <td>{{ $guide->name }}</td>
                        <td>
                            {{ $guide->phone }} <br>
                            {{ $guide->email }}
                        </td>
                        <td>
                            @php
                                $language = json_decode($guide->languages);
                            @endphp
                            @if ($language->english == 1)
                                <span class="badge bg-primary">English</span> <br>
                            @endif
                            @if ($language->japanese == 1)
                                <span class="badge bg-primary">Japanese</span> <br>
                            @endif
                            @if ($language->sinhala == 1)
                                <span class="badge bg-primary">Sinhala</span> <br>
                            @endif
                            @if ($language->tamil == 1)
                                <span class="badge bg-primary">Tamil</span> <br>
                            @endif
                        </td>
                        <td>
                            <div class="div_guide_rate">
                                <i class="icon_star star_one {{ $guide->rate >=1 ? 'bx bxs-star':'bx bx-star' }}" data-value="1"></i>
                                <i class="icon_star star_two {{ $guide->rate >=2 ? 'bx bxs-star':'bx bx-star' }}" data-value="2"></i>
                                <i class="icon_star star_three {{ $guide->rate >=3 ? 'bx bxs-star':'bx bx-star' }}" data-value="3"></i>
                                <i class="icon_star star_four {{ $guide->rate >=4 ? 'bx bxs-star':'bx bx-star' }}" data-value="4"></i>
                                <i class="icon_star star_five {{ $guide->rate >=5 ? 'bx bxs-star':'bx bx-star' }}" data-value="5"></i>
                                <input type="hidden" name="guide_rate" id="guide_rate" value="0">
                            </div>
                        </td>
                        <td>
                            @if ($guide->travel_media_id)
                                {{ $guide->travelMedia->name }}
                            @else
                                <span class="badge bg-secondary">No Travel Media</span>
                            @endif
                        </td>
                        <td>
                            <button class="btn btn-outline-warning btn-sm btn_edit_guide" data-id="{{ $guide->id }}"><i class="bx bx-edit"></i></button>
                            
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

    @include('guides.add_guide_modal')
    @include('guides.edit_guide_modal')

    <script src="{{ asset('js/guide_view.js') }}"></script>
@endsection
