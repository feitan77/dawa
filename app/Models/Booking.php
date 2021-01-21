<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'name', 'status','price','money', 'is_submitted', 'check_in', 'checkout','number_of_guests'
    ];

    protected $casts = [
        'price' => 'integer',
        'is_submitted' => 'boolean',
        'check_in' => 'date',
        'checkout' => 'date',
    ];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function guests()
    {
        return $this->hasMany(Guest::class);
    }


    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function charges()
    {
        return $this->hasMany(Charge::class);
    }

    public function day()
    {
        return $this->belongsTo(Day::class);
    }
}
