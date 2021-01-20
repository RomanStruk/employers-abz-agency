<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class EmployerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
//        return Employer::with('position')->get();
        if ($request->ajax()) {
            $data = Employer::select('*')->with('position');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    return view('component.action')->with('id', $row->id)->with('route', 'employers')->render();
                })
                ->addColumn('photo', function($row){
                    return view('component.img')->with('photo', $row->photo)->render();
                })
                ->rawColumns(['action', 'photo'])
                ->make(true);
        }
        return view('employer.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Employer $employer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit(Employer $employer)
    {
        $employer->load('position:id,name');
        return view('employer.edit')->with('employer', $employer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Employer $employer
     * @return void
     */
    public function update(Request $request, Employer $employer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Employer  $employer
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Employer $employer)
    {
        $employer->delete();
        return redirect()->back()->with('success', 'Employer deleted');
    }
}
