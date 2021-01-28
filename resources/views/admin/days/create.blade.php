@extends('admin.app')
@section('content')
    <div class="row">
        <div class="form-group">
            <form method="POST" action="{{ route('admin.days.store') }}" role="form">
                @csrf
                <input type="date" id="day" name="day" min="2021-11-1">
                <button class="btn btn-sm btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button>
            </form>
        </div>
    </div>
@endsection
