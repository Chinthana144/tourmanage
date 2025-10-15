<?php

namespace App\Http\Controllers;

use App\Models\TouristHealth;
use App\Models\Tourists;
use Illuminate\Http\Request;

class TouristHealthController extends Controller
{
    public function store(Request $request)
    {
        $tourist_health = new TouristHealth();

        $tourist_health->tourist_id = $request->input('tourist_id');
        $tourist_health->blood_group_id = $request->input('cmb_bood_group');
        $tourist_health->dietary_preference_id = $request->input('cmb_dietary_type');
        $tourist_health->allergies = $request->input('allergies');
        $tourist_health->medical_conditions = $request->input('medical_condition');
        $tourist_health->emergency_contact_name = $request->input('emergency_contact_name');
        $tourist_health->emergency_contact_phone = $request->input('emergency_contact_phone');
        $tourist_health->notes = $request->input('notes');

        $tourist_health->save();

        return redirect()->route('tourists.index')->with('success', 'Tourist and health information saved successfully.');

    }//store

    public function update(Request $request)
    {
        $tourist_id = $request->input('hide_tourist_id');
        $tourist_health_id = $request->input('hide_tourist_health_id');

        $tourist_health = TouristHealth::find($tourist_health_id);

        $tourist_health->blood_group_id = $request->input('cmb_blood_group');
        $tourist_health->dietary_preference_id = $request->input('cmb_dietary_type');
        $tourist_health->allergies = $request->input('allergies');
        $tourist_health->medical_conditions = $request->input('medical_condition');
        $tourist_health->emergency_contact_name = $request->input('emergency_contact_name');
        $tourist_health->emergency_contact_phone = $request->input('emergency_contact_phone');
        // $tourist_health->notes = $request->input('notes');

        $tourist_health->save();

        return redirect()->route('tourists.index')->with('success', 'Tourist and health information updated successfully.');
    }//update

    //========================= AJAX call =========================//

    public function getTouristHealth(Request $request)
    {
        $tourist_id = $request->input('id');

        $tourist = Tourists::find($tourist_id);

        $tourist_health = TouristHealth::where('tourist_id', $tourist_id)->first();

        return response()->json(['tourist' => $tourist, 'tourist_health' => $tourist_health]);

    }//get tourist health
}
