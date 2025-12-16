<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Stake;
use Illuminate\Http\Request;

class StakeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //fetching all stakes
        $stakes = Stake::all();
        //fetching by ID, descendent
        /* $stakes = Stake::orderBy('id','desc')->get(); //Could be used when the list  
        /* of stakes is bigger*/


        return view('admin.stakes.index', compact('stakes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.stakes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:20',
            'address'=>'required|string|max:255'
        ]);
        Stake::create($data);
        return redirect()->route('admin.stakes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Stake $stake)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Stake $stake)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Stake $stake)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stake $stake)
    {
        //
    }
}
