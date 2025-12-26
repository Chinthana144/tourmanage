<?php

namespace App\Http\Controllers;

use App\Models\Activities;
use App\Models\BoardingType;
use App\Models\Hotels;
use App\Models\Locations;
use App\Models\RestaurantMeals;
use App\Models\Restaurants;
use App\Models\TourHotels;
use App\Models\TourRequest;
use App\Models\TourRequestRooms;
use App\Models\TourRooms;
use App\Models\TourRoutes;
use App\Models\Tours;
use App\Models\TourTravel;
use App\Models\TravelMedia;
use Illuminate\Http\Request;

class TourRouteController extends Controller
{
    public function index(Request $request)
    {
        $tour_id = $request->input('hide_tour_id');
        $tour = Tours::find($tour_id);
        $routes = TourRoutes::where('tour_id', $tour_id)
            ->orderBy('order_no', 'ASC')
            ->get();

        //tour request
        $tour_request_id = $tour->tour_request_id;
        $tour_request = TourRequest::find($tour_request_id);

        return view('tour_routes.tour_route_create', compact('tour', 'routes', 'tour_request'));
    }//index

     public function locationStore(Request $request)
    {
        $tour_id = $request->input('hide_tour_id');
        $routable_id = $request->input('loc_cmb_locations');

        $order_no = TourRoutes::where('tour_id', $tour_id)->count();

        $quantity = TourRoutes::where('tour_id', $tour_id)
            ->where('routable_type', Locations::class)
            ->where('routable_id', $routable_id)
            ->count();

        TourRoutes::create([
            'tour_id' => $tour_id,
            'order_no' => $order_no + 1,
            'routable_type' => Locations::class,
            'routable_id' => $routable_id,
            'day_no' => $request->input('loc_day_no'),
            'quantity' => $quantity + 1,
            'price_adult' => 0,
            'price_child' => 0,
            'total_price_adult' => 0,
            'total_price_child' => 0,
            'line_total' => 0,
            'notes' => $request->input('loc_note') ?? "",
        ]);

        return redirect()->route('tour_route.index', ['hide_tour_id' => $tour_id])->with('success', 'Tour route added successfully!');
    }//location store

    //Hotels add 
    public function hotelStore(Request $request)
    {
        $tour_id = $request->input('hide_tour_id');
        $tour = Tours::find($tour_id);

        /*
        * create tour_route
        * create tour_hotel
        * create tour_rooms
        * update tour_hotel prices
        * update tour_route prices
        */

        //create tour route
        $routable_id = $request->input('cmb_hotels');
        $order_no = TourRoutes::where('tour_id', $tour_id)->count();

        $quantity = TourRoutes::where('tour_id', $tour_id)
            ->where('routable_type', Activities::class)
            ->where('routable_id', $routable_id)
            ->count();

        $tour_route = TourRoutes::create([
            'tour_id' => $tour_id,
            'order_no' => $order_no + 1,
            'routable_type' => Hotels::class,
            'routable_id' => $routable_id,
            'day_no' => $request->input('hot_day_no'),
            'quantity' => $quantity + 1,
            'price_adult' => 0,
            'price_child' => 0,
            'total_price_adult' => 0,
            'total_price_child' => 0,
            'line_total' => 0,
            'notes' => $request->input('hot_note') ?? '',
        ]);

        //create tour hotel
        $tour_hotel = TourHotels::create([
            'tour_route_id' => $tour_route->id,
            'hotel_id' => $routable_id,
            'boarding_type_id' => $request->input('hot_boarding_type') == 0 ? 5 : $request->input('hot_boarding_type'), //default Full Board
            'check_in_date' => $request->input("hot_checkin_date"), 
            'check_out_date' => $request->input("hot_checkout_date"), 
            'nights' => $request->input("hot_num_nights"), 
            'hotel_total_price' => 0,
        ]);

        //create tour rooms
        $tour_request_id = $tour->tour_request_id;

        //get input from rooms
        $tour_rooms = TourRequestRooms::where('tour_request_id', $tour_request_id)->get();

        $night_price = 0;
        $extra_bed_price = 0;

        foreach($tour_rooms as $room)
        {
            TourRooms::create([
                'tour_hotel_id' => $tour_hotel->id,
                'room_type_id' => $room->room_type_id,
                'bed_type_id' => $room->bed_type_id,
                'base_adults' => $room->adult_count,
                'base_children' => $room->children_count,
                'room_quantity' => $room->room_quantity,
                'price_per_night' => $request->input('night_price_'.$room->id),
                'extra_bed_price' => $request->input('extra_bed_'.$room->id),
            ]);

            $night_price += floatval($request->input('night_price_'.$room->id)) * floatval($room->room_quantity) * $tour_hotel->nights;
            $extra_bed_price += floatval($request->input('extra_bed_'.$room->id)) * floatval($room->extra_bed_count) * $tour_hotel->nights;
        }//foreach

        //update tour hotel
        $tour_hotel->hotel_total_price = $night_price + $extra_bed_price;
        $tour_hotel->save();

        //update tour route
        $tour_route->line_total = $night_price + $extra_bed_price;
        $tour_route->save();

        return redirect()->route('tour_route.index', ['hide_tour_id' => $tour_id])->with('success', 'Tour route added successfully!');

    }//hotel store

