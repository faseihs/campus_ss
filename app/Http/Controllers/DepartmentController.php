<?php

namespace App\Http\Controllers;

use App\Model\Departments;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        return  view("department.list");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return  view("department.add-edit");
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
            "code"=>"required"
        ]);

        Departments::create($request->all());
        return  redirect(route("department.index"))->with("alert-success","Added Successfully");
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
        $department = Departments::findOrFail($id);
        return  view("department.add-edit",compact("department"));
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
        $department = Departments::findOrFail($id);
        $department->update($request->all());
        return  redirect(route("department.index"))->with("alert-success","Updated Successfully");
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
        $department = Departments::findOrFail($id);
        $department->delete();
        return  redirect(route("department.index"))->with("alert-success","Deleted Successfully");
    }


    public function ajaxData(Request $request){
        return DataTables::eloquent(Departments::query())
            ->toJson();
    }
}
