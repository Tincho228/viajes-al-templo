<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Passenger;
use App\Models\Seat;
use App\Models\Trip;
use App\Models\Ward;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PassengerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch authenticated user
        $user = Auth::user();
        // Fetch all Passengers list
        $passengers = Passenger::where('user_id', $user->id)->paginate(10);
        return view('admin.passengers.index', compact('passengers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Trip $trip)
    {
        return $trip;
        // Fetch authenticated user
        $user = Auth::user();
        // Fetch all wards from stake
        $wards = Ward::where('stake_id', $user->stake_id)->get();  
        // Fetch all seats where available
        $seats = Seat::where('trip_id', 2)->where('is_available', true)->get();
        //Redirect to create page

        return view('admin.passengers.create', compact('wards','user','seats'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Trip $trip)
    {
        return $request->all();
        //Validation
        $data = $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'is_member' => 'required|boolean',
            'gender' => 'required|string|max:255',
            'birthdate' => 'required|date',
            'ward_id' => 'required|exists:wards,id',
            'user_id' => 'required|exists:users,id',
            'trip_id' => 'required|exists:trips,id',
            'seat_id' => 'required|exists:seats,id',
        ]);

        // Create a new passenger
        $passenger = Passenger::create($data);

        // Confirmation message
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
        // Fetch authenticated user
        $user = Auth::user();
        //Fetch all wards from stake
        $wards = Ward::where('stake_id', $user->stake_id)->get();  
        //Redirect to create page
        // Fetch all Appointments available.
        $appointments = Appointment::all();
       
        // Redirect to edit page
        return view('admin.passengers.edit', compact('passenger', 'wards','appointments', 'user'));
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
            'user_id' => 'required|exists:users,id',
            'seat_id' => 'required|exists:seats,id',
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
        //Destroy the passenger
        $passenger->delete();
        
        //Confirmation message
          session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡Bien hecho!',
            'text' => 'El pasajero fue eliminado correctamente.',
        ]);

        // Redirect to the users index with a success message
        return redirect()->route('admin.passengers.index');
        
    }
}
