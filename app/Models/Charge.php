<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Charge extends Model
{
    protected $fillable = [
        'minibar', 'laundry', 'restaurant', 'fine', 'other',
    ];

    protected $casts = [
        'minibar' => 'integer',
        'laundry' => 'integer',
        'restaurant' => 'integer',
        'fine' => 'integer',
        'other' => 'integer',
    ];
}
