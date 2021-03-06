@extends('layouts.app')
@section('title')
    <h1>Positions</h1>
@endsection
@section('content')
    <div class="card shadow-none border border-dark" style="width: 800px">
        <div class="card-header">
            <h3 class="card-title">Edit Position</h3>
        </div>
        <div class="card-body">
            <form  action="{{ route('positions.update', $position) }}" method="post">
                @csrf
                @method('PATCH')
                @include('position._form')
            </form>
        </div>
    </div>

@endsection
