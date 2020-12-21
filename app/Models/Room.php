<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'number', 'type', 'is_available',
    ];

    protected $casts = [
        'is_available' => 'boolean',
    ];
}
