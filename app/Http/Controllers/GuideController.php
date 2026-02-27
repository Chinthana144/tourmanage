<?php

namespace App\Http\Controllers;

use App\Models\Guides;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class GuideController extends Controller
{
    public function index()
    {
        $guides = Guides::where('status', 1)
            ->paginate(10);

        return view('guides.guides_view', compact('guides'));
    }

    public function store(Request $request)
    {   
        $guide = new Guides();

        $guide->name = $request->input('name');
        $guide->phone = $request->input('phone');
        $guide->email = $request->input('email');
        $guide->password = Hash::make($request->input('password'));
        $guide->rate = $request->input('guide_rate');
        $guide->travel_media_id = $request->input('cmb_travel_media') ?? null;

        //language json
        $language  = [
            'english' => $request->has('chk_language_english') ? 1 : 0,
            'japanese' => $request->has('chk_language_japanese') ? 1 : 0,
            'sinhala' => $request->has('chk_language_sinhala') ? 1 : 0,
            'tamil' => $request->has('chk_language_tamil') ? 1 : 0,
        ];

        $guide->languages = json_encode($language);
        
        if($request->hasFile('profile_image')) {
            $file = $request->file('profile_image');
            $filename = 'G_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/guides'), $filename);
            $guide->profile_image = $filename;
        }//upload profile image

        $guide->status = 1; //active
        $guide->save();

        return redirect()->route('guide.index');
    }//store
}//class
