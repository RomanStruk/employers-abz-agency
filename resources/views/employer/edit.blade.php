@extends('layouts.app')
@section('title')
    <h1>Employers</h1>
@endsection
@section('content')
    <div class="card shadow-none border border-dark" style="width: 800px">
        <div class="card-header">
            <h3 class="card-title">Edit Employee</h3>
        </div>
        <div class="card-body">
            <form  action="{{ route('employers.update', 1) }}" method="post">
                @csrf
                @include('employer._form')
            </form>
        </div>
    </div>

@endsection
