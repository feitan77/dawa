@extends('admin.app')
@section('title') Dashboard @endsection
@section('content')

    <div class="app-title">
        <div>
            <h1><i class="fa fa-bed" aria-hidden="true" style="padding-right: 7px"></i>Rooms</h1>
        </div>
    </div>
    <div class="row">
        <div class="form-group">
            <form method="GET" role="form" id="theForm">
                <input type="date" id="day" name="day" value="{{ request()->segment(3) }}" min="2021-11-1" >
                <button class="btn btn-sm btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button>
            </form>
        </div>
    </div>


    <table class="table table-bordered table-hover">
        <thead>
        <tr class="text-center">
            <th>#</th>
            <th>NAME</th>
            <th>GUESTS</th>
            <th>PRICE</th>
            <th>CHARGES</th>
            <th>STATUS</th>
            <th>BY</th>
        </tr>
        </thead>
        <tbody>
        @foreach($rooms as $room)
            @if($room->booking_id==null)
                <tr class="table-light">
                    <td class="text-center"><a href="/admin/bookings/{{ $day->id }}/{{ $room->id }}/create">{{ $room->number }}</a></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            @else
            <tr class="text-center">
                <td><a href="/admin/bookings/{{ $day->id }}/{{ $room->id }}/create">{{ $room->number }}</a></td>
                <td>
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
                <td>
                    <a href="/admin/guests/{{$room->booking_id}}/index">
                        {{ $room->number_of_guests }}
                    </a>
                </td>
                <td>
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
                <td>
                    @if($room->total==null)
                        <a href="/admin/charges/{{$room->booking_id}}/create" class="btn btn-sm btn-outline-secondary">+</a>
                    @else
                        <a href="/admin/charges/{{$room->booking_id}}/index">{{ $room->total }}</a>
                    @endif
                </td>
                <td>
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
                <td>{{ $room->admin_name }}</td>
            </tr>
            @endif
        @endforeach
        </tbody>
    </table>
@endsection
@push('submit')
    <script>
    var theForm=document.getElementById('theForm');
    var theday = document.getElementById('day');
    theForm.onsubmit = function(e){
    location = "http://dawahotel/admin/days/"
            + encodeURIComponent(theday.value);
    return false;
    }
    </script>
@endpush
