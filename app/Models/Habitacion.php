<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Habitacion extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'capacidad',
        'ocupante1',
        'ocupante2',
        'ocupante3',
        'ocupante4',
        'camas',
        'planta',
        'observaciones'
    ];
}
