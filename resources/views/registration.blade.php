
@extends('layouts.auth_header')

@section('content')
<div class="col-md-4 col-sm-12 d-md-flex align-items-center position-relative">
    <div class="Layer-52">
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
        <form action="{{ route('register.custom') }}" method="POST">
            @csrf
            <div class="form-group mb-3">
                <span class="Email">First Name</span>
                <input type="text" placeholder="Enter your first name..." name="first_name" value="{{ old('first_name') }}" class="Rounded-Rectangle-2 form-control" style="font-size:14px; height:37px;">
            </div>
            <div class="form-group mb-3">
                <span class="Email">Lastname</span>
                <input type="text" placeholder="Enter your last name..." name="last_name" value="{{ old('last_name') }}" class="Rounded-Rectangle-2 form-control" style="font-size:14px; height:37px;">
            </div>
            <div class="form-group mb-3">
                <span class="Email">Phone Number</span>
                <input type="number" placeholder="Enter your phone number..." name="phone_number" value="{{ old('phone_number') }}" class="Rounded-Rectangle-2 form-control" style="font-size:14px; height:37px;">
                @if ($errors->has('phone_number'))
                <span class="text-danger">{{ $errors->first('phone_number') }}</span>
                @endif
            </div>
            <div class="form-group mb-3">
                <span class="Email">Email Address</span>
                <input type="email" placeholder="Enter your email address..." name="email" value="{{ old('email') }}" class="Rounded-Rectangle-2 form-control" style="font-size:14px; height:37px;">
                @if ($errors->has('email'))
                <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>
            <div class="form-group mb-3">
                <span class="Email">Password</span>
                <input type="password" placeholder="Enter your password..." name="password" value="{{ old('password') }}" class="Rounded-Rectangle-2 form-control" style="font-size:14px; height:37px;">
                @if ($errors->has('password'))
                <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
            </div>
            <div class="form-group mb-3">
                <span class="Email">Confirm Password</span>
                <input type="password" placeholder="Enter your password again..." name="password_confirmation" value="{{ old('password_confirmation') }}" class="Rounded-Rectangle-2 form-control" style="font-size:14px; height:37px;">
                @if ($errors->has('password_confirmation'))
                <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                @endif
            </div>
            <span id="error" style="color: red;"></span>
            <button class="login" name="register" type="submit">Register</button>
        </form>
        <p class="text-center m-0 mt-3">
            <a class="text-center m-0 lost" href="forget-password">Lost your password?</a>
        </p>
        <br>
    </div>
    <a href="policy" class="text-center position-absolute bottom-0 start-50 translate-middle p-0 m-0 mt-3 Privacy-Policy">Privacy Policy</a>
</div>
@endsection
