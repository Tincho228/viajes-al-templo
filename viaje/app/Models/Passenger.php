<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ward;
use App\Models\Appointment;

class Passenger extends Model
{
    /** @use HasFactory<\Database\Factories\PassengerFactory> */
    use HasFactory;

    protected $fillable = [
        'firstname',
        'middlename',
        'lastname',
        'dni',
        'is_member',
        'membership',
        'is_endowed',
        'gender',
        'birthdate',
        'is_authorized',
        'ward_id',
        'user_id',
    ];
    public function user()
    {
        // One passanger belongs to one ward
        return $this->belongsTo(User::class);
    }
    public function appointments() {
        // Many passengers belong to many appointments
        return $this->belongsToMany(Appointment::class);
    }
    public function ward()
    {
        // One passanger belongs to one ward
        return $this->belongsTo(Ward::class);
    }
}
