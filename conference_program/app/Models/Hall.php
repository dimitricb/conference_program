<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hall extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'hotel_id',
        'type',
        'description',
        'price',

    ];

    public function hotel()
    {
        return $this->belongsTo('App\Models\Hotel');
    }
}
