@extends('layouts.app')
@section('title')
    <div class="row">
        <div class="col-6"><h1>Employers</h1></div>
        <div class="col-6 text-right">
            <a href="{{route('employers.create')}}" class="btn btn-dark">Add Employer</a>
        </div>
    </div>
@endsection
@section('content')
    <div class="container">
        <h5>Employer List</h5>
        <table class="table table-striped table-bordered table-sm" id="employers-data-table">
            <thead>
            <tr>
                <th>Photo</th>
                <th>Name</th>
                <th>Position</th>
                <th>Date of employment</th>
                <th>Phone number</th>
                <th>Email</th>
                <th>Salary</th>
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
    let table = $('#employers-data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{route('employers.index')}}",
        columns: [
            {data: 'photo', name: 'photo', orderable: false, searchable: false},
            {data: 'name', name: 'name'},
            {data: 'position.name', name: 'position_id'},
            {data: 'date_of_employment', name: 'date_of_employment'},
            {data: 'phone', name: 'phone'},
            {data: 'email', name: 'email'},
            {data: 'salary', name: 'salary'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
</script>
@endpush
