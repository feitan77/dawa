<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Day extends Model
{

    protected $fillable = [
        'day',
    ];

    protected $casts = [
        'day' => 'date',
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
