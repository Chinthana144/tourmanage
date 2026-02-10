<?php

namespace App\Http\Controllers;

use App\Models\BoardingType;
use App\Models\Cities;
use App\Models\Districts;
use App\Models\Facilities;
use App\Models\HotelFacilities;
use App\Models\HotelPrices;
use App\Models\Hotels;
use App\Models\PriceModes;
use App\Models\Provinces;
use App\Models\Seasons;
use App\Models\TourPackages;
use App\Models\TravelCountries;
use Illuminate\Http\Request;

class Hotelcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hotels = Hotels::where('status', 1)
            ->paginate(5);

        return view('hotels.hotel_view', compact('hotels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $travel_countries = TravelCountries::all();
        return view('hotels.hotel_create', compact('travel_countries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $hotel = new Hotels();
        $hotel->name = $request->input('txt_hotel_name');
        $hotel->address = $request->input('txt_hotel_address');
        $hotel->phone = $request->input('txt_hotel_phone');
        $hotel->email = $request->input('txt_hotel_email');
        $hotel->website = $request->input('txt_hotel_website');
        $hotel->star_rating = $request->input('star_rating');
        $hotel->popularity = $request->input('popularity');
        $hotel->status = 1; //active

        // Handle file uploads
        if ($request->hasFile('cover_image')) {
            $file = $request->file('cover_image');
            $filename = 'H_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/hotels'), $filename);
            $hotel->cover_image = $filename;
        }
        if ($request->hasFile('image_1')) {
            $file = $request->file('image_1');
            $filename = 'H1_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/hotels'), $filename);
            $hotel->image1 = $filename;
        }
        if ($request->hasFile('image_2')) {
            $file = $request->file('image_2');
            $filename = 'H2_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/hotels'), $filename);
            $hotel->image2 = $filename;
        }

        $hotel->save();

        return redirect()->route('hotels.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $travel_countries = TravelCountries::all();
        $hotel_id = $request->input('hide_hotel_id');
        $hotel = Hotels::find($hotel_id);
        return view('hotels.hotel_edit', compact('hotel', 'travel_countries'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $hotel_id = $request->input('hide_hotel_id');

        $hotel = Hotels::find($hotel_id);
        $hotel->name = $request->input('txt_hotel_name');
        $hotel->address = $request->input('txt_hotel_address');
        $hotel->phone = $request->input('txt_hotel_phone');
        $hotel->email = $request->input('txt_hotel_email');
        $hotel->website = $request->input('txt_hotel_website');
        $hotel->star_rating = $request->input('star_rating');
        $hotel->popularity = $request->input('popularity');
        $hotel->status = 1; //active

        // Handle file uploads
        if ($request->hasFile('cover_image')) {
            $oldImagePath = public_path('images/hotels/'. $hotel->cover_image);
            if (file_exists($oldImagePath) && !is_null($hotel->cover_image)) {
                unlink($oldImagePath);  // Delete the old image file
            }
            $file = $request->file('cover_image');
            $filename = 'H_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/hotels'), $filename);
            $hotel->cover_image = $filename;
        }

        if ($request->hasFile('image_1')) {
            $oldImagePath = public_path('images/hotels/'. $hotel->image1);
            if (file_exists($oldImagePath) && !is_null($hotel->image1)) {
                unlink($oldImagePath);  // Delete the old image file
            }
            $file = $request->file('image_1');
            $filename = 'H1_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/hotels'), $filename);
            $hotel->image1 = $filename;
        }
        if ($request->hasFile('image_2')) {
            $oldImagePath = public_path('images/hotels/'. $hotel->image2);
            if (file_exists($oldImagePath) && !is_null($hotel->image2)) {
                unlink($oldImagePath);  // Delete the old image file
            }
            $file = $request->file('image_2');
            $filename = 'H2_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/hotels'), $filename);
            $hotel->image2 = $filename;
        }

        $hotel->save();

        return redirect()->route('hotels.index')->with('success', 'Hotel updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    /*
    * remove status
    */
    public function remove(Request $request)
    {
        $hotel_id = $request->input('hide_hotel_id');

        $hotel = Hotels::find($hotel_id);
        $hotel->status = 0;

        $hotel->save();

        return redirect()->route('hotels.index')->with('success', 'Hotel removed successfully.');
    }//remove

    //get hotels
    public function getHotels(){
        $hotels = Hotels::where('status', 1)->get();

        return response()->json($hotels);
    }

//======================================== Hotel Prices =======================================//
    public function showHotelPrices(Request $request)
    {
        $hotel_id = $request->input('hide_hotel_id');
        $hotel = Hotels::find($hotel_id);

        $hotel_prices = HotelPrices::where('hotel_id', $hotel_id)->paginate(10);

        //get necessary data
        $seasons = Seasons::all();
        $packages = TourPackages::all();
        $price_modes = PriceModes::all();
        $boarding_types = BoardingType::all();

        return view('hotels.hotel_price_view', compact('hotel', 'hotel_prices', 'seasons', 'packages', 'price_modes', 'boarding_types'));
    }//show hotel prices

    public function storeHotelPrice(Request $request)
    {
        $hotel_id = $request->input('hide_hotel_id');

        $hotel_price = HotelPrices::create([
            'hotel_id' => $hotel_id,
            'season_id' => $request->input('cmb_season'),
            'package_id' => $request->input('cmb_package'),
            'price_mode_id' => $request->input('cmb_price_mode'),
            'bording_type_id' => $request->input('cmb_boarding_type'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'is_compulsory' =>$request->has('chk_compulsory'),
            'status' => 1,
        ]);

        if($hotel_price){
            return redirect()->route('hotel_price.view', ['hide_hotel_id' => $hotel_id])
                ->with('success', 'Hotel Price added successfully!');
        }//ok
        else{
            return redirect()->route('hotel_price.view', ['hide_hotel_id' => $hotel_id])
                ->with('error', 'Hotel Price added failed!');
        }
        
    }//store hotel price

    public function updateHotelPrice(Request $request)
    {
        $price_id = $request->input('hide_price_id');
        $hotel_price = HotelPrices::find($price_id);

        $hotel_id = $hotel_price->hotel_id;

        $hotel_price->season_id = $request->input('cmb_edit_season');
        $hotel_price->package_id = $request->input('cmb_edit_package');
        $hotel_price->price_mode_id = $request->input('cmb_edit_price_mode');
        $hotel_price->bording_type_id = $request->input('cmb_edit_boarding_type');
        $hotel_price->description = $request->input('edit_description');
        $hotel_price->price = $request->input('edit_price');
        $hotel_price->is_compulsory = $request->has('chk_edit_compulsory') ? 1 : 0 ;

        $hotel_price->save();

        return redirect()->route('hotel_price.view', ['hide_hotel_id' => $hotel_id])
                ->with('success', 'Hotel Price added successfully!');        
    }//update hotel price

    public function getOneHotelPrice(Request $request)
    {
        $price_id = $request->input('price_id');
        $hotel_price = HotelPrices::find($price_id);

        return response()->json([
            'id' => $hotel_price->id,
            'season_id' => $hotel_price->season_id,
            'package_id' =>$hotel_price->package_id,
            'price_mode_id' => $hotel_price->price_mode_id,
            'bording_type_id' => $hotel_price->bording_type_id,
            'description' => $hotel_price->description,
            'price' => $hotel_price->price,
            'is_compulsory' => $hotel_price->is_compulsory,
            'status' => $hotel_price->status,
        ]);

    }//get one hotel price

    //get boarding types
    public function getBoardingTypes()
    {
        $boarding_types = BoardingType::all();

        return response()->json($boarding_types);
    }
}//class
