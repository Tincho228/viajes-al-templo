<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    /** @use HasFactory<\Database\Factories\SeatFactory> */
    use HasFactory;

    protected $fillable = [

        'number',
        'is_available',
        'trip_id',
        'user_id',
    ];

    public function trip()
    {
        // One seat belongs to one trip
        return $this->belongsTo(Trip::class);
    }

    public function passenger()
    {
        // One seat belongs to one passenger
        return $this->hasOne(Passenger::class);
    }

    public function payments()
    {
        // One seat has many payments
        return $this->hasMany(Payment::class);
    }
}