    //tour restaurant store
    public function restaurantStore(Request $request)
    {
        $tour_id = $request->input('hide_tour_id');
        $order_no = TourRoutes::where('tour_id', $tour_id)->count();

        $routable_id = $request->input('cmb_restaurants');
        $quantity = TourRoutes::where('tour_id', $tour_id)
            ->where('routable_type', TravelMedia::class)
            ->where('routable_id', $routable_id)
            ->count();

         /*
        * storing tour_route like this, to get id for tour_travel table
        */
        //store tour route
        $tour_route = new TourRoutes();
        $tour_route->tour_id = $tour_id;
        $tour_route->order_no = $order_no + 1;
        $tour_route->routable_type = Restaurants::class;
        $tour_route->routable_id = $routable_id;
        $tour_route->day_no = $request->input('res_day_no');
        $tour_route->quantity = $quantity;
        $tour_route->price_adult = $request->input('res_price_per_adult');
        $tour_route->price_child = $request->input('res_price_per_child');
        $tour_route->total_price_adult = $request->input('res_total_price_adult');
        $tour_route->total_price_child = $request->input('res_total_price_child');
        $tour_route->line_total = $request->input('res_total_price');
        $tour_route->notes = $request->input('res_note') ?? "";

        $tour_route->save();

        //store restaurant meal
        RestaurantMeals::create([
            'restaurant_id' => $routable_id,
            'tour_route_id' => $tour_route->id,
            'meal_type_id' => $request->input('res_meal_type'),
            'name' => $request->input('res_meal_name'),
            'description' => $request->input('res_meal_description'),
            'price_per_adult' => $request->input('res_price_per_adult'),
            'price_per_child' => $request->input('res_price_per_child'),
            'total_price_adult' => $request->input('res_total_price_adult'),
            'total_price_child' => $request->input('res_total_price_child'),
            'total_price' => $request->input('res_total_price'),
            'opening_time' => $request->input('res_open_time'),
            'closing_time' => $request->input('res_close_time'),
            'status' => 1,
            'notes' => $request->input('res_note') ?? "",
        ]);

        return redirect()->route('tour_route.index', ['hide_tour_id' => $tour_id])->with('success', 'Tour route added successfully!');
    }//restaurant store

    public function activityStore(Request $request)
    {
        $tour_id = $request->input('hide_tour_id');
        $routable_id = $request->input('cmb_activities');

        $order_no = TourRoutes::where('tour_id', $tour_id)->count();

        $quantity = TourRoutes::where('tour_id', $tour_id)
            ->where('routable_type', Activities::class)
            ->where('routable_id', $routable_id)
            ->count();

        TourRoutes::create([
            'tour_id' => $request->input('hide_tour_id'),
            'order_no' => $order_no + 1,
            'routable_type' => Activities::class,
            'routable_id' => $request->input('cmb_activities'),
            'day_no' => $request->input('act_day_no'),
            'quantity' => $quantity + 1,
            'price_adult' => $request->input('act_price_per_adult'),
            'price_child' => $request->input('act_price_per_child'),
            'total_price_adult' => $request->input('act_total_price_adult'),
            'total_price_child' => $request->input('act_total_price_child'),
            'line_total' => floatval($request->input('act_total_price_adult')) + floatval($request->input('act_total_price_child')),
            'notes' => $request->input('act_note') ?? "",
        ]);

        return redirect()->route('tour_route.index', ['hide_tour_id' => $tour_id])->with('success', 'Tour route added successfully!');
    }//activity store

