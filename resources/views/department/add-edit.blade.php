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
                                <i class="fa fa-reorder"></i>{{isset($department)?"Edit":"Add"}} department
                            </div>
                        </div>
                        <div class="card-body form">
                            <!-- BEGIN FORM-->
                            <form id="form_sample_2" class="form-horizontal" method="post"

                                  action="{{ isset($department)?"/department/".$department->id:'/department' }}"
                                  autocomplete="off">
                                <!-- CSRF Token -->
                            @csrf
                            @if(isset($department))
                                @method("PUT")
                            @endif
                            <!-- ./ csrf token -->
                                <div class="form-body">
                                    @include('admin.shared.messages')
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Name  <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-md-4">
                                            <div class="input-icon right">
                                                <i class="fa"></i>
                                                <input type="text" class="form-control" name="name" value="{{{ old('name', isset($department) ? $department->name : null) }}}"  required/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3">Code <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-md-4">
                                            <div class="input-icon right">
                                                <i class="fa"></i>
                                                <input placeholder="Short Code/ID" type="code" class="form-control" name="code" value="{{{ old('code', isset($department) ? $department->code : null) }}}"  required/>
                                            </div>
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
