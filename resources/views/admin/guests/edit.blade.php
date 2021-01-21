@extends('admin.app')
@section('content')
    <div class="row">
        <form action="/admin/guests/{{$guest->id}}" method="POST" role="form" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label class="control-label" for="full_name" >Full Name</label>
                <input class="form-control" type="text" name="full_name" id="full_name" value="{{old('full_name') ?? $guest->full_name }}"/>
            </div>
            <div class="form-group">
                <label class="control-label" for="age">Age</label>
                <input class="form-control" type="text" name="age" id="age" value="{{old('age') ?? $guest->age }}"/>
            </div>
            <div class="form-group">
                <label class="control-label" for="state">State</label>
                <input class="form-control" type="text" name="state" id="state" value="{{old('state') ?? $guest->state }}"/>
            </div>
            <div class="form-group">
                <label class="control-label" for="work">Work</label>
                <input class="form-control" type="text" name="work" id="work" value="{{old('work') ?? $guest->work }}"/>
            </div>
            <div class="form-group">
                <label class="control-label" for="phone">Phone</label>
                <input class="form-control" type="text" name="phone" id="phone" value="{{old('phone') ?? $guest->phone }}"/>
            </div>
            <div class="tile-footer">
                <button class="btn btn-sm btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>
                <a class="btn btn-sm btn-secondary" href="/admin/guests/{{$booking->id}}/index"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
            </div>
        </form>
    </div>
@endsection
