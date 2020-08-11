@extends('admin.layouts.app')

@section('styles')

@endsection

@section('content')
    <div class="content">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN VALIDATION STATES-->
                    <div class="card">
                        <div class="card-header">
                            <div class="caption">
                                <i class="fa fa-reorder"></i>{{isset($student)?"Edit":"Add"}} student
                            </div>
                        </div>
                        <div class="card-body form">
                            <!-- BEGIN FORM-->
                            <form id="form_sample_2" class="form-horizontal" method="post"

                                  action="{{ isset($student)?"/student/".$student->id:'/student' }}"
                                  autocomplete="off">
                                <!-- CSRF Token -->
                            @csrf
                            @if(isset($student))
                                @method("PUT")
                            @endif
                            <!-- ./ csrf token -->
                                <div class="form-body">
                                    @include('admin.shared.messages')
                                    <div class="form-group row">
                                        <label class="control-label col-md-2">Name  <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" name="name" value="{{{ old('name', isset($student) ? $student->name : null) }}}"  required/>

                                        </div>

                                        <label class="control-label col-md-2 text-right">Age  <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-md-4">
                                            <input type="number" class="form-control" name="age" value="{{{ old('age', isset($student) ? $student->age : null) }}}"  required/>

                                        </div>

                                    </div>

                                    <div class="form-group row">

                                        <label class="control-label col-md-2">Birth Date
                                        </label>
                                        <div class="col-md-4">
                                            <input type="date" class="form-control" name="dob" value="{{{ old('dob', isset($student) ? $student->dob : null) }}}" />

                                        </div>

                                        <label class="control-label col-md-2 text-right">Gender  <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-md-4">
                                            <select required name="gender" class="form-control">
                                                <option value="">Select</option>
                                                <option {{isset($student) ? ($student->gender=="Male"?"selected":"") : ""}} value="Male">Male</option>
                                                <option {{isset($student) ? ($student->gender=="Female"?"selected":"") : ""}} value="Female">Female</option>
                                            </select>
                                        </div>

                                    </div>

                                    <div class="form-group row">
                                        <label class="control-label col-md-2">Guardian Name  <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" name="parent_name" value="{{{ old('parent_name', isset($student) ? $student->parent_name : null) }}}"  required/>

                                        </div>

                                        <label class="control-label col-md-2 text-right">Guardian Ph#  <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-md-4">
                                            <input type="number" class="form-control" name="parent_number" value="{{{ old('parent_number', isset($student) ? $student->parent_number : null) }}}"  required/>

                                        </div>

                                    </div>

                                    <div class="form-group row">
                                        <label class="control-label col-md-2">Department
                                        </label>
                                        <div class="col-md-4">
                                            <select class="form-control" name="department_id" >
                                                <option value="">Select</option>
                                                @foreach($departments as $d)
                                                    <option value="{{ $d->id }}" {{ old('department_id', isset($student) ? $student->department_id : null) == $d->id?'selected':'' }}>{{$d->name}}</option>
                                                @endforeach
                                            </select>


                                        </div>
                                        <label class="control-label col-md-2 text-right">Program
                                        </label>
                                        <div class="col-md-4">
                                            <select class="form-control" name="program_id" >
                                                <option value="">Select</option>
                                                @foreach($departments as $d)
                                                    <optgroup label="{{$d->name}}"></optgroup>
                                                    @foreach($d->programs as $p)
                                                        <option value="{{ $p->id }}" {{ old('program_id', isset($student) ? $student->program_id : null) == $p->id?'selected':'' }}>{{$p->name}}</option>
                                                    @endforeach
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label class="control-label col-md-2">Session
                                        </label>
                                        <div class="col-md-4">
                                            <select class="form-control" name="session_type_id" >
                                                <option value="">Select</option>
                                                @foreach($sessions as $s)
                                                    <option value="{{ $s->id }}" {{ old('session_type_id', isset($student) ? $student->session_type_id : null) == $s->id?'selected':'' }}>{{$s->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <label class="control-label col-md-2 text-right">Pincode  <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-md-4">
                                            <input type="number" class="form-control" name="pin" value="{{{ old('pin', isset($student) ? $student->pin : null) }}}"  required/>

                                        </div>
                                    </div>

                                </div>
                                <div class="form-actions fluid">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn btn-success">Submit</button>
                                        <button type="button" class="btn btn-default" onclick="window.history.back()">Cancel</button>
                                    </div>
                                </div>
                            </form>
                            <!-- END FORM-->
                        </div>
                    </div>
                    <!-- END VALIDATION STATES-->
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection
