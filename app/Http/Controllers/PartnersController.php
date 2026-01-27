<?php

namespace App\Http\Controllers;

use App\Models\Partners;
use Illuminate\Http\Request;

class PartnersController extends Controller
{
    public function index()
    {
        $partners = Partners::all();

        return view('partners.partners_view', compact('partners'));
    }

    public function store(Request $request)
    {
        $partner = new Partners();
        $partner->name = $request->input('partner_name');
        $partner->description = $request->input('partner_description');

        if ($request->hasFile('partner_logo')) {
            $file = $request->file('partner_logo');
            $filename = 'P_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/main/partners'), $filename);
            $partner->logo = $filename;
        }
        $partner->status = $request->has('chk_status') ? 1 : 0;

        $partner->save();

        return redirect()->route('partners.index');
    }

    public function update(Request $request)
    {
        $partner_id = $request->input('hide_partner_id');
        $partner = Partners::find($partner_id);

        $partner->name = $request->input('edit_partner_name');
        $partner->description = $request->input('edit_partner_description');

        if ($request->hasFile('edit_partner_logo')) {
            $oldImagePath = public_path('images/main/partners/'. $partner->logo);
            if (file_exists($oldImagePath) && !is_null($partner->logo)) {
                unlink($oldImagePath);  // Delete the old image file
            }
            $file = $request->file('edit_partner_logo');
            $filename = 'p_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/main/partners'), $filename);
            $partner->logo = $filename;
        }

        $partner->status = $request->has('edit_chk_status') ? 1 : 0;

        $partner->save();

        return redirect()->route('partners.index');
    }//update

    public function destroy(Request $request)
    {
        $partner_id = $request->input('hide_partner_id');

        $partner = Partners::find($partner_id);

        $partner->delete();

        return redirect()->route('partners.index');
    }

    //=============== AJAX methods ================//
    public function getOnePartner(Request $request)
    {
        $partner_id = $request->input('partner_id');

        $partner = Partners::find($partner_id);

        return response()->json($partner);
    }
}//class
