<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Yajra\DataTables\DataTables;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Employee::select('*')->with('position');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    return view('component.action')->with('id', $row->id)->with('route', 'employees')->render();
                })
                ->addColumn('photo', function($row){
                    return view('component.img')->with('photo', $row->photo)->render();
                })
                ->rawColumns(['action', 'photo'])
                ->make(true);
        }
        return view('employee.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeRequest $request)
    {
        return $request->validated();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Contracts\View\View
     */
    public function edit(Employee $employee)
    {
        $employee->load('position:id,name');
        $employee->load('head:id,name');
        return view('employee.edit')->with('employee', $employee);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EmployeeRequest $request
     * @param \App\Models\Employee $employee
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(EmployeeRequest $request, Employee $employee)
    {
        $data = array_filter($request->validated());
        if ($request->hasFile('photo')){
            $photo = $request->file('photo');
            $filename    = $photo->getClientOriginalName();
            $photo->move(Storage::path('/public/image/employee/').'origin/',$filename);
            $thumbnail = Image::make(Storage::path('/public/image/employee/').'origin/'.$filename);
            $thumbnail->orientate();
            $thumbnail->fit(300, 300);
            $thumbnail->save(Storage::path('/public/image/employee/').'thumbnail/'.$filename, 80, 'jpg');
            $data['photo'] = $filename;
        }

        $employee->fill($data);
        $employee->save();

        return redirect()->back()->with('success', 'Position updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->back()->with('success', 'Employee deleted');
    }
}
