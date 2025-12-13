<?php

namespace App\Http\Controllers;

use App\Models\Cities;
use App\Models\Districts;
use App\Models\Provinces;
use App\Models\Restaurants;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index()
    {
        $restaurants = Restaurants::all();

        return view('restaurants.restaurant_view', compact('restaurants'));
    }//index

    public function create()
    {
        $provinces = Provinces::all();

        return view('restaurants.restaurant_create', compact('provinces'));
    }//create

    public function store(Request $request)
    {
        $restaurant = new Restaurants();

        $restaurant->name = $request->input('txt_restaurant_name');
        $restaurant->address = $request->input('txt_restaurant_address');
        $restaurant->phone = $request->input('txt_restaurant_phone');
        $restaurant->website = $request->input('txt_restaurant_website');
        $restaurant->province_id = $request->input('cmb_province');
        $restaurant->district_id = $request->input('cmb_district');
        $restaurant->city_id = $request->input('cmb_city');
        $restaurant->latitude = $request->input('txt_restaurant_latitude');
        $restaurant->longitude = $request->input('txt_restaurant_longitude');
        $restaurant->opening_time = $request->input('txt_opening_time');
        $restaurant->closing_time = $request->input('txt_closing_time');

        // Handle file uploads
        if ($request->hasFile('cover_image')) {
            $file = $request->file('cover_image');
            $filename = 'R_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/restaurants'), $filename);
            $restaurant->cover_image = $filename;
        }
        if ($request->hasFile('image_1')) {
            $file = $request->file('image_1');
            $filename = 'R1_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/restaurants'), $filename);
            $restaurant->image1 = $filename;
        }
        if ($request->hasFile('image_2')) {
            $file = $request->file('image_2');
            $filename = 'R2_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/restaurants'), $filename);
            $restaurant->image2 = $filename;
        }

        $restaurant->save();

        return redirect()->route('restaurants.index')->with('success', 'Restaurant created successfully.');
    }//store

    public function edit(Request $request)
    {   
        $restaurant_id = $request->input('hdie_restaurant_id');
        $restaurant = Restaurants::find($restaurant_id);

        $province_id = $restaurant->province_id;
        $district_id = $restaurant->district_id;
        $city_id = $restaurant->city_id;

        $provinces = Provinces::all();
        $districts = Districts::where('province_id', $province_id)->get();
        $cities = Cities::where('district_id', $district_id)->get();

        return view('restaurants.restaurant_edit', compact('provinces', 'districts', 'cities', 'restaurant'));
    }//edit

    public function update(Request $request)
    {
        $restaurant_id = $request->input('hide_restaurant_id');
        $restaurant = Restaurants::find($restaurant_id);

        $restaurant->name = $request->input('txt_restaurant_name');
        $restaurant->address = $request->input('txt_restaurant_address');
        $restaurant->phone = $request->input('txt_restaurant_phone');
        $restaurant->website = $request->input('txt_restaurant_website');
        $restaurant->province_id = $request->input('cmb_province');
        $restaurant->district_id = $request->input('cmb_district');
        $restaurant->city_id = $request->input('cmb_city');
        $restaurant->latitude = $request->input('txt_restaurant_latitude');
        $restaurant->longitude = $request->input('txt_restaurant_longitude');
        $restaurant->opening_time = $request->input('txt_opening_time');
        $restaurant->closing_time = $request->input('txt_closing_time');

        // Handle file uploads
        if ($request->hasFile('cover_image')) {
            $oldImagePath = public_path('images/restaurants/'. $restaurant->cover_image);
            if (file_exists($oldImagePath) && !is_null($restaurant->cover_image)) {
                unlink($oldImagePath);  // Delete the old image file
            }
            $file = $request->file('cover_image');
            $filename = 'R_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/restaurants'), $filename);
            $restaurant->cover_image = $filename;
        }

        if ($request->hasFile('image_1')) {
            $oldImagePath = public_path('images/restaurants/'. $restaurant->image1);
            if (file_exists($oldImagePath) && !is_null($restaurant->image1)) {
                unlink($oldImagePath);  // Delete the old image file
            }
            $file = $request->file('image_1');
            $filename = 'R1_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/restaurants'), $filename);
            $restaurant->image1 = $filename;
        }

        if ($request->hasFile('image_2')) {
            $oldImagePath = public_path('images/restaurants/'. $restaurant->image2);
            if (file_exists($oldImagePath) && !is_null($restaurant->image2)) {
                unlink($oldImagePath);  // Delete the old image file
            }
            $file = $request->file('image_1');
            $filename = 'R2_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/restaurants'), $filename);
            $restaurant->image2 = $filename;
        }

        $restaurant->save();

        return redirect()->route('restaurants.index')->with('success', 'Restaurant updated successfully.');
    }//update
}//class
