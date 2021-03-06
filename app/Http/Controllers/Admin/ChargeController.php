<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Charge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class ChargeController extends Controller
{
    public function index(Booking $booking)
    {
        $charges = $booking->charges;
        return view('admin.charges.index', compact('booking','charges'));
    }

    public function create(Booking $booking)
    {
        $admin=Auth::guard('admin')->id();
        return view('admin.charges.create', compact('booking', 'admin'));
    }

    public function store(Request $request)
    {
        request()->validate([
            'price'=>'required'
        ]);

        $charge=new Charge();
        $charge->name=request('name');
        $charge->price=request('price');
        $charge->money=$request->has('money') ? 'green_paid' : 'unpaid';
        $charge->booking_id=request('booking_id');
        $charge->admin_id=request('admin_id');

        $charge->save();
        return redirect(route('admin.charges.index', $charge->booking_id));
    }

    public function edit(Charge $charge, Booking $booking)
    {

        $admin=Auth::guard('admin')->id();
        return view('admin.charges.edit', compact('charge', 'booking', 'admin'));
    }



    public function update(Charge $charge, Request $request)
    {
        request()->validate([
            'price'=>'required'
        ]);

        $charge->name=request('name');
        $charge->price=request('price');
        $charge->money=$request->has('money') ? 'green_paid' : 'unpaid';
        $charge->admin_id=request('admin_id');

        $charge->save();
        return redirect(route('admin.charges.index', $charge->booking_id));
    }

    public function delete(Charge $charge)
    {
        $charge->delete();
        echo("success!");
        return redirect(route('admin.charges.index', $charge->booking_id));
    }

    public function updateMoney(Charge $charge, Request $request)
    {
        $charge->money=request('money');

        $charge->save();
        return redirect(route('admin.charges.index', $charge->booking_id));
    }
}
