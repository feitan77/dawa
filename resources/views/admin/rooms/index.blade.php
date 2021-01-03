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
            <th>ROOM</th>
            <th>NAME</th>
            <th>PRICE</th>
            <th>CHARGES</th>
            <th>STATUS</th>
            <th>BY</th>
        </tr>
        </thead>
        <tbody>
        @foreach($rooms as $room)
            <tr>
                <td><a href="{{ route('admin.bookings.create', $room->id) }}">{{ $room->number }}</a></td>
                <td>
                    {{ $room-> name}}
                    <ul class="app-nav">
                        <li class="dropdown">
                            <a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-caret-square-o-down" aria-hidden="true"></i>
                            </a>
                            <ul class="dropdown-menu settings-menu dropdown-menu-right">
                                <li>
                                    <a class="dropdown-item" href="/admin/bookings/{{$room->booking_id }}/edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="/admin/bookings/{{$room->booking_id }}/delete"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </td>
                <td>{{ $room->price }}</td>
                <td>{{ $room->total }}</td>
                <td>{{ $room->status }}</td>
                <td>{{ $room->admin_name }}</td>
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
