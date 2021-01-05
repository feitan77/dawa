@extends('admin.app')
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-users" aria-hidden="true"></i> Guests</h1>
            <p>list of all guests</p>
        </div>
    </div>
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
                            <th class="text-center"> Date </th>
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
                                    <td class="text-center">{{ $guest->created_at }}</td>
                                </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script type="text/javascript" src="{{ asset('backend/js/plugins/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/plugins/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
@endpush
