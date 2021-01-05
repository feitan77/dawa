@extends('admin.app')
@section('title') Dashboard @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-bed" aria-hidden="true" style="padding-right: 7px"></i>Rooms</h1>
        </div>
    </div>
    <table class="table table-bordered table-hover">
        <thead>
        <tr>
            <th class="text-center">ROOM</th>
            <th class="text-center">NAME</th>
            <th class="text-center">Guests</th>
            <th class="text-center">PRICE</th>
            <th class="text-center">CHARGES</th>
            <th class="text-center">STATUS</th>
            <th class="text-center">BY</th>
        </tr>
        </thead>
        <tbody>
{{--        {{dd($rooms)}}--}}
        @foreach($rooms as $room)
            <tr>
                <td class="text-center"><a href="{{ route('admin.bookings.create', $room->id) }}">{{ $room->number }}</a></td>
                <td class="text-center">
                    {{ $room-> name}}
                    <ul class="app-nav">
                        <li class="dropdown">
                            <a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-caret-square-o-down" aria-hidden="true"></i>
                            </a>
                            <ul class="dropdown-menu settings-menu dropdown-menu-right">
                                <li>
                                    <a class="dropdown-item" href="/admin/bookings/{{$room->booking_id }}/edit"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="/admin/bookings/{{$room->booking_id }}/delete" onclick="return confirm('Are you sure you want to delete this booking?');"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </td>
                <td class="text-center">
                    <a href="/admin/guests/{{$room->booking_id}}/create">
                        {{ $room->number_of_guests }}
                    </a>
                </td>
                <td class="text-center">{{ $room->price }}</td>
                <td class="text-center">
{{--                    <div>{{ $room->total }}</div>--}}
                    <a href="/admin/charges/{{$room->booking_id}}/create" class="btn btn-sm btn-outline-secondary">+</a>
                </td>
                <td class="text-center">{{ $room->status }}</td>
                <td class="text-center">{{ $room->admin_name }}</td>
            </tr>
{{--            @else--}}
{{--                <tr class="table-light">--}}
{{--                    <td>{{ $room->number }}</td>--}}
{{--                    <td></td>--}}
{{--                    <td></td>--}}
{{--                    <td></td>--}}
{{--                    <td></td>--}}
{{--                    <td></td>--}}
{{--                </tr>--}}
{{--            @endif--}}
        @endforeach

{{--        <tr>--}}
{{--            <td colspan="6"></td>--}}
{{--        </tr>--}}
{{--        <tr>--}}
{{--            <td colspan="6"><h4>SUITES</h4></td>--}}
{{--        </tr>--}}
{{--        <tr>--}}
{{--            <td>323</td>--}}
{{--            <td>حاجي سواره</td>--}}
{{--            <td>80$</td>--}}
{{--            <td>add</td>--}}
{{--            <td>checked-out</td>--}}
{{--            <td>hazim</td>--}}
{{--        </tr>--}}
        </tbody>
    </table>
@endsection
