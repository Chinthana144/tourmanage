<?php

namespace App\Http\Controllers;

use App\Models\GroupComposition;
use App\Models\TourRequest;
use App\Models\TourRequestPeople;
use Illuminate\Http\Request;

class TourRequestPeopleController extends Controller
{
    public function index(Request $request)
    {
        $tour_request_id = $request->input('tour_request_id');
        $tour_request = TourRequest::find($tour_request_id);
        $group_compusitions = GroupComposition::all();

        return view('tour_requests.request_people', compact('tour_request', 'group_compusitions'));
    }

    //ajax methods
    public function storeRequestPeople(Request $request)
    {
        $tour_request_id = $request->input('tour_request_id');
        $composition_id = $request->input('composition_id');
        $quantity = $request->input('quantity');
        $adults = $request->input('adults');
        $children = $request->input('children');
        $extra_bed = $request->input('extra_bed');

        switch ($composition_id) {
            case '1':
                $adults = $quantity;
            break;
            case '2':
                $adults = $quantity * 2;
            break;
            case '4':
                $adults = $quantity * $adults;
            break;
        }//switch

        $request_people = new TourRequestPeople();

        $request_people->tour_request_id = $tour_request_id;
        $request_people->group_composition_id = $composition_id;
        $request_people->adults = $adults;
        $request_people->children = $children;
        $request_people->extra_bed = $extra_bed;
        $request_people->quantity = $quantity;

        $request_people->save();

        // $request_people = TourRequestPeople::create([
        //     'tour_request_id' => $tour_request_id,
        //     'group_composition_id' => $tour_request_id,
        //     'adults' => $tour_request_id,
        //     'children' => $tour_request_id,
        //     'extra_bed' => $tour_request_id,
        //     'quantity' => $tour_request_id,
        // ]);

        return response()->json([
            'success' => true,
            'message' => 'people added successfully!',
            'tour_people' => $request_people,
        ]);
    }//store using ajax

    public function getAllRequestPeople(Request $request)
    {
        $tour_request_id = $request->input('tour_request_id');
        $request_people = TourRequestPeople::where('tour_request_id', $tour_request_id)->get();

        $data = [];

        foreach ($request_people as $value) {
            $data[] = [
                'id' => $value->id,
                'tour_request_id' => $value->tour_request_id,
                'group_composition_id' => $value->group_composition_id,
                'composition' => $value->groupComposition->name,
                'adults' => $value->adults,
                'children' => $value->children,
                'extra_bed' => $value->extra_bed,
                'quantity' => $value->quantity,
            ];
        }

        return response()->json($data);
    }

    //get one tour people
    public function getOneRequestPeople(Request $request)
    {
        $request_people_id = $request->input('request_people_id');
        $request_people = TourRequestPeople::find($request_people_id);

        return response()->json($request_people);
    }//get one request people

    public function removeRequestPeople(Request $request)
    {
        $tour_request_id = $request->input('tour_request_id');
        $request_people_id = $request->input('request_people_id');

        $request_people = TourRequestPeople::find($request_people_id);

        $request_people->delete();

        return response()->json([
            'success' => true,
            'message' => 'composition deleted successfully!',
        ]);
    }
}//class
