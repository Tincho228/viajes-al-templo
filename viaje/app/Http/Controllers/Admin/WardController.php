<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Stake;
use App\Models\Ward;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetching all wards from wards
        $wards = Ward::all();
        return view('admin.wards.index', compact('wards'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $stakes = Stake::all();

        return view('admin.wards.create', compact('stakes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Validation 
        $data = $request->validate([
            'name' => 'required|string|max:20',
            'address' => 'required|string|max:100',
            'stake_id' => 'required|exists:stakes,id'
        ]);

        //Creating ward
        $ward = Ward::create($data);

        //Confirmation message
        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Bien hecho!',
            'text' => 'La unidad fue creada correctamente.',
        ]);

        // Redirecting to wards.edit
        return redirect()->route('admin.wards.edit', $ward);
    }

    /**
     * Display the specified resource.
     */
    public function show(Ward $ward)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ward $ward)
    {
        //Fetching all stakes
        $stakes = Stake::all();

        // Redirecting to ward.edit
        return view('admin.wards.edit', compact('ward', 'stakes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ward $ward)
    {
        // Validation
        $data = $request->validate([
            'name' => 'required|string|max:20',
            'address' => 'required|string|max:100',
            'image' => 'nullable|image',
            'stake_id' => 'required|exists:stakes,id'
        ]);

        // Checking image file
        if($request->hasFile('image')){
            // Check and replace existing image in public
            if($ward->image_path){
                Storage::delete($ward->image_path);
            }

            // Creating wards folder and image path
            // Add image path to Ward object
            $data['image_path'] = Storage::put('wards', $request->image); 
        }

        // Updating ward into database.
        $ward->update($data);

        // Confirmation message.
        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Bien hecho!',
            'text' => 'La unidad fue actualizada correctamente.',
        ]);

        // Redirecting to ward.edit
        return redirect()->route('admin.wards.edit', $ward);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ward $ward)
    {
        //
    }
}
