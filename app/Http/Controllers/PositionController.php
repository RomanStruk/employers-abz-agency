<?php

namespace App\Http\Controllers;

use App\Http\Requests\PositionRequest;
use App\Models\Position;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Position::select('*');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    return view('component.action')->with('id', $row->id)->with('route', 'positions')->render();
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('position.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('position.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PositionRequest $request)
    {
        $position = new Position($request->validated());
        $position->save();
        return redirect()->route('positions.index')->with('success', 'Position Created');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Position  $position
     * @return \Illuminate\Contracts\View\View
     */
    public function edit(Position $position)
    {
//        dd($position->attributesToArray());
        return view('position.edit')->with('position', $position);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function update(PositionRequest $request, Position $position)
    {
        $position->update($request->validated());
        return redirect()->back()->with('success', 'Position updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function destroy(Position $position)
    {
        //
    }
}
