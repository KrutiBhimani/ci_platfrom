@extends('layouts.admin_header')

@section('content')
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
<br/>
<form action="{{ route('user.add') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <table class="table table-borderless" style="border: 1px solid #dee2e6;">
        <thead class="table-light border-bottom">
            <tr>
                <td class="p-3 fs-6" scope="col">Add</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="p-3 fs-6">
                    <p class="mb-1" style="font-size:14px;">First Name</p>
                    <input type="text" name="first_name" class="popup">
                    <p class="mb-1 mt-4" style="font-size:14px;">Last Name</p>
                    <input type="text" name="last_name" class="popup">
                    <p class="mb-1 mt-4" style="font-size:14px;">Email</p>
                    <input type="email" name="email" class="popup">
                    @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                    <p class="mb-1 mt-4" style="font-size:14px;">Phone number</p>
                    <input type="text" name="phone_number" class="popup">
                    @if ($errors->has('phone_number'))
                        <span class="text-danger">{{ $errors->first('phone_number') }}</span>
                    @endif
                    <p class="mb-1 mt-4" style="font-size:14px;">password</p>
                    <input type="password" name="password" class="popup">
                    @if ($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
                    <p class="mb-1 mt-4" style="font-size:14px;">Avatar</p>
                    <input type="file" name="avatar" value="">
                    @if ($errors->has('avatar'))
                        <span class="text-danger">{{ $errors->first('avatar') }}</span>
                    @endif
                    <p class="mb-1 mt-4" style="font-size:14px;">Employee ID</p>
                    <input type="text" name="employee_id" class="popup">
                    <p class="mb-1 mt-4" style="font-size:14px;">Department</p>
                    <input type="text" name="department" class="popup">
                    <p class="mb-1 mt-4" style="font-size:14px;">Country</p>
                    <select class="popup pt-0 pb-0" id="selectCountries" name="country_id">
                        <option value="none" selected="" disabled="" hidden=""></option>
                        @foreach ($countries as $country)
                            <option value="{{ $country->country_id }}">{{ $country->name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('country_id'))
                        <span class="text-danger">{{ $errors->first('country_id') }}</span>
                    @endif
                    <input type="number" name="selected_country_id" id="divResult" value="" hidden="">
                    <p class="mb-1 mt-4" style="font-size:14px;">City</p>
                    <select class="popup pt-0 pb-0" name="city_id">
                        <option value="none" selected="" disabled="" hidden=""></option>
                        @foreach ($cities as $city)
                            <option value="{{ $city->city_id }}">{{ $city->name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('city_id'))
                        <span class="text-danger">{{ $errors->first('city_id') }}</span>
                    @endif
                    <p class="mb-1 mt-4" style="font-size:14px;">Profile text</p>
                    <textarea rows="5" name="profile_text" class="popup1"></textarea>
                    <p class="mb-1 mt-4" style="font-size:14px;">Status</p>
                    <select class="popup pt-0 pb-0" name="status">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </td>
            </tr>
        </tbody>
    </table>
    <div class="d-flex align-content-end justify-content-end">
        <a class="col-example8 mt-4 mb-4 me-2" href="#" style="font-size:calc(13px + 0.1vw);">
        cancel
        </a>
        <button class="col-example mt-4 mb-4" type="submit" style="font-size:calc(13px + 0.1vw);">
        save
        </button>
    </div>
</form>
@endsection