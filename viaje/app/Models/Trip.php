<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    /** @use HasFactory<\Database\Factories\TripFactory> */
    use HasFactory;

    protected $fillable = [
        'departure',
        'location',
        'description',
        'capacity',
        'cost',
        'user_id',
        'ward_id',
    ];

    public function user()
    {
        // One trip belongs to one user
        return $this->belongsTo(User::class);
    }
    
    public function ward(){
        // One trip belongs to one ward
        return $this->belongsTo(Ward::class);
    }
}
