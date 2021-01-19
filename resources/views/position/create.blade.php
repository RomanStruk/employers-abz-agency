@extends('layouts.app')
@section('title')
    <h1>Positions</h1>
@endsection
@section('content')
    <div class="card shadow-none border border-dark" style="width: 800px">
        <div class="card-header">
            <h3 class="card-title">Add Position</h3>
        </div>
        <div class="card-body">
            <form  action="{{ route('positions.store') }}" method="post">
                @csrf
                @include('position._form')
            </form>
        </div>
    </div>

@endsection
