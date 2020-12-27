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
                <td>{{ $room->number }}</td>
                <td>{{ $room-> name}}</td>
                <td>{{ $room->rent }}</td>
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
