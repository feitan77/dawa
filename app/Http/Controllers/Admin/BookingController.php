<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Booking;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function create(Room $room)
    {
        $admin=Auth::guard('admin')->id();
        return view('admin.bookings.create', compact('room', 'admin'));
    }

    public function store(Request $request)
    {
        $booking=new Booking();
        $booking->name=request('name');
        $booking->number_of_guests=request('number_of_guests');
        $booking->price=request('price');
        $booking->room_id=request('room_id');
        $booking->admin_id=request('admin_id');
        $booking->status=request('status');
        $booking->is_received=$request->has('is_received') ? 1 : 0;

        $booking->save();
        return redirect(route('admin.rooms'));
    }

    public function edit(Room $room, Booking $booking)
    {

        $admin=Auth::guard('admin')->id();
        return view('admin.bookings.edit', compact('room', 'booking', 'admin'));
    }



    public function update(Booking $booking, Request $request)
    {
//        request()->validate([
//            'price'=>'digits_between:2,3'
//        ]);

        $booking->name=request('name');
        $booking->number_of_guests=request('number_of_guests');
        $booking->price=request('price');
        $booking->admin_id=request('admin_id');
        $booking->status=request('status');
        $booking->is_received=$request->has('is_received') ? 1 : 0;

        $booking->save();
        return redirect(route('admin.rooms'));
    }

    public function delete(Booking $booking)
    {
        $booking->delete();
        echo("success!");
        return redirect(route('admin.rooms'));
    }
}
