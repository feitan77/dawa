<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'number', 'type'
    ];


    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
