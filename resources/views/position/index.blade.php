@extends('layouts.app')
@section('title')
    <div class="row">
        <div class="col-6"><h1>Positions</h1></div>
        <div class="col-6 text-right">
            <a href="{{route('positions.create')}}" class="btn btn-dark">Add Position</a>
        </div>
    </div>
@endsection
@section('content')
    <div class="container">
        <h5>Position List</h5>
        <table class="table table-striped table-bordered table-sm" id="positions-data-table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Last update</th>
                <th width="60px">Action</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
@endsection

@push('script')
    <script type="application/javascript">
        let table = $('#positions-data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{route('positions.index')}}",
            columns: [
                {data: 'name', name: 'name'},
                {data: 'updated_at', name: 'updated_at'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
    </script>
@endpush
