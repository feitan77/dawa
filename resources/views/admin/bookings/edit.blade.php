@extends('admin.app')
@section('content')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <h3>Edit Booking</h3>
            <div class="tile">
                <form action="/admin/bookings/{{$booking->id }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="name">Name</label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" value="{{old('name') ?? $booking->name }}"/>
                            @error('name') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="price">Price</label>
                            <input class="form-control @error('price') is-invalid @enderror" type="number" name="price" id="price" value="{{old('price') ?? $booking->price }}"/>
                            @error('price') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" id="money" name="money" {{ old('money') ?? $booking->money == 'green_paid' ? 'checked' : '' }}/>Paid
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select id='status' class="form-control custom-select mt-15 @error('status') is-invalid @enderror" name="status" >
                                <option value="confirmed" {{ old('status') ?? $booking->status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                <option value="reserved" {{ old('status') ?? $booking->status == 'reserved' ? 'selected' : '' }}>Reserved</option>
                                <option value="busy" {{ old('status') ?? $booking->status == 'busy' ? 'selected' : '' }}>Busy</option>
                            </select>
                            @error('status') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label for="number_of_guests">Number of guests</label>
                            <select id='number_of_guests' class="form-control custom-select mt-15 @error('number_of_guests') is-invalid @enderror" name="number_of_guests">
                                <option value="1" {{ old('number_of_guests') ?? $booking->number_of_guests == '1' ? 'selected' : '' }}>1</option>
                                <option value="2" {{ old('number_of_guests') ?? $booking->number_of_guests == '2' ? 'selected' : '' }}>2</option>
                                <option value="3" {{ old('number_of_guests') ?? $booking->number_of_guests == '3' ? 'selected' : '' }}>3</option>
                                <option value="4" {{ old('number_of_guests') ?? $booking->number_of_guests == '4' ? 'selected' : '' }}>4</option>
                                <option value="5" {{ old('number_of_guests') ?? $booking->number_of_guests == '5' ? 'selected' : '' }}>5</option>
                                <option value="6" {{ old('number_of_guests') ?? $booking->number_of_guests == '6' ? 'selected' : '' }}>6</option>
                                <option value="7" {{ old('number_of_guests') ?? $booking->number_of_guests == '7' ? 'selected' : '' }}>7</option>
                                <option value="8" {{ old('number_of_guests') ?? $booking->number_of_guests == '8' ? 'selected' : '' }}>8</option>
                                <option value="9" {{ old('number_of_guests') ?? $booking->number_of_guests == '9' ? 'selected' : '' }}>9</option>
                                <option value="10" {{ old('number_of_guests') ?? $booking->number_of_guests == '10' ? 'selected' : '' }}>10</option>
                                <option value="11" {{ old('number_of_guests') ?? $booking->number_of_guests == '11' ? 'selected' : '' }}>11</option>
                                <option value="12" {{ old('number_of_guests') ?? $booking->number_of_guests == '12' ? 'selected' : '' }}>12</option>
                            </select>
                            @error('number_of_guests') {{ $message }} @enderror
                        </div>
                        <input type="hidden" name="admin_id" value="{{ $admin }}">
                    </div>
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>
                        <a class="btn btn-secondary" href="{{ url()->previous() }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
