<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    /** @use HasFactory<\Database\Factories\PaymentFactory> */
    use HasFactory;

    protected $fillable = [
        'amount', 
        'type',
        'seat_id',
        'trip_id',
        'user_id',
        'passenger_id',
    ];

    public function trip()
    {
        // One payment belongs to one trip
        return $this->belongsTo(Trip::class);
    }

    public function passenger()
    {
        // One payment belongs to one passenger
        return $this->belongsTo(Passenger::class);
    }

    public function seat()
    {
        // One payment belongs to one seat
        return $this->belongsTo(Seat::class);
    }
}