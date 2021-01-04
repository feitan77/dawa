@extends('admin.app')
@section('content')
    <div class="row">
        <form action="/admin/guests/{{$booking->id}}" method="POST" role="form" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="control-label" for="full_name">Full Name</label>
                <input class="form-control" type="text" name="full_name" id="full_name" />
            </div>
            <div class="form-group">
                <label class="control-label" for="age">Age</label>
                <input class="form-control" type="text" name="age" id="age" />
            </div>
            <div class="form-group">
                <label class="control-label" for="state">State</label>
                <input class="form-control" type="text" name="state" id="state" />
            </div>
            <div class="form-group">
                <label class="control-label" for="work">Work</label>
                <input class="form-control" type="text" name="work" id="work" />
            </div>
            <div class="form-group">
                <label class="control-label" for="phone">Phone</label>
                <input class="form-control" type="text" name="phone" id="phone" />
            </div>
            <input type="hidden" name="booking_id" value="{{ $booking->id }}">
            <div class="tile-footer">
                <button class="btn btn-sm btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>
                <a class="btn btn-sm btn-secondary" href="/admin/guests/{{$booking->id}}/index"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
            </div>
        </form>
    </div>
@endsection
