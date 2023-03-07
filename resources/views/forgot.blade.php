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
        <form method="POST" action="{{ route('forget.password.post') }}">
            @csrf
            <p class="text-center text-1 mb-2">Forgot Password</p>
            <p class="text-center text-2">Enter your email address you've using for your account<br> below and we will
                send you password reset link
            </p>
            <div class="form-group mb-3">
                <span class="Email">Email Address</span>
                <input type="email" placeholder="Enter your email address..." name="email" value="{{ old('email') }}" class="Rounded-Rectangle-2 form-control" style="font-size:14px; height:40px;">
                @if ($errors->has('email'))
                <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>
            <button class="login" type="submit">Reset my password</button>
        </form>
        <p class="text-center">
            <a href="login" class="back">Login</a>
        </p>
        <br><br>
    </div>
    <a href="policy" class="text-center position-absolute bottom-0 start-50 translate-middle p-0 m-0 mt-3 Privacy-Policy">Privacy Policy</a>
</div>
@endsection