<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Passenger;
use Illuminate\Support\Facades\Auth;

class ShowPassengers extends Component
{
    public $search;

    public function render()
    {
        // Fetch authenticated user
        $user = Auth::user();
        // Fetch all Passengers list
        $passengers = Passenger::where('user_id', $user->id)
                                ->where('firstname', 'like', '%' . $this->search . '%') 
                                ->get();
        return view('livewire.admin.show-passengers', compact('passengers'));
    }
}
