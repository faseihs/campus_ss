<?php

namespace App\Http\Controllers;

use App\Model\SessionType;
use Illuminate\Http\Request;
use Symfony\Component\VarDumper\Cloner\Data;
use Yajra\DataTables\Facades\DataTables;

class SessionTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return  view("session_type.list");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return  view("session_type.add-edit");
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
        ]);

        SessionType::create($request->all());
        return  redirect(route("session.index"))->with("alert-success","Added Successfully");

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
        $session_type = SessionType::findOrFail($id);
        return  view("session_type.add-edit",compact("session_type"));
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
        $session = SessionType::findOrFail($id);
        $this->validate($request,[
            "name"=>"required",
        ]);

       $session->update($request->all());
        return  redirect(route("session.index"))->with("alert-success","Updated Successfully");
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
        $session = SessionType::findOrFail($id);
        $session->delete();
        return  redirect(route("session.index"))->with("alert-success","Deleted Successfully");

    }

    public function ajaxData(){
        return DataTables::eloquent(SessionType::query())
            ->toJson();

    }
}
