<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'hall_id',
        'num_of_guests',
        'arrival',
        'departure'
    ];

    public function hall()
    {
        return $this->belongsTo('App\Models\Hall');
    }
}
