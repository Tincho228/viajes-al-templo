<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stake extends Model
{
    /** @use HasFactory<\Database\Factories\StakeFactory> */
    use HasFactory;

    protected $fillable = ['name','address']; // Allowing mass assignment for all the properties
}
