<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Ordinance;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Fetch all appointments
        $appointments = Appointment::all();
        
        // Redirect to appointments.index
        return view('admin.appointments.index', compact('appointments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Fecth all ordinances
        $ordinances = Ordinance::all();
        //Redirect to Appointmens.create
        return view('admin.appointments.create', compact('ordinances'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation
        $data = $request->validate([
            'time' => 'required|date_format:H:i',
            'capacity' => 'required|numeric',
            'ordinance_id' => 'required|exists:ordinances,id'
        ]);
        
        // Create new appointment
        $appointment = Appointment::create($data);

        // Confirmation message
        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Bien hecho!',
            'text' => 'La unidad fue actualizada correctamente.',
        ]);

        // Redirect to appointments.edit
        return redirect()->route('admin.appointments.edit', $appointment);
    }

    /**
     * Display the specified resource.
     */
    public function show(Appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Appointment $appointment)
    {
        //Fetch all ordinances
        $ordinances = Ordinance::all();

        //Redirect to appointment.edit
        return view('admin.appointments.edit', compact('appointment', 'ordinances'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Appointment $appointment)
    {
        // Validation
        $data = $request->validate([
            'time' => 'required|date_format:H:i,H:i:s',
            'capacity' => 'required|numeric',
            'ordinance_id' => 'required|exists:ordinances,id'
        ]);

        // Create new appointment
        $appointment->update($data);

        // Confirmation message
        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Bien hecho!',
            'text' => 'La sesion fue actualizada correctamente.',
        ]);

        // Redirect to appointments.edit
        return redirect()->route('admin.appointments.edit', $appointment);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appointment $appointment)
    {
        //
    }
}
