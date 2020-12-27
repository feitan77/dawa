<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Charge extends Model
{
    protected $fillable = [
        'minibar', 'laundry', 'restaurant', 'fine', 'other', 'total', 'is_received', 'is_submitted'
    ];

    protected $casts = [
        'minibar' => 'integer',
        'laundry' => 'integer',
        'restaurant' => 'integer',
        'fine' => 'integer',
        'other' => 'integer',
        'is_received' => 'boolean',
        'is_submitted' => 'boolean',
    ];


    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

//    public function admin()
//    {
//        return $this->belongsTo(Admin::class);
//    }
}
