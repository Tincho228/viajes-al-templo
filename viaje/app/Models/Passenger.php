<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ward;

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
    ];
    public function ward()
    {
        // One passanger belongs to one ward
        return $this->belongsTo(Ward::class);
    }
}
