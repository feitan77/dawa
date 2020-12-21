<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'name', 'status',
    ];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function guests()
    {
        return $this->hasMany(Guest::class);
    }

    public function bill()
    {
        return $this->hasOne(Bill::class);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
