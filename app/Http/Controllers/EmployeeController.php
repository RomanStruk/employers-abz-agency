<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Yajra\DataTables\DataTables;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return View
     * @throws Exception
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
     * @return View
     */
    public function create()
    {
        return view('employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(EmployeeRequest $request)
    {
        // get validated params
        $data = $request->all(['name', 'email', 'phone', 'position_id', 'salary', 'date_of_employment']);
        // save photo
        $data['photo'] = $this->savePhoto($request->file('photo'));
        // new employee
        $employee = new Employee($data);
        // set parent
        $employee->parent_id = $request->get('parent_id');
        // save
        $employee->save();
        return redirect()->route('employees.index')->with('success', 'Employee created');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Employee $employee
     * @return View
     */
    public function edit(Employee $employee)
    {
        $employee->load('position:id,name');
        $employee->load('parent:id,name');
        return view('employee.edit')->with('employee', $employee);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EmployeeRequest $request
     * @param Employee $employee
     * @return RedirectResponse
     */
    public function update(EmployeeRequest $request, Employee $employee): RedirectResponse
    {
        // fill not null data for employee
        $employee->fill(
            array_filter(
                $request->all(['name', 'email', 'phone', 'position_id', 'salary', 'date_of_employment'])
            )
        );
        // update photo
        if ($request->hasFile('photo')){
            $this->deletePhoto($employee->photo);
            $employee->photo = $this->savePhoto($request->file('photo'));
        }

        //logic error
        try {
            $employee->parent_id = $request->get('parent_id');
        }catch (Exception $e ){
            return redirect()->back()->with('error', $e->getMessage());
        }
        //save
        if ($employee->save()) {
            if ($employee->hasMoved())
                Employee::fixTree();
            return redirect()->back()->with('success', 'Employee updated');
        } else {
            return redirect()->back()->with('error', 'Updating Fail');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Employee $employee
     * @return RedirectResponse
     */
    public function destroy(Employee $employee)
    {
        $this->deletePhoto($employee->photo);
        // delete employee
        $employee->delete();
        return redirect()->back()->with('success', 'Employee deleted');
    }

    /**
     * Save Photo
     *
     * @param UploadedFile $photo
     * @return string
     */
    public function savePhoto(UploadedFile $photo): string
    {
        $filename = time().$photo->getClientOriginalName();
        $photo->move(Storage::path('/public/image/employee/').'origin/', $filename);
        $thumbnail = Image::make(Storage::path('/public/image/employee/').'origin/'.$filename);
        $thumbnail->orientate();
        $thumbnail->fit(300, 300);
        $thumbnail->save(Storage::path('/public/image/employee/').'thumbnail/'.$filename, 80, 'jpg');

        return $filename;
    }

    /**
     * Delete Photo
     *
     * @param null $oldPhoto
     * @return void
     */
    public function deletePhoto($oldPhoto)
    {
        if ($oldPhoto == 'default.jpg') {
            return null;
        }
        Storage::delete('public/image/employee/origin/'.$oldPhoto);
        Storage::delete('public/image/employee/thumbnail/'.$oldPhoto);

    }
}
