<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ordinance extends Model
{
    /** @use HasFactory<\Database\Factories\OrdinanceFactory> */
    use HasFactory;

    // Massive assignment permission
    protected $fillable = [
        'name'
    ];

    public function appointments(){
        // One ordinance has many appointments
        return $this->hasMany(Appointment::class);
    }
}
