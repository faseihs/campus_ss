@extends('admin.layouts.auth')
@section('title')
    Login
@endsection


@section('content')

<!-- BEGIN LOGIN FORM -->
        <form class="login-form" action="{{ route('login') }}" method="post" onsubmit="btnsubmit.disabled = true; return true;">
            @csrf
            @include('admin.shared.messages')
            <h3 class="form-title text-center text-white mt-4">Login to your account</h3>
            <div class="form-group">
                <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                <label class="control-label ">Email</label>
                <div class="input-icon">

                    <input class="form-control placeholder-no-fix" type="email" autocomplete="off" placeholder="Email" name="email" value="{{ old('email') }}" required autofocus/>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label ">Password</label>
                <div class="input-icon">
                    <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password"/>
                </div>
            </div>
            <div class="form-actions text-white">
                <label class="switch pr-5 switch-light mr-3"><span>Remember Me</span>
                    <input type="checkbox" value="{{old('remember')}}" checked="checked"><span class="slider"></span>
                </label>
            </div>
            <div class="form-actions text-center mb-2">
               <button type="submit" name="btnsubmit" class="btn btn-info pull-right">
                    Login </button>
            </div>
            <div class="forget-password text-center text-white">
                <p>
                    Forgot your password ?Click <a class="font-weight-bold" href="{{ route('password.request') }}">here</a>
                    to reset your password.
                </p>
            </div>
        </form>

<!-- END LOGIN FORM -->
@endsection
