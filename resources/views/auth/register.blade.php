@extends('admin.layouts.auth')
@section('title')
    Register
@endsection
@section('content')
<!-- BEGIN REGISTRATION FORM -->
<form class="form-horizontal text-white" method="POST" action="{{ route('register') }}">
    {{ csrf_field() }}
    <div class="logo-login text-center mb-4">
        @if (isset($custom_user) && $custom_user!=null)
            <a href="/" class="h1">
                @if($custom_user->logo)
                    <img style="height: 200px;" src="{{$main_logo}}" alt="{{ $name }}"/>
                @else
                    {{$custom_user->label}}
                @endif
            </a>
        @else
            <a href="/">
                <img style="height: 200px;" src="/assets/img/A.png" alt="{{ config('app.name', 'Admin Panel') }}"/>
            </a>
        @endif
    </div>
    @include('admin.shared.messages')

    <h3 class="text-white">Sign Up</h3>
    <p>
        Enter your personal details below:
    </p>

   @if(!$custom_user)
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9 text-white">User Type</label>
            <div class="controls">
                <div class="input-icon">
                    <select name="role_id" class="form-control" required>
                        <option><i class="fa fa-user"></i> User Type</option>
                        <option {{$role_id==2?"selected":''}} value="2">Reseller</option>
                        <option {{$role_id==3?"selected":''}} value="3">Client (End User)</option>
                    </select>
                </div>
            </div>
        </div>
    @else
        <input type="hidden" name="role_id" value="3">
    @endif

    {{-- <input type="hidden" name="role_id" value="3"> --}}

    <div class="form-group">
        <label class="control-label visible-ie8 visible-ie9 text-white">Full Name</label>
        <div class="input-icon">
            <i class="fa fa-font"></i>
            <input class="form-control placeholder-no-fix" type="text" placeholder="Full Name" name="name" value="{{ old('name') }}" required autofocus/>
        </div>
    </div>
    <div class="form-group">
        <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
        <label class="control-label visible-ie8 visible-ie9 text-white">Email</label>
        <div class="input-icon">
            <i class="fa fa-envelope"></i>
            <input class="form-control placeholder-no-fix" type="email" placeholder="Email" name="email" value="{{ old('email') }}" required/>
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

    
   {{-- <div class="form-group">
        <label>
            <input type="checkbox" name="tnc"/> I agree to the <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a>
        </label>
        <div id="register_tnc_error">
        </div>
    </div>--}}

    @if (!$custom_user)

    <div class="form-group">
        <label class="control-label visible-ie8 visible-ie9 text-white">Apps To Use</label>
        <div class="input-icon">
            <i class="fa fa-font"></i>
            <input class="form-control placeholder-no-fix" type="text" placeholder="Eg: Google,Craiglist etc" name="services" value="{{ old('services') }}" required />
        </div>
    </div>

    <div class="form-group">
        <label class="control-label visible-ie8 visible-ie9 text-white">Volume(Codes Per Day)</label>
        <div class="input-icon">
            <i class="fa fa-font"></i>
            <input class="form-control placeholder-no-fix" min="1" type="number" placeholder="Eg: 100,200,1000" name="volume" value="{{ old('volume') }}" required/>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label visible-ie8 visible-ie9 text-white">Target Price (Per Code)</label>
        <div class="input-icon">
            <i class="fa fa-font"></i>
            <input class="form-control placeholder-no-fix" step="any" type="number" placeholder="Eg: $1, $2 etc"  name="rate" value="{{ old('rate') }}" required/>
        </div>
    </div>

        
    @endif


    
        <div class="form-group">
            <div data-callback="btnEnable" class="g-recaptcha" data-sitekey="{{env('RECAPTCHA_SITE_KEY')}}"></div>
        </div>
    
  
    <div class="forget-password text-white">
        <p>Already have an account ? <a class="btn btn-sm btn-info" href="/login">Login</a></p>
    </div>
    <div class="form-actions text-white">
        <button type="button" class="btn btn-default" onclick="history.back()">
            <i class="m-icon-swapleft"></i> Back </button>
        <button disabled type="submit" id="btnsubmit" class="btn btn-info pull-right">
            Sign Up <i class="m-icon-swapright m-icon-white"></i>
        </button>
    </div>
</form>


<!-- END REGISTRATION FORM -->
@endsection