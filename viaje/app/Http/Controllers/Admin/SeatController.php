<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Seat;
use App\Models\Trip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SeatController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Fetching authenticated user;
        $user = Auth::user(); 

        $seats = Seat::where('user_id', $user->id)->paginate(15);

        return view('admin.seats.index', compact('seats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Fetching authenticated user;
        $user = Auth::user(); 
        // Fetching all the trips;
        $trips = Trip::where('user_id', $user->id)->get();
        // Redirect to seats.create
        return view('admin.seats.create', compact('trips', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Validation
        $data = $request->validate([
            'number' => 'required|integer|min:1',
            'status' => 'nullable|string|max:255',
            'trip_id' => 'required|exists:trips,id',
            'user_id' => 'required|exists:users,id'
        ]);
        
        // Add new seat
        $seat = Seat::create($data);

        // Confirmation message
        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Bien hecho!',
            'text' => 'El asiento fue agregado correctamente.',
        ]);

        // Redirect to index page
        return redirect()->route('admin.seats.edit',$seat);
    }

    /**
     * Display the specified resource.
     */
    public function show(Seat $seat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Seat $seat)
    {
        // Fetching authenticated user;
        $user = Auth::user(); 
        // Fetching all the trips;
        $trips = Trip::where('user_id', $user->id)->get();
        // Redirect to edit view
        return view('admin.seats.edit', compact('trips', 'user','seat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Seat $seat)
    {
        // Validation
        $data = $request->validate([
            'number' => 'required|integer|min:1',
            'status' => 'nullable|string|max:255',
            'trip_id' => 'required|exists:trips,id',
            'user_id' => 'required|exists:users,id'
        ]); 

        // Update seat
        $seat->update($data);       

        // Confirmation message
        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Bien hecho!',
            'text' => 'El asiento fue actualizado correctamente.',
        ]);

        // Redirect to index page
        return redirect()->route('admin.seats.edit',$seat); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Seat $seat)
    {
        // Destroy seat
        $seat->delete();

        // Confirmation message
        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Bien hecho!',
            'text' => 'El asiento fue eliminado correctamente.',
        ]);

        // Redirect to index page
        return redirect()->route('admin.seats.index'); 
    }
}
