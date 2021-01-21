@extends('layouts.app')
@section('title')
    <h1>Employees</h1>
@endsection
@section('content')
    <div class="card shadow-none border border-dark" style="width: 800px">
        <div class="card-header">
            <h3 class="card-title">Add Employee</h3>
        </div>
        <div class="card-body">
            <form  action="{{ route('employees.store') }}" method="post"  enctype="multipart/form-data">
                @csrf
                @include('employee._form')
            </form>
        </div>
    </div>

@endsection
