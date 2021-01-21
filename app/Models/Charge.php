<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Charge extends Model
{
    protected $fillable = [
        'name', 'price', 'is_submitted'
    ];

    protected $casts = [
        'price' => 'integer',
        'is_submitted' => 'boolean',
    ];


    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
