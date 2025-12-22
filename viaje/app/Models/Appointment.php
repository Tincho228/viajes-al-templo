<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    /** @use HasFactory<\Database\Factories\AppointmentFactory> */
    use HasFactory;

    // Massive assignment permission
    protected $fillable = [
        'time',
        'capacity',
        'ordinance_id'
    ];

    // 
    public function ordinance() {
        // One appointment belongs to one ordinance
        return $this->belongsTo(Ordinance::class);
    }

    public function passengers() {
        // Many appointments belong to many passengers
        return $this->belongsToMany(Passenger::class);
    }
}
