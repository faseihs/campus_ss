@extends('admin.layouts.app')


@section('content')
    @include('admin.shared.messages')
    <div class="content">
        <div class="animated fadeIn">
            <div class="row">
        <div class="col-md-12">
            <!-- BEGIN VALIDATION STATES-->
            <div class="card">
                <div class="card-header">
                    <div class="caption">
                        <i class="fa fa-reorder"></i>Update Profile
                    </div>
                </div>
                <div class="card-body form">
                    <!-- BEGIN FORM-->
                    <form id="form_sample_2" class="form-horizontal" method="post"
                          action=""
                          autocomplete="off">
                        <!-- CSRF Token -->
                        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                        <!-- ./ csrf token -->
                        <div class="form-body">
                            <div class="form-group">
                                <label class="control-label col-md-3">Name
                                </label>
                                <div class="col-md-6">
                                    <div class="input-icon right">
                                        <i class="fa"></i>
                                        <input type="text" class="form-control" name="name" value="{{{ old('name', isset($user) ? $user->name : null) }}}" maxlength="255">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Email
                                </label>
                                <div class="col-md-6">
                                    <div class="input-icon right">
                                        <i class="fa"></i>
                                        <input type="email" class="form-control" name="email" value="{{{ old('email', isset($user) ? $user->email : null) }}}">
                                    </div>
                                </div>
                            </div>

                            <hr>
                            <div class="form-group">
                                <label class="control-label col-md-3">New Password <span class="required">*</span>
                                </label>
                                <div class="col-md-6">
                                    <div class="input-icon right">
                                        <i class="fa"></i>
                                        <input autocomplete="off" autofill="off" type="password" class="form-control" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*?[#?!@$%^&*-]).{8,}" title="Must contain at least one number, one uppercase letter, one lowercase letter, one special character and at least 8 or more characters"/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Confirm Password <span class="required">*</span>
                                </label>
                                <div class="col-md-6">
                                    <div class="input-icon right">
                                        <i class="fa"></i>
                                        <input type="password" class="form-control" name="password_confirmation" />
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

@section('footer')
@endsection
