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
        session(['rooms' => request()->url()]);

        $bookings=DB::table('bookings')
            ->where('bookings.day_id', '=', $day->id);


        $subQuery=DB::table('bookings')
            ->leftJoin('charges', 'bookings.id', '=', 'charges.booking_id')
            ->select(DB::raw('bookings.id, SUM(charges.price) as total'), 'booking_id')
            ->groupBy('bookings.id');

        $rooms=DB::table('rooms')
            ->leftJoinSub($bookings, 'bookings', function($j){
                $j->on('rooms.id', '=', 'bookings.room_id');
            })

            ->leftJoin('admins', 'bookings.admin_id', '=', 'admins.id')
            ->leftJoinSub($subQuery, 'charges', function ($join) {
                $join->on('bookings.id', '=', 'charges.booking_id');
            })

            ->select('rooms.number','rooms.id as id','bookings.day_id','bookings.name','bookings.price', 'bookings.money', 'bookings.status', 'admins.admin_name', 'bookings.id as booking_id', 'bookings.number_of_guests', 'charges.total')
            ->get();
        return view(('admin.days.index'), compact('day','rooms'));

    }

    public function calendar()
    {
        return view('admin.days.calendar');
    }

    public function create()
    {
        return view('admin.days.create');
    }

    public function store(Request $request)
    {
        $day=new Day();
        $day->day=request('day');

        $day->save();
//        return redirect('admin.days');
    }



}
