@extends('admin.app')
@section('content')
<div class="row">
    <form action="/admin/charges/{{$booking->id}}" method="POST" role="form" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="status">Name</label>
            <select id='name' class="form-control custom-select mt-15" name="name">
                <option value="minibar" selected>Minibar</option>
                <option value="laundry">laundry</option>
                <option value="restaurant">Restaurant</option>
                <option value="fine">Fine</option>
                <option value="other">Other</option>
            </select>
        </div>
        <div class="form-group">
            <label class="control-label" for="price">Price</label>
            <input class="form-control @error('price') is-invalid @enderror" type="number" name="price" id="price"/>
            @error('price') {{ $message }} @enderror
        </div>
        <input type="hidden" name="booking_id" value="{{ $booking->id }}">
        <input type="hidden" name="admin_id" value="{{ $admin }}">
        <div class="tile-footer">
    <button class="btn btn-sm btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>
    <a class="btn btn-sm btn-secondary" href="/admin/charges/{{$booking->id}}/index"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
</div>
</form>
</div>
@endsection
