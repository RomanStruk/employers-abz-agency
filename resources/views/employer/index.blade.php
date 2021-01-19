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
    <div class="card shadow-none border">
        <div class="card-header">
            <h3 class="card-title">Employer List</h3>
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
                                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-sort="ascending"
                                    aria-label="Rendering engine: activate to sort column descending">Photo
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Name: activate to sort column ascending">Name
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Position: activate to sort column ascending">
                                    Position
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Date of employment: activate to sort column ascending">
                                    Date of employment
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Phone number: activate to sort column ascending">Phone number
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Email: activate to sort column ascending">Email
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Salary: activate to sort column ascending">Salary
                                </th>
                                <th rowspan="1" colspan="1">Action</th>
                            </tr>
                            </thead>
                            <tbody>


                            <tr role="row" class="odd">
                                <td><img src="https://adminlte.io/themes/AdminLTE/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" width="35" height="35"></td>
                                <td>Firefox 1.0</td>
                                <td>Win 98+ / OSX.2+</td>
                                <td>1.7</td>
                                <td>A</td>
                                <td>A</td>
                                <td>A</td>
                                <td class="form-inline">
                                        <a class="btn btn-info btn-sm" href="#" title="Edit">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <form method="POST" action="">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm" value="submit" type="submit" onclick="return  confirm('Are you sure you want to remove employee?');"><i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                </td>
                            </tr>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th rowspan="1" colspan="1">Photo</th>
                                <th rowspan="1" colspan="1">Name</th>
                                <th rowspan="1" colspan="1">Position</th>
                                <th rowspan="1" colspan="1">Date of employment</th>
                                <th rowspan="1" colspan="1">Phone number</th>
                                <th rowspan="1" colspan="1">Email</th>
                                <th rowspan="1" colspan="1">Salary</th>
                                <th rowspan="1" colspan="1">Action</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <div class="row p-3">
                    <div class="col-sm-5">
                        <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing 1 to 10 of 57
                            entries
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <ul class="pagination pagination-sm float-right">
                            <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
