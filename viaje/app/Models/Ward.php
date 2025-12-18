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
        // Laravel automáticamente busca la clave foránea 'stakes_id' 
        // y la tabla 'stakes' basándose en el nombre de la función y el modelo relacionado.
        return $this->belongsTo(Stake::class);
    }
}
