<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    protected $fillable = [
        'full_name', 'age', 'state','work','phone',
    ];

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}
