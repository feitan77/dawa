<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use Illuminate\Http\Request;
use App\Models\Room;
use Illuminate\Support\Facades\DB;


class RoomController extends Controller
{
    public function index()
    {
//        $rooms=Room::with('bookings')->get();

        $rooms=DB::table('rooms')
            ->leftJoin('bookings', 'rooms.id', '=', 'bookings.room_id')
            ->leftJoin('admins', 'bookings.admin_id', '=', 'admins.id')
            ->leftJoin('bills', 'bookings.id', '=', 'bills.booking_id')
            ->leftJoin('charges', 'bookings.id', '=', 'charges.booking_id')
            ->select('rooms.number','bookings.name','bills.rent','charges.total', 'bookings.status', 'admins.admin_name')
//            ->where('is_available', '=', '1')
            ->get();
        return view(('admin.rooms.index'), compact('rooms'));

    }
}
