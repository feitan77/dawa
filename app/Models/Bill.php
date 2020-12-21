<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $fillable = [
        'rent', 'is_received', 'is_submitted',
    ];

    protected $casts = [
        'rent' => 'integer',
        'is_received' => 'boolean',
        'is_submitted' => 'boolean',
    ];
}
