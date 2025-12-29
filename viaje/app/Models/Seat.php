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
        'passenger_id',
        'trip_id',
    ];

    public function trip()
    {
        // One seat belongs to one trip
        return $this->belongsTo(Trip::class);
    }
}
