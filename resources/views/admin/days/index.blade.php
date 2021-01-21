@extends('admin.app')
@section('title') Dashboard @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-bed" aria-hidden="true" style="padding-right: 7px"></i>Rooms</h1>
        </div>
    </div>
    <input type="date" id="day" name="day"
           value="2021-01-13"
           min="2021-01-13" max="2022-01-1">
    <table class="table table-bordered table-hover">
        <thead>
        <tr>
            <th class="text-center">#</th>
            <th class="text-center">NAME</th>
            <th class="text-center">GUESTS</th>
            <th class="text-center">PRICE</th>
            <th class="text-center">CHARGES</th>
            <th class="text-center">STATUS</th>
            <th class="text-center">BY</th>
        </tr>
        </thead>
        <tbody>
        {{--        {{ dd($rooms) }}--}}
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
                    <a href="/admin/guests/{{$room->booking_id}}/index">
                        {{ $room->number_of_guests }}
                    </a>
                </td>
                <td class="text-center">
                    @if ($room->money == 'green_paid')
                        <span class="badge badge-success">{{ $room->price }}</span>
                    @elseif($room->money == 'unpaid')
                        <span class="badge badge-light">{{ $room->price }}</span>
                    @else
                        <span class="badge badge-warning">{{ $room->price }}</span>
                    @endif
                    <ul class="app-nav">
                        <li class="dropdown">
                            <a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-caret-square-o-down" aria-hidden="true"></i></a>
                            <ul class="dropdown-menu settings-menu dropdown-menu-right">
                                <form action="/admin/bookings/money/{{$room->booking_id }}" method="POST" role="form" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <select id='money' name="money" class="form-control " onchange="this.form.submit()">
                                        <option value="green_paid" {{ old('money') ?? $room->money == 'green_paid' ? 'selected' : '' }}>green paid</option>
                                        <option value="orange_paid" {{ old('money') ?? $room->money == 'orange_paid' ? 'selected' : '' }}>orange paid</option>
                                        <option value="unpaid" {{ old('money') ?? $room->money == 'unpaid' ? 'selected' : '' }}>unpaid</option>
                                    </select>
                                </form>
                            </ul>
                        </li>
                    </ul>
                </td>
                <td class="text-center">
                    <a href="/admin/charges/{{$room->booking_id}}/index">{{ $room->total }}</a>
                    <a href="/admin/charges/{{$room->booking_id}}/create" class="btn btn-sm btn-outline-secondary">+</a>
                </td>
                <td class="text-center">
                    <form action="/admin/bookings/status/{{$room->booking_id }}" method="POST" role="form" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <select id='status' name="status" class="form-control custom-select" onchange="this.form.submit()">
                            <option value="confirmed" {{ old('status') ?? $room->status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                            <option value="checked_out" {{ old('status') ?? $room->status == 'checked_out' ? 'selected' : '' }}>Checked out</option>
                            <option value="reserved" {{ old('status') ?? $room->status == 'reserved' ? 'selected' : '' }}>Reserved</option>
                            <option value="busy" {{ old('status') ?? $room->status == 'busy' ? 'selected' : '' }}>Busy</option>
                        </select>
                    </form>
                </td>
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