    //tour travel store
    public function travelStore(Request $request)
    {
        $tour_id = $request->input('hide_tour_id');
        $order_no = TourRoutes::where('tour_id', $tour_id)->count();

        $routable_id = $request->input('tvl_cmb_media');
        $quantity = TourRoutes::where('tour_id', $tour_id)
            ->where('routable_type', TravelMedia::class)
            ->where('routable_id', $routable_id)
            ->count();

        /*
        * storing tour_route like this, to get id for tour_travel table
        */
        //store tour route
        $tour_route = new TourRoutes();

        $tour_route->tour_id = $tour_id;
        $tour_route->order_no = $order_no + 1;
        $tour_route->routable_type = TravelMedia::class;
        $tour_route->routable_id = $routable_id;
        $tour_route->day_no = $request->input('tvl_day_no');
        $tour_route->quantity = $quantity;
        $tour_route->price_adult = 0;
        $tour_route->price_child = 0;
        $tour_route->total_price_adult = 0;
        $tour_route->total_price_child = 0;
        $tour_route->line_total = $request->input('tvl_price');
        $tour_route->notes = $request->input('tvl_note');

        $tour_route->save();

        //store tour_travel
        $startable_type = $request->input('tvl_start_type');
        $startable = "";
        if($startable_type > 0)
        {
            switch ($startable_type) {
                case '1': //location
                    $startable =  Locations::class;
                break;
                case '2': //hotels
                    $startable =  Hotels::class;
                break;
                case '3': //restaurants
                    $startable =  Restaurants::class;
                break;
            }
        }//has value

        $endable_type = $request->input('tvl_end_type');
        $endable = "";
        if($endable_type > 0)
        {
            switch ($endable) {
                case '1': //location
                    $endable =  Locations::class;
                break;
                case '2': //hotels
                    $endable =  Hotels::class;
                break;
                case '3': //restaurants
                    $endable =  Restaurants::class;
                break;
            }
        }//has value
        
        TourTravel::create([
            'tour_id' => $tour_id,
            'tour_route_id' => $tour_route->id,
            'travel_media_id'=> $routable_id,
            'startable_type' => $startable,
            'startable_id' => $request->input('tvl_start_place'),
            'endable_type' => $endable,
            'endable_id' => $request->input('tvl_end_place'),
            'distance_km' => $request->input('tvl_distance_km'),
            'duration_minutes' => $request->input('tvl_duration_minutes'),
            'price' => $request->input('tvl_price'),
            'notes' => $request->input('tvl_note') ?? "",
        ]); 

        return redirect()->route('tour_route.index', ['hide_tour_id' => $tour_id])->with('success', 'Tour route added successfully!');
    }//travel store

    //destroy
    public function destroy(Request $request)
    {
        $tour_id = $request->input('hide_tour_id');
        $route_id = $request->input('hide_route_id');

        $route = TourRoutes::find($route_id);
        $route->delete();

        return redirect()->route('tour_route.index', ['hide_tour_id' => $tour_id])->with('success', 'Tour route deleted successfully!');
    }//destroy

    //order up
    public function orderUp(Request $request)
    {
        $tour_id = $request->input('hide_tour_id');
        $route_id = $request->input('hide_route_id');
        $route = TourRoutes::find($route_id);
        $current_order_no = $route->order_no;

        if($current_order_no > 1)
        {
            $new_order_no = $current_order_no - 1;
            $old_route = TourRoutes::where("tour_id", $tour_id)
                ->where('order_no', $new_order_no)
                ->first();

            $old_route->order_no = $current_order_no;
            $old_route->save();

            $route->order_no = $new_order_no;
            $route->save();
        }//less than one

        return redirect()->route('tour_route.index', ['hide_tour_id' => $tour_id])->with('success', 'Tour route order changed successfully!');
    }//order up

    public function orderDown(Request $request)
    {
        $tour_id = $request->input('hide_tour_id');
        $route_id = $request->input('hide_route_id');
        $route = TourRoutes::find($route_id);
        $current_order_no = $route->order_no;

        $rount_count = TourRoutes::where('tour_id', $tour_id)->count();

        $new_order_no = $current_order_no + 1;
        if($rount_count >= $new_order_no)
        {
            $old_route = TourRoutes::where("tour_id", $tour_id)
                    ->where('order_no', $new_order_no)
                    ->first();
            $old_route->order_no = $current_order_no;
            $old_route->save();

            $route->order_no = $new_order_no;
            $route->save();
        }

        return redirect()->route('tour_route.index', ['hide_tour_id' => $tour_id])->with('success', 'Tour route order changed successfully!');
    }//order down
}//class
