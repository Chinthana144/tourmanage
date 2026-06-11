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

    public function update(Request $request)
    {
        $guide_id = $request->input('hide_guide_id');
        $guide = Guides::find($guide_id);

        $guide->name = $request->input('edit_name');
        $guide->phone = $request->input('edit_phone');
        $guide->email = $request->input('edit_email');

        $request->input('edit_password') == null ? $guide->password = $guide->password : Hash::make($request->input('edit_password'));
        // $guide->password = Hash::make($request->input('edit_password')) ;

        $guide->rate = $request->input('edit_guide_rate');
        $guide->travel_media_id = $request->input('hide_travel_media_id') > 0 ? $request->input('hide_travel_media_id') : null;

        //language json
        $language  = [
            'english' => $request->has('edit_chk_language_english') ? 1 : 0,
            'japanese' => $request->has('edit_chk_language_japanese') ? 1 : 0,
            'sinhala' => $request->has('edit_chk_language_sinhala') ? 1 : 0,
            'tamil' => $request->has('edit_chk_language_tamil') ? 1 : 0,
        ];

        $guide->languages = json_encode($language);

        if($request->hasFile('edit_profile_image')){
            $oldImagePath = public_path('images/guides/'. $guide->profile_image);
            if (file_exists($oldImagePath) && !is_null($guide->profile_image)) {
                unlink($oldImagePath);  // Delete the old image file
            }
            //store new image
            $file = $request->file('edit_profile_image');
            $filename = 'G_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/guides'), $filename);
            $guide->profile_image = $filename;
        }//has primary image

        $guide->save();

        return redirect()->route('guide.index');

    }//update

    //===================================== AJAX================================//
    public function getOneGuide(Request $request)
    {
        $guide_id = $request->input('guide_id');
        $guide = Guides::find($guide_id);

        $languages = json_decode($guide->languages);
        $english = $languages->english;
        $japanese = $languages->japanese;
        $sinhala = $languages->sinhala;
        $tamil = $languages->tamil;

        return response()->json([   
            'id' => $guide->id,
            'name'=> $guide->name,
            'phone'=> $guide->phone,
            'email'=> $guide->email,
            'profile_image' => $guide->profile_image,
            'english' => $english,
            'japanese' => $japanese,
            'sinhala' => $sinhala,
            'tamil' => $tamil,
            'rate' => $guide->rate,
            'travel_media_id' => $guide->travel_media_id,
            'travel_name' => $guide->travelMedia->name ?? null,
            'travel_no' => $guide->travelMedia->vehicle_no ?? null,

        ]);
    }
}//class
