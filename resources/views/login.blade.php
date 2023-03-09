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
        <form method="POST" action="{{ route('login.custom') }}">
            @csrf
            <div class="form-group mb-3">
                <span class="Email">Email Address</span>
                <input type="email" placeholder="Enter your email address..." id='email' name="email" value="{{ old('email') }}" class="Rounded-Rectangle-2 form-control" style="font-size:14px; height:40px;">
                @if ($errors->has('email'))
                <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>
            <div class="form-group mb-3">
                <span class="Email">Password</span>
                <input type="password" placeholder="Enter your password..." id="password" name="password" value="{{ old('password') }}" class="Rounded-Rectangle-2 form-control" style="font-size:14px; height:40px;">
                @if ($errors->has('password'))
                <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
            </div>
            <button class="login" type="submit">Login</button>
        </form>
        <p class="text-center mb-3 mt-3">
            <a href="/forget-password" class="lost">Lost your password?</a>
        </p>
        <p class="text-center lost mb-0">
            Don't have an account?
            <a href="/registration" style="color:blue;">Create an account</a>
        </p>
        <br><br>
    </div>
    <a href="/policy" class="text-center position-absolute bottom-0 start-50 translate-middle p-0 m-0 mt-3 Privacy-Policy">Privacy Policy</a>
</div>
@endsection