@extends('admin.app')
@section('content')

    <div class="row">
        <div class="col-md-8 mx-auto">
            <h3>{{ $room->number }} - New Booking</h3>
            <div class="tile">
                <form action="/admin/bookings/{{$room->id}}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="name">Name</label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" />
                            @error('name') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="price">Price</label>
                            <input class="form-control @error('price') is-invalid @enderror" type="number" name="price" id="price"/>
                            @error('price') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" id="is_received" name="is_received"/>Paid
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select id='status' class="form-control custom-select mt-15 @error('status') is-invalid @enderror" name="status">
                                <option value="confirmed" selected>Confirmed</option>
                                <option value="reserved">Reserved</option>
                                <option value="busy">Busy</option>
                            </select>
                            @error('status') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label for="number_of_guests">Number of guests</label>
                            <select id='number_of_guests' class="form-control custom-select mt-15 @error('number_of_guests') is-invalid @enderror" name="number_of_guests">
                                <option value="1" selected>1</option>
                                <option value="2">1</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                            </select>
                            @error('number_of_guests') {{ $message }} @enderror
                        </div>
                        <input type="hidden" name="room_id" value="{{ $room->id }}">
                        <input type="hidden" name="admin_id" value="{{ $admin }}">
                    </div>
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>
                        &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="{{ route('admin.rooms') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
