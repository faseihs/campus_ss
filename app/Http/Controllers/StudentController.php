<?php

namespace App\Http\Controllers;

use App\Model\Departments;
use App\Model\Program;
use App\Model\SessionType;
use App\Model\Student;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        return  view("student.list");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $departments = Departments::with("programs")->get();
        $sessions = SessionType::all();

        return  view("student.add-edit",compact("departments","sessions"));
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
            "name"=>"required|string",
            "age"=>"required|numeric",
            "pin"=>"required|numeric",
            "dob"=>"nullable|date",
            "gender"=>"required|string",
            "parent_name"=>"required|string",
            "parent_number"=>"required|numeric",
        ]);

        Student::create($request->all());
        return  redirect(route("student.index"))->with("alert-success","Added Successfully");

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
        $student = Student::findOrFail($id);
        $departments = Departments::with("programs")->get();
        $sessions = SessionType::all();
        return  view("student.add-edit",compact("departments","sessions","student"));
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
        $student = Student::findOrFail($id);
        $this->validate($request,[
            "name"=>"required|string",
            "age"=>"required|numeric",
            "pin"=>"required|numeric",
            "dob"=>"nullable|date",
            "gender"=>"required|string",
            "parent_name"=>"required|string",
            "parent_number"=>"required|numeric",
        ]);

        $student->update($request->all());
        return  redirect(route("student.index"))->with("alert-success","Updated Successfully");
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
        $student = Student::findOrFail($id);
        $student->delete();
        return  redirect(route("student.index"))->with("alert-success","Deleted Successfully");

    }

    public function ajaxData(Request $request){
        $query = Student::query();
        $query->with(["program","department","session_type"]);
        return DataTables::eloquent($query)
            ->addColumn("department",function (Student $p){
                return $p->department?$p->department->name:"-";
            })
            ->addColumn("program",function (Student $p){
                return $p->program?$p->program->name:"-";
            })
            ->addColumn("session_type",function (Student $p){
                return $p->session_type?$p->session_type->name:"-";
            })
            ->toJson();
    }
}
