@extends('layouts.auth_header')

@section('content')
<div class="col-md-4 col-sm-12 d-md-flex align-items-center position-relative">
    <div class="Layer-52">
        <br>
        @if (Session::has('message'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('message') }}
        </div>
        @endif
        @if (Session::has('error'))
        <div class="alert alert-danger" role="alert">
            {{ Session::get('error') }}
        </div>
        @endif
        <form action="{{ route('reset.password.post') }}" method="POST">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <p class="text-center text-1 mb-2">New Password</p>
            <p class="text-center text-2">please enter new password in the fields below.</p>
            <div class="form-group mb-3">
                <span class="Email">New password</span>
                <input type="password" placeholder="Enter your new password..." name="password" class="Rounded-Rectangle-2 form-control" style="font-size:14px; height:40px;">
                @if ($errors->has('password'))
                <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
            </div>
            <div class="form-group mb-3">
                <span class="Email">Confirm new password</span>
                <input type="password" placeholder="Enter your new password again..." name="password_confirmation" class="Rounded-Rectangle-2 form-control" style="font-size:14px; height:40px;">
                @if ($errors->has('password_confirmation'))
                <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                @endif
            </div>
            <span id="error" style="color: red;"></span>
            <button class="login" type="submit">Change Password</button>
        </form>
        <p class="text-center">
            <a href="login" class="back">Login</a>
        </p>
        <br><br>
    </div>
    <a href="policy" class="text-center position-absolute bottom-0 start-50 translate-middle p-0 m-0 mt-3 Privacy-Policy">Privacy Policy</a>
</div>
@endsection