@extends('admin.layouts.auth')

@section('content')
<form class="form-horizontal" method="POST" action="{{ route('password.request') }}">
    {{ csrf_field() }}
     @include('admin.shared.messages')
    <input type="hidden" name="token" value="{{ $token }}">
    <h3 class="mt-4 text-white">Reset Password</h3>
    <div class="form-group">
        <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
        <label class="control-label visible-ie8 visible-ie9">Email</label>
        <div class="input-icon">
            <i class="fa fa-envelope"></i>
            <input readonly class="form-control placeholder-no-fix" type="email" placeholder="Email" name="email" value="{{old("email",$email)}}" required autofocus/>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label visible-ie8 visible-ie9 text-white">Password</label>
        <div class="input-icon">
            <i class="fa fa-lock"></i>
            <input class="form-control placeholder-no-fix" type="password" autocomplete="off" id="register_password" placeholder="Password" name="password" required/>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label visible-ie8 visible-ie9 text-white">Re-type Your Password</label>
        <div class="controls">
            <div class="input-icon">
                <i class="fa fa-check"></i>
                <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Re-type Your Password" name="password_confirmation" required/>
            </div>
        </div>
    </div>
    <div class="form-actions">
        <button type="button" class="btn btn-default" onclick="history.back()">
            <i class="m-icon-swapleft"></i> Back </button>
        <button type="submit"  class="btn btn-info pull-right">
            Submit<i class="m-icon-swapright m-icon-white"></i>
        </button>
    </div>
</form>
<!-- END REGISTRATION FORM -->
@endsection
