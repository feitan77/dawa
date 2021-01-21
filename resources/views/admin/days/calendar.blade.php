@extends('admin.app')
@section('content')
    <div class="row">

    <form action="{{ route('admin.days.store') }}" method="POST" role="form" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
    <input type="date" id="day" name="day"
       value="2021-01-13"
       min="2021-01-13" max="2022-01-1">
    </div>
        <div class="tile-footer">
            <button class="btn btn-sm btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button>
        </div>
    </form>
    </div>
@endsection
