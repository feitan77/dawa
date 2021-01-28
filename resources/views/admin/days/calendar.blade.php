@extends('admin.app')
@section('content')
    <div class="row">
        <div class="form-group">
            <form method="GET" role="form" id="theForm">
                <input type="date" id="day" name="day" value="{{ request()->segment(3) }}" min="2021-11-1" >
                <button class="btn btn-sm btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button>
            </form>
        </div>
    </div>
@endsection
@push('submit')
    <script>
        var theForm=document.getElementById('theForm');
        var theday = document.getElementById('day');
        theForm.onsubmit = function(e){
            location = "http://localhost/admin/days/"
                + encodeURIComponent(theday.value);
            return false;
        }
    </script>
@endpush
