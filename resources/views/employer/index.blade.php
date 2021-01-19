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
        <table class="table table-bordered data-table" id="employers-data-table">
            <thead>
            <tr>
                <th>Photo</th>
                <th>Name</th>
                <th>Position</th>
                <th>Date of employment</th>
                <th>Phone number</th>
                <th>Email</th>
                <th>Salary</th>
                <th width="100px">Action</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
@endsection

@section('script')

@endsection
