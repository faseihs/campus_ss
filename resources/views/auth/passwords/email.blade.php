@extends('admin.layouts.auth')

@section('content')

    <!-- BEGIN FORGOT PASSWORD FORM -->
    <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
        {{ csrf_field() }}
        <div class="logo-login text-center text-white">
        </div>
        @include('admin.shared.messages')
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <h3 class="mt-4 text-white">Forget Password ?</h3>
        <p class="text-white">
            Enter your e-mail address below to reset your password.
        </p>
        <div class="form-group">
            <div class="input-icon">
                <i class="fa fa-envelope"></i>
                <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email"  name="email" value="{{ old('email') }}" required/>
            </div>
        </div>
        <div class="form-group">
            <div class="g-recaptcha" data-sitekey="{{ config('recaptcha.site_key') }}" data-callback="btnEnable"></div>
        </div>
        <div class="form-actions">
            <button type="button" onclick="history.back()" class="btn btn-default">
                <i class="m-icon-swapleft"></i> Back </button>
            <button type="submit" class="btn btn-info pull-right">
                Send Password Reset Link </button>
        </div>
    </form>
    <!-- END FORGOT PASSWORD FORM -->
@endsection
