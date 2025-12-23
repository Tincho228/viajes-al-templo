<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Passenger;
use App\Models\Ward;
use Illuminate\Http\Request;

class PassengerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all Passengers list
        $passengers = Passenger::all();
        return view('admin.passengers.index', compact('passengers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Fetch all wards from stake
        $wards = Ward::all(); // Enhacement: ->where(user->auth->stake_id) 
        // Enhacement 2: ->where(trip->ward->stake->id)
        //Redirect to create page
        return view('admin.passengers.create', compact('wards'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Validation
        $data = $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'is_member' => 'required|boolean',
            'gender' => 'required|string|max:255',
            'birthdate' => 'required|date',
            'ward_id' => 'required|exists:wards,id'
        ]);

        // Chech if there is place to store more passengers in the trip
        // Enhacement:

        // Create a new passenger
        $passenger = Passenger::create($data);

        // Confirmation message
        // Enhacement: Confirm where has been put the passenger.
        // Two possible lists: Confirmed or waitlist
        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Bien hecho!',
            'text' => 'El pasajero fue agregado correctamente.',
        ]);

        // Redirect to index page
        return redirect()->route('admin.passengers.edit',$passenger);
    }

    /**
     * Display the specified resource.
     */
    public function show(Passenger $passenger)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Passenger $passenger)
    {
        // Fetch all Appointments available.
        $appointments = Appointment::all();
        // Fetch all wards 
        $wards = Ward::all();
        // Redirect to edit page
        return view('admin.passengers.edit', compact('passenger', 'wards','appointments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Passenger $passenger)
    {
        //Validation
        $data = $request->validate([
            'firstname' => 'required|string|max:255',
            'middlename' => 'nullable|string',
            'lastname' => 'required|string|max:255',
            'dni' => 'nullable|string|max:255',
            'is_member' => 'nullable|boolean',
            'membership' => 'nullable|string|max:255',
            'is_endowed' => 'nullable|boolean',
            'gender' => 'required|string|max:255',
            'birthdate' => 'required|date' ,
            'is_authorized'=> 'nullable|boolean',
            'ward_id' => 'required|exists:wards,id',
            'appointments' => 'nullable|array',
            'appointments.*' => 'exists:appointments,id'
        ]);
        
        // Update Passenger
        $passenger->update($data);

        // Sincronizing 
        $passenger->appointments()->sync($data['appointments'] ?? []);

        // Confirmation message
        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Bien hecho!',
            'text' => 'El pasajero fue actualizado correctamente.',
        ]);

        // Redirect to index page
        return redirect()->route('admin.passengers.edit',$passenger);
    }
 
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Passenger $passenger)
    {
        //
    }
}
