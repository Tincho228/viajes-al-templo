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
        // Laravel automáticamente busca la clave foránea 'stakes_id' en la tabla 'wards'.
        return $this->hasMany(Ward::class);
    }
}
