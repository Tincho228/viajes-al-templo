<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    /** @use HasFactory<\Database\Factories\WardFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'image_path',
        'stake_id'
    ]; 

     /**
     * Get the stake that the ward belongs to.
     */
    public function stake()
    {
        // One ward belongs to one stake
        return $this->belongsTo(Stake::class);
    }

    public function passengers()
    {
        // One ward has many passengers
        return $this->hasMany(Passenger::class);
    }
}
