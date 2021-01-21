<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Day;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DayController extends Controller
{
    public function index(Day $day)
    {
        $subQuery=DB::table('bookings')
            ->leftJoin('charges', 'bookings.id', '=', 'charges.booking_id')
            ->select(DB::raw('bookings.id, SUM(charges.price) as total'), 'booking_id')
            ->groupBy('bookings.id');

        $rooms=DB::table('rooms')
//
            ->leftJoin('bookings', 'rooms.id', '=', 'bookings.room_id')
            ->where('bookings.day_id', '=', $day->id)
            ->orWhere('bookings.day_id', '=', null)
            ->leftJoin('admins', 'bookings.admin_id', '=', 'admins.id')
            ->leftJoinSub($subQuery, 'charges', function ($join) {
                $join->on('bookings.id', '=', 'charges.booking_id');
            })
            ->select('rooms.number','rooms.id','bookings.day_id','bookings.name','bookings.price', 'bookings.money', 'bookings.status', 'admins.admin_name', 'bookings.id as booking_id', 'bookings.number_of_guests', 'charges.total')
            ->get();
//dd($rooms);
        return view(('admin.days.index'), compact(   'day','rooms'));

    }

    public function calendar()
    {
        return view('admin.days.calendar');
    }

    public function store(Request $request)
    {

        $day=new Day();
        $day->day=request('day');

        $day->save();
        return redirect('admin');
    }


}
