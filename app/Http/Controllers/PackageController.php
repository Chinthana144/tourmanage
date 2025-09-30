<?php

namespace App\Http\Controllers;

use App\Models\Packages;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $packages = Packages::where('status', 1)->get();

        return view('packages.package_view', compact('packages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('packages.package_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $package = new Packages();

        $package->title = $request->input('title');
        $package->description = $request->input('description');
        $package->price_per_person = $request->input('price_per_person');
        $package->duration_days = $request->input('duration_days');
        $package->availability_startdate = $request->input('available_startdate');
        $package->availability_enddate = $request->input('available_enddate');
        $package->status = 1;

        $package->cover_image  = "";
        // Handle file uploads
        if ($request->hasFile('cover_image')) {
            $file = $request->file('cover_image');
            $filename = 'P_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/packages'), $filename);
            $package->cover_image = $filename;
        }

        $package->save();

        return view('packageroutes.packageroute_create', compact('package'));
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
        $package_id = $request->input('hide_package_id');
        $package = Packages::find($package_id);

        return view('packages.package_update', compact('package'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $package_id = $request->input('hide_package_id');

        $package = Packages::find($package_id);

        $package->title = $request->input('title');
        $package->description = $request->input('description');
        $package->price_per_person = $request->input('price_per_person');
        $package->duration_days = $request->input('duration_days');
        $package->availability_startdate = $request->input('available_startdate');
        $package->availability_enddate = $request->input('available_enddate');
        $package->status = 1;

        // $package->cover_image = $package->cover_image;
        // Handle file uploads
        if ($request->hasFile('cover_image')){
            $oldImagePath = public_path('images/packages/' . $package->cover_image);

            if (file_exists($oldImagePath) && !is_null($package->cover_image)) {
                unlink($oldImagePath);  // Delete the old image file
            }
            $file = $request->file('cover_image');
            $filename = 'P_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/packages'), $filename);
            $package->cover_image = $filename;
        }

        $package->save();

        return redirect()->route('packages.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
