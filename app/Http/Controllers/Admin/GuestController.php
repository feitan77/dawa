<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Guest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class GuestController extends Controller
{
    public function all()
    {
        $guests=Guest::all();
        return view('admin.guests.all', compact('guests'));
    }

    public function index(Booking $booking)
    {
        $guests = $booking->guests;
        return view('admin.guests.index', compact('booking','guests'));
    }

    public function create(Booking $booking)
    {
        $admin=Auth::guard('admin')->id();
        return view('admin.guests.create', compact('booking', 'admin'));
    }

    public function store(Request $request)
    {
        $guest=new Guest();
        $guest->full_name=request('full_name');
        $guest->age=request('age');
        $guest->state=request('state');
        $guest->work=request('work');
        $guest->phone=request('phone');
        $guest->booking_id=request('booking_id');

        $guest->save();
        return redirect(route('admin.guests.index', $guest->booking_id));
    }

    public function edit(Guest $guest, Booking $booking)
    {

        $admin=Auth::guard('admin')->id();
        return view('admin.guests.edit', compact('guest', 'booking', 'admin'));
    }



    public function update(Guest $guest, Request $request)
    {

        $guest->full_name=request('full_name');
        $guest->age=request('age');
        $guest->state=request('state');
        $guest->work=request('work');
        $guest->phone=request('phone');

        $guest->save();
        return redirect(route('admin.guests.index', $guest->booking_id));
    }

    public function delete(Guest $guest)
    {
        $guest->delete();
        echo("success!");
        return redirect(route('admin.guests.index', $guest->booking_id));
    }
}
