<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Models\Room;
use Illuminate\Support\Facades\DB;


class RoomController extends Controller
{
    public function index()
    {
        $rooms=DB::table('rooms')
            ->leftJoin('bookings', 'rooms.id', '=', 'bookings.room_id')
            ->leftJoin('admins', 'bookings.admin_id', '=', 'admins.id')
            ->leftJoin('charges', 'bookings.id', '=', 'charges.booking_id')
            ->select('rooms.number','rooms.id','bookings.name','bookings.price', 'bookings.status', 'admins.admin_name', 'bookings.id as booking_id', 'bookings.number_of_guests')
//            ->where('is_available', '=', '1')
//                , 'charges.price as total'
            ->get();
        return view(('admin.rooms.index'), compact('rooms'));


    }
}
