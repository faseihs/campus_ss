<?php

namespace App\Http\Controllers;

use App\Model\Departments;
use App\Model\Program;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return  view("program.list");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $departments = Departments::all();
        return  view("program.add-edit",compact("departments"));
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
        $this->validate($request,[
            "name"=>"required",
            "code"=>"required",
        ]);

        Program::create($request->all());
        return  redirect(route("program.index"))->with("alert-success","Added Successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $program = Program::findOrFail($id);
        $departments = Departments::all();
        return  view("program.add-edit",compact("program","departments"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $program = Program::findOrFail($id);
        $program->update($request->all());
        return  redirect(route("program.index"))->with("alert-success","Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $program = Program::findOrFail($id);
        $program->delete();
        return  redirect(route("program.index"))->with("alert-success","Deleted Successfully");
    }

    public function ajaxData(Request $request){
        $query = Program::query();
        $query->with("department");
        return DataTables::eloquent($query)
            ->addColumn("department",function (Program $p){
                return $p->department?$p->department->name:"-";
            })
            ->toJson();
    }
}
