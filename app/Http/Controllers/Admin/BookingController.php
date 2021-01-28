<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Booking;
use App\Models\Day;
use App\Models\Room;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{

    public function create(Day $day,Room $room)
    {
        $admin=Auth::guard('admin')->id();
        return view('admin.bookings.create', compact('day','room', 'admin'));
    }

    public function store(Request $request)
    {
        $booking=new Booking();
        $booking->name=request('name');
        $booking->number_of_guests=request('number_of_guests');
        $booking->price=request('price');
        $booking->day_id=request('day_id');
        $booking->room_id=request('room_id');
        $booking->day_id=request('day_id');
        $booking->admin_id=request('admin_id');
        $booking->status=request('status');
        $booking->money=$request->has('money') ? 'green_paid' : 'unpaid';

        $booking->save();
        return redirect(session('rooms'));
    }

    public function edit(Room $room, Booking $booking)
    {
        $admin=Auth::guard('admin')->id();
        return view('admin.bookings.edit', compact('room', 'booking', 'admin'));
    }


    public function update(Booking $booking, Request $request)
    {

        $booking->name=request('name');
        $booking->number_of_guests=request('number_of_guests');
        $booking->price=request('price');
        $booking->admin_id=request('admin_id');
        $booking->status=request('status');
        $booking->money=$request->has('money') ? 'green_paid' : 'unpaid';

        $booking->save();
        return redirect(session('rooms'));
    }

    public function delete(Booking $booking)
    {
        $booking->delete();
        echo("success!");
        return redirect()->back();
    }

    public function updateStatus(Booking $booking, Request $request)
    {
        $booking->status=request('status');

        $booking->save();
        return redirect()->back();
    }

    public function updateMoney(Booking $booking, Request $request)
    {
        $booking->money=request('money');

        $booking->save();
        return redirect()->back();
    }
}
