<?php

namespace App\Http\Controllers;

use App\Models\Cities;
use App\Models\Districts;
use App\Models\MealTypes;
use App\Models\PriceModes;
use App\Models\Provinces;
use App\Models\RestaurantPrices;
use App\Models\Restaurants;
use App\Models\Seasons;
use App\Models\TourPackages;
use App\Models\TravelCountries;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index()
    {
        $restaurants = Restaurants::where('status', 1)->paginate(5);

        return view('restaurants.restaurant_view', compact('restaurants'));
    }//index

    public function create()
    {
        $travel_countries = TravelCountries::all();
        return view('restaurants.restaurant_create', compact('travel_countries'));
    }//create

    public function store(Request $request)
    {
        $restaurant = new Restaurants();

        $restaurant->travel_country_id = $request->input('cmb_travel_country');
        $restaurant->name = $request->input('txt_restaurant_name');
        $restaurant->address = $request->input('txt_restaurant_address');
        $restaurant->phone = $request->input('txt_restaurant_phone');
        $restaurant->website = $request->input('txt_restaurant_website');
        $restaurant->opening_time = $request->input('txt_opening_time');
        $restaurant->closing_time = $request->input('txt_closing_time');
        $restaurant->popularity = $request->input('popularity');
        $restaurant->status = 1; //active

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
        $restaurant_id = $request->input('hide_restaurant_id');
        $restaurant = Restaurants::find($restaurant_id);

        $travel_countries = TravelCountries::all();

        return view('restaurants.restaurant_edit', compact('restaurant', 'travel_countries'));
    }//edit

    public function update(Request $request)
    {
        $restaurant_id = $request->input('hide_restaurant_id');
        $restaurant = Restaurants::find($restaurant_id);

        $restaurant->travel_country_id = $request->input('cmb_travel_country');
        $restaurant->name = $request->input('txt_restaurant_name');
        $restaurant->address = $request->input('txt_restaurant_address');
        $restaurant->phone = $request->input('txt_restaurant_phone');
        $restaurant->website = $request->input('txt_restaurant_website');
        $restaurant->opening_time = $request->input('txt_opening_time');
        $restaurant->closing_time = $request->input('txt_closing_time');
        $restaurant->popularity = $request->input('popularity');
        $restaurant->status = 1; //active

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

    public function remove(Request $request)
    {
        $restaurant_id = $request->input('hide_restaurant_id');
        $restaurant = Restaurants::find($restaurant_id);

        $restaurant->status = 0;

        $restaurant->save();

        return redirect()->route('restaurants.index')->with('success', 'Restaurant removed successfully.');
    }

    //AJAX methods
    public function getRestaurants()
    {
        $restaurants = Restaurants::where('status', 1)->get();

        return response()->json($restaurants);
    }//get restaurants

    public function getOneRestaurant(Request $request)
    {
        $restaurant_id = $request->input('restaurant_id');

        $restaurant = Restaurants::find($restaurant_id);

        return response()->json($restaurant);
    }//get one restaurant

//============================================ Restaurants Prices ========================================//
    public function showRestaurantPrices(Request $request)
    {
        $restaurant_id = $request->input('restaurant_id');
        $restaurant = Restaurants::find($restaurant_id);

        $restaurant_prices = RestaurantPrices::where('restaurant_id', $restaurant_id)->paginate(10);

        //get necessary data
        $seasons = Seasons::all();
        $packages = TourPackages::all();
        $price_modes = PriceModes::all();
        $meal_types = MealTypes::all();

        return view('restaurants.restaurant_price_view', compact('restaurant', 'restaurant_prices', 'meal_types', 'seasons', 'packages', 'price_modes'));
    }//show restaurant price

    public function storeRestaurantPrice(Request $request)
    {
        $restaurant_id = $request->input('hide_restaurant_id');

        $restaurant_price = RestaurantPrices::create([
            'restaurant_id' => $restaurant_id,
            'season_id' => $request->input('cmb_season'),
            'package_id' => $request->input('cmb_package'),
            'price_mode_id' => $request->input('cmb_price_mode'),
            'meal_type_id' => $request->input('cmb_meal_type'),
            'description' => $request->input('description'),
            'price' => $request->input('price'), 
            'is_compulsory' => $request->has('chk_compulsory') ? 1 : 0, 
            'status' => 1, //active status
        ]);

        if($restaurant_price)
        {
            return redirect()->route('restaurant_price.view', ['restaurant_id' => $restaurant_id])
                ->with('success', 'Restaurant price added successfully!');
        }
        else{
            return redirect()->route('restaurant_price.view', ['restaurant_id' => $restaurant_id])
                ->with('error', 'Restaurant price add failed!');
        }
    }//store restaurant price

    public function updateRestaurantPrice(Request $request)
    {
        $price_id = $request->input('hide_price_id');
        $restaurant_price = RestaurantPrices::find($price_id);
        $restaurant_id = $restaurant_price->restaurant_id;

        $restaurant_price->season_id = $request->input('cmb_edit_season');
        $restaurant_price->package_id = $request->input('cmb_edit_package');
        $restaurant_price->price_mode_id = $request->input('cmb_edit_price_mode');
        $restaurant_price->meal_type_id = $request->input('cmb_edit_meal_type');
        $restaurant_price->description = $request->input('edit_description');
        $restaurant_price->price = $request->input('edit_price');
        $restaurant_price->is_compulsory = $request->has('chk_edit_compulsory') ? 1 : 0;

        $restaurant_price->save();

        return redirect()->route('restaurant_price.view', ['restaurant_id'=> $restaurant_id])
            ->with('success', 'Restaurant price updated successfully!');

    }//update restaurant price

    public function getOneRestaurantPrice(Request $request)
    {
        $price_id = $request->input('price_id');
        $restaurant_price = RestaurantPrices::find($price_id);

        return response()->json([
            'id' => $price_id,
            'season_id' => $restaurant_price->season_id,
            'package_id' => $restaurant_price->package_id,
            'price_mode_id' => $restaurant_price->price_mode_id,
            'meal_type_id' => $restaurant_price->meal_type_id,
            'description' => $restaurant_price->description,
            'price' => $restaurant_price->price,
            'is_compulsory' => $restaurant_price->is_compulsory,
            'status' => $restaurant_price->status,
        ]);
    }

    //meal types
    public function getMealTypes()
    {
        $meal_types = MealTypes::all();

        return response()->json($meal_types);
    }//get meal types

}//class
