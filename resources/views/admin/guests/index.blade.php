@extends('admin.app')
@section('content')
{{--        <div style="margin: 0;" class="app-title">--}}
{{--            <a href="/admin/charges/{{$guest->booking_id}}/create" class="btn btn-primary pull-right">Add Guest</a>--}}
{{--        </div>--}}
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                        <tr>
                            <th class="text-center"> Full Name </th>
                            <th class="text-center"> Age </th>
                            <th class="text-center"> State </th>
                            <th class="text-center"> Work </th>
                            <th class="text-center"> Phone </th>
                            <th style="width:100px; min-width:100px;" class="text-center text-danger"><i class="fa fa-bolt"> </i></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($guests as $guest)
                            <tr>
                                <td class="text-center">{{ $guest->full_name }}</td>
                                <td class="text-center">{{ $guest->age }}</td>
                                <td class="text-center">{{ $guest->state }}</td>
                                <td class="text-center">{{ $guest->work }}</td>
                                <td class="text-center">{{ $guest->phone }}</td>
                                <td class="text-center">
                                    <div class="btn-group" role="group" aria-label="Second group">
                                        <a href="{{ route('admin.guests.edit', $guest->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                        <a href="{{ route('admin.guests.delete', $guest->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this guest?');"><i class="fa fa-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

