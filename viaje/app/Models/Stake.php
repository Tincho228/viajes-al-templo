<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ward;

class Stake extends Model
{
    /** @use HasFactory<\Database\Factories\StakeFactory> */
    use HasFactory;

    // Allowing mass assignment for all the properties
    protected $fillable = ['name','address']; 

    /**
     * Get the wards for the stake.
     */
    public function wards()
    {
        // One stake has many wards.
        return $this->hasMany(Ward::class);
    }

    public function users()
    {
        // One stake has many users
        return $this->hasMany(User::class);
    }
}
