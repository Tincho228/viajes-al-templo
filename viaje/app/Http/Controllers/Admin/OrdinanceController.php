<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ordinance;
use Illuminate\Http\Request;

class OrdinanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Fetch all ordinances
        $ordinances = Ordinance::all();
        //Redirecting to Ordinnces.index
        return view('admin.ordinances.index', compact('ordinances'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Redirecting to Create View
        return view('admin.ordinances.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Validation
        $data = $request->validate([
            'name' => 'required|string',
        ]);
        
        //Create new ordinance in database
        $ordinance = Ordinance::create($data);

        // Confirmation message
        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Bien hecho!',
            'text' => 'La ordenanza fue agregada correctamente.',
        ]);

        // Redirect to edit page
        return redirect()->route('admin.ordinances.edit',$ordinance);
    }

    /**
     * Display the specified resource.
     */
    public function show(Ordinance $ordinance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ordinance $ordinance)
    {
        //Redirecting to Edit view
        return view('admin.ordinances.edit', compact('ordinance'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ordinance $ordinance)
    {
        // Validation
        $data = $request->validate([
            'name' => 'required|string',
        ]);
        
        // Update ordinance in database
        $ordinance->update($data);

        // Confirmation message
        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Bien hecho!',
            'text' => 'La ordenanza fue actualizada correctamente.',
        ]);

        // Redirect to index page
        return redirect()->route('admin.ordinances.edit',$ordinance);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ordinance $ordinance)
    {
        //Deleting 
        $ordinance->delete();

        //Confirmation message
        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡Bien hecho!',
            'text' => 'La ordenanza fue eliminada correctamente.',
        ]);

        // Redirecting to index page
        return redirect()->route('admin.ordinances.index');
    }
}
