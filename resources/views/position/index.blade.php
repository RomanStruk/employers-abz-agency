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
    <div class="card shadow-none border">
        <div class="card-header">
            <h3 class="card-title">Position List</h3>
        </div>
        <div class="card-body p-0">
            <div class="dataTables_wrapper dt-bootstrap border border-gray">
                <div class="row p-3">
                    <div class="col-sm-6">
                        <div class="dataTables_length" id="example1_length">
                            <label>Show
                                <select name="length"  class="form-control input-sm">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select> entries
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div id="example1_filter" class="dataTables_filter">
                            <label>Search:
                                <input type="search" class="form-control input-sm" placeholder="" aria-controls="example1">
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <table id="example1" class="table table-bordered table-striped dataTable" role="grid"
                               aria-describedby="example1_info">
                            <thead>
                            <tr role="row">
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Name: activate to sort column ascending">Name
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Position: activate to sort column ascending">
                                    Last update
                                </th>
                                <th rowspan="1" colspan="1">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($positions as $position)
                            <tr role="row" class="odd">
                                <td>{{$position->name}}</td>
                                <td>{{$position->updated_at}}</td>
                                <td class="form-inline">
                                    <a class="btn btn-info btn-sm" href="{{route('positions.edit', $position)}}" title="Edit">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <form method="POST" action="{{route('positions.destroy', $position)}}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" value="submit" type="submit" onclick="return  confirm('Are you sure you want to remove employee?');"><i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th rowspan="1" colspan="1">Name</th>
                                <th rowspan="1" colspan="1">Last update</th>
                                <th rowspan="1" colspan="1">Action</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>

                <div class="row p-3">
                    <div class="col-sm-5">
                        <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">
                            Showing {{$positions->firstItem()}} to {{$positions->lastItem()}} of {{$positions->total()}} entries
                        </div>
                    </div>
                    <div class="col-sm-7">
                        {{$positions->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
