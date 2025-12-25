<?php

namespace App\Http\Controllers;

use App\Models\BedTypes;
use App\Models\Customers;
use App\Models\RoomTypes;
use App\Models\TourRequest;
use App\Models\TourRequestRooms;
use Illuminate\Http\Request;

class TourRequestRoomController extends Controller
{
    public function index(Request $request)
    {
        $tour_request_id = $request->input('tour_request_id');
        $tour_request = TourRequest::find($tour_request_id);

        $tour_rooms = TourRequestRooms::where('tour_request_id', $tour_request_id)->get();

        //customer
        $customer_id = $tour_request->customer_id;
        $customer = Customers::find($customer_id);

        $room_types = RoomTypes::all();
        $bed_types = BedTypes::all();

        return view('tour_requests.request_rooms', compact('tour_request', 'tour_rooms', 'customer', 'room_types', 'bed_types'));
    }//index

    public function store(Request $request)
    {
        $tour_request_id = $request->input('tour_request_id');

        TourRequestRooms::create([
            'tour_request_id' => $request->input('tour_request_id'),
            'room_type_id' => $request->input('cmb_room_type'),
            'bed_type_id'=> $request->input('cmb_bed_type'),
            'adult_count' => $request->input('adult_count'),
            'children_count' => $request->input('children_count') ?? 0,
            'extra_bed_type_id' => $request->input('cmb_extra_bed_type'),
            'extra_bed_count' => $request->input('extra_bed_count') ?? 0,
            'room_quantity' => $request->input('room_quantity'),
        ]);

        return redirect()->route('tour_request_rooms.index', ['tour_request_id' => $tour_request_id])->with('success', 'Room added successfully!');
    }//store

    public function destroy(Request $request)
    {
        $tour_request_id = $request->input('tour_request_id');
        $room_id = $request->input('hide_room_id');
        $room = TourRequestRooms::find($room_id);
        $room->delete();

        return redirect()->route('tour_request_rooms.index', ['tour_request_id' => $tour_request_id])->with('success', 'Room added successfully!');
    }

    //AJAX methods
    public function getOneRequestRoom(Request $request)
    {
        $room_id = $request->input('room_id');

        $room = TourRequestRooms::find($room_id);

        return response()->json($room);
    }

    public function getRequestRooms(Request $request)
    {
        $tour_request_id = $request->input('tour_request_id');

        $tour_rooms = TourRequestRooms::where('tour_request_id', $tour_request_id)->get();

        $rooms = [];

        foreach ($tour_rooms as $room) {
            $rooms[] = [
                'id' => $room->id,
                'tour_request_id' => $room->tour_request_id, 
                'room_type_id' => $room->room_type_id, 
                'room_type_name' => $room->roomType->name, 
                'bed_type_id' => $room->tour_request_id, 
                'bed_type_name' => $room->bedType->name, 
                'adult_count' => $room->adult_count, 
                'children_count' => $room->children_count, 
                'extra_bed_count' => $room->extra_bed_count, 
                'room_quantity' => $room->room_quantity, 
            ];
        }

        return response()->json($rooms);
    }//get requested rooms ajax
}//class
