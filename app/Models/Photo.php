<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'description', 'route', 'user_id'
    ];

    /**
     * THE RELATIONSHIPS WITH THE USERS
     */
    public function user(){
        return $this->belongsTo( User::class);
    }
}
