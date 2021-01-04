@extends('admin.app')
@section('content')
{{--    <div style="margin: 0;" class="app-title">--}}
{{--        <a href="/admin/charges/{{$charge->booking_id}}/create" class="btn btn-primary pull-right">Add Charge</a>--}}
{{--    </div>--}}
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                        <tr>
                            <th class="text-center"> Name </th>
                            <th class="text-center"> Price </th>
{{--                            <th class="text-center"> By </th>--}}
                            <th style="width:100px; min-width:100px;" class="text-center text-danger"><i class="fa fa-bolt"> </i></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($charges as $charge)
                                <tr>
                                    <td class="text-center">{{ $charge->name }}</td>
                                    <td class="text-center">{{ $charge->price }}</td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group" aria-label="Second group">
                                            <a href="{{ route('admin.charges.edit', $charge->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                            <a href="{{ route('admin.charges.delete', $charge->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this charge?');"><i class="fa fa-trash"></i></a>
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

