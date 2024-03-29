@extends('layouts.admin_header')

@section('content')
    <script>
        @if (Session::has('message'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.success("{{ session('message') }}");
        @endif
        @if (Session::has('error'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.error("{{ session('error') }}");
        @endif
    </script>
    <br />
    <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <table class="table table-borderless aeb">
            <thead class="table-light border-bottom">
                <tr>
                    <td class="p-3 fs-6" scope="col">Add</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="p-3 fs-6">
                        <p class="mb-1 fs14">First Name</p>
                        <input type="text" name="first_name" class="popup" value="{{ old('first_name') }}">
                        <p class="mb-1 mt-4 fs14">Last Name</p>
                        <input type="text" name="last_name" class="popup" value="{{ old('last_name') }}">
                        <p class="mb-1 mt-4 fs14">Email</p>
                        <input type="email" name="email" class="popup" value="{{ old('email') }}">
                        @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                        <p class="mb-1 mt-4 fs14">Phone number</p>
                        <input type="text" name="phone_number" class="popup" value="{{ old('phone_number') }}">
                        @if ($errors->has('phone_number'))
                            <span class="text-danger">{{ $errors->first('phone_number') }}</span>
                        @endif
                        <p class="mb-1 mt-4 fs14">password</p>
                        <input type="password" name="password" class="popup">
                        @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                        <p class="mb-1 mt-4 fs14">Avatar</p>
                        <input type="file" name="avatar" value="">
                        @if ($errors->has('avatar'))
                            <span class="text-danger">{{ $errors->first('avatar') }}</span>
                        @endif
                        <p class="mb-1 mt-4 fs14">Employee ID</p>
                        <input type="text" name="employee_id" class="popup" value="{{ old('employee_id') }}">
                        <p class="mb-1 mt-4 fs14">Department</p>
                        <input type="text" name="department" class="popup" value="{{ old('department') }}">
                        <p class="mb-1 mt-4 fs14">Country</p>
                        <select class="popup pt-0 pb-0" id="country-dd" name="country_id">
                            <option value="none" selected="" disabled="" hidden=""></option>
                            @foreach ($countries as $country)
                                <option value="{{ $country->country_id }}">{{ $country->name }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('country_id'))
                            <span class="text-danger">{{ $errors->first('country_id') }}</span>
                        @endif
                        <input type="number" name="selected_country_id" id="divResult" value="" hidden="">
                        <p class="mb-1 mt-4 fs14">City</p>
                        <select class="popup pt-0 pb-0" id="city-dd" name="city_id">
                            <option value="none" selected="" disabled="" hidden=""></option>
                            @foreach ($cities as $city)
                                <option value="{{ $city->city_id }}">{{ $city->name }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('city_id'))
                            <span class="text-danger">{{ $errors->first('city_id') }}</span>
                        @endif
                        <p class="mb-1 mt-4 fs14">Profile text</p>
                        <textarea rows="5" name="profile_text" class="popup1">{{ old('profile_text') }}</textarea>
                        <p class="mb-1 mt-4 fs14">Status</p>
                        <select class="popup pt-0 pb-0" name="status">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="d-flex align-content-end justify-content-end">
            <a class="col-example8 mt-4 mb-4 me-2 fs131" href="#">
                cancel
            </a>
            <button class="col-example mt-4 mb-4" type="submit">
                save
            </button>
        </div>
    </form>
    <script>
        $(document).ready(function() {
            $('#country-dd').on('change', function() {
                var idState = this.value;
                $("#city-dd").html('');
                $.ajax({
                    url: "{{ url('api/fetch-cities') }}",
                    type: "POST",
                    data: {
                        country_id: idState,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(res) {
                        $('#city-dd').html('<option value="">Select City</option>');
                        $.each(res.cities, function(key, value) {
                            $("#city-dd").append('<option value="' + value
                                .city_id + '">' + value.name + '</option>');
                        });
                    }
                });
            });
        });
    </script>
@endsection
