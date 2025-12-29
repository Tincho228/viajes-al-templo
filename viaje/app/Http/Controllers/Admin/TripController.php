<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Seat;
use App\Models\Trip;
use App\Models\Ward;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TripController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch authenticated user
        $user = Auth::user();
        //Fetch all trips
        $trips = Trip::where('user_id', $user->id)->paginate(10);
    
        return view('admin.trips.index', compact('trips'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        $wards = Ward::where('stake_id', $user->stake_id)
                    ->get();
        // Redirect to Create view
        return view('admin.trips.create', compact('wards'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Validation
        $data = $request->validate([
            'departure' => 'required|date',
            'location' => 'required|string|max:255',
            'description' => 'nullable|string',
            'capacity' => 'required|integer|min:1',
            'cost' => 'required|numeric|min:0',
            'user_id' => 'required|exists:users,id',
            'ward_id' => 'required|exists:wards,id',
        ]);

        // Creating trip
        $trip = Trip::create($data);

        // Creating seats automatically
        // Loop to prepare data

        $seats = [];
        for ($i = 1; $i <= $trip->capacity; $i++) {
            $seats[] = [
                'number'  => $i,
                'status'  => 'libre',
                'trip_id' => $trip->id,
                'user_id' => $trip->user_id,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Massive insertion
        Seat::insert($seats);

        // Confirmation message
        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡Bien hecho!',
            'text' => "Se ha creado el viaje y generado {$trip->capacity} asientos.",
        ]);

        return redirect()->route('admin.trips.edit', $trip);
    }

    /**
     * Display the specified resource.
     */
    public function show(Trip $trip)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Trip $trip)
    {
        $wards = Ward::all();
        // Redirect to Trip.edit
        return view('admin.trips.edit', compact('trip','wards'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Trip $trip)
    {
        // Validation
        $data = $request->validate([
            'departure' => 'required|date',
            'location' => 'required|string|max:255',
            'description' => 'nullable|string',
            'capacity' => 'required|integer|min:1',
            'cost' => 'required|numeric|min:0',
            'user_id' => 'required|exists:users,id',
            'ward_id' => 'required|exists:wards,id',
        ]);
        
        // Updating
        $trip->update($data);

        // Confirmation message
        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡Bien hecho!',
            'text' => 'El viaje fue actualizado correctamente.',
        ]);

        // Redirect
        return redirect()->route('admin.trips.edit', $trip);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Trip $trip)
    {
        // Destroy trip
        $trip->delete();

        //Confirmation message
          session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡Bien hecho!',
            'text' => 'El viaje fue eliminado correctamente.',
        ]);

        // Redirect to the users index with a success message
        return redirect()->route('admin.trips.index');
    }
}
