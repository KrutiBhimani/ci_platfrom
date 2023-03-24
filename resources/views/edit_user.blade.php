@extends('layouts.home_header2')
@section('content')
    <br /><br />
    <form action="{{ route('edit_user.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div id="popup1" class="modal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content p-2">
                    <div class="modal-header pb-0 border-bottom-0">
                        <p class="mb-0 fs20">Change Password </p>
                        <img class="text-end mt-2 mb-2 pe-auto h13" src="mvc/Assets/images/cancel1.png" data-bs-dismiss="modal">
                    </div>
                    <div class="modal-body pb-2">
                        <input type="password" class="popup" name="old_password" placeholder="Enter old password">
                        @if ($errors->has('old_password'))
                            <span class="text-danger">{{ $errors->first('old_password') }}</span>
                        @endif
                        <input type="password" class="popup mt-3" name="password" placeholder="Enter new password">
                        @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                        <input type="password" class="popup mt-3" name="password_confirmation"
                            placeholder="Enter confirm password">
                        @if ($errors->has('password_confirmation'))
                            <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                        @endif
                    </div>
                    <div class="modal-footer border-top-0">
                        <button type="button" class="col-example8" data-bs-dismiss="modal">Cancle
                        </button>
                        <button type="submit" name='change' class="col-example7" data-bs-dismiss="modal">Change Password
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <form id="selectSort1" action="{{ route('edit_user.update', Auth::user()->user_id) }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div id="popup3" class="modal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content p-3">
                    <div class="modal-header pb-0 border-bottom-0">
                        <p class="mb-0 fs20">Add Your Skills</p>
                        <img class="text-end mt-2 mb-2 pe-auto h13" src="/storage/images/cancel1.png" data-bs-dismiss="modal">
                    </div>
                    <div class="modal-body pb-0">
                        <div class="row fs10">
                            <div class="col p-3 bsg">
                                <select id="selectCountries" class="w-100 border-0 fs12 ofy" name="skill[]" multiple="multiple"
                                    size="26">
                                    @foreach ($skills as $skill)
                                        <option value="{{ $skill->skill_id }}"
                                            @foreach ($selected_skills as $selected) {{ $selected->skill_id == $skill->skill_id ? 'selected' : '' }} @endforeach>
                                            {{ $skill->skill_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-1 align-self-center text-center">
                                <img class="mb-2" src="/storage/images/arrow.png">
                                <img class="mt-2" src="/storage/images/left.png">
                            </div>
                            <script>
                                $(document).ready(function() {
                                    $('#selectCountries').ready(function() {
                                        var selectedOptions = $('#selectCountries option:selected');
                                        if (selectedOptions.length > 0) {
                                            var resultString = '';
                                            selectedOptions.each(function() {
                                                resultString += $(this).text() + '<br/>';
                                            });
                                            $('#divResult').html(resultString);
                                        }
                                    });
                                });

                                $(document).ready(function() {
                                    $('#selectCountries').change(function() {
                                        var selectedOptions = $('#selectCountries option:selected');
                                        if (selectedOptions.length > 0) {
                                            var resultString = '';
                                            selectedOptions.each(function() {
                                                resultString += $(this).text().trim() + '<br/>';
                                            });
                                            $('#divResult').html(resultString);
                                        }
                                    });
                                });

                                function myFunction() {
                                    var rslt = document.getElementById("divResult").innerHTML;
                                    const chars = rslt.replace(/<br>/g, '\n');
                                    document.getElementById("divskill").innerHTML = chars.trim();
                                }
                            </script>
                            <div class="col p-3 bsg">
                                <div id="divResult fs12"></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer p-0 pt-2 border-top-0 d-flex justify-content-start">
                        <button type="button" class="col-example8" data-bs-dismiss="modal">Cancle
                        </button>
                        <button type="button" class="col-example7" data-bs-dismiss="modal" onclick="myFunction()">Save
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-lg">
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
            <div class="row mt-5">
                <div class="col-lg-3 col-md-3 col-sm-12 col-12 mb-5">
                    <div class="row col col-example10 text-center m-0">
                        <div class="col-lg-12 col-md-12 col-sm-5 col-5">
                            <script>
                                function readURL(input) {
                                    if (input.files && input.files[0]) {
                                        var reader = new FileReader();
                                        reader.onload = function(e) {
                                            $('#blah')
                                                .attr('src', e.target.result);
                                        };
                                        reader.readAsDataURL(input.files[0]);
                                    }
                                }
                            </script>
                            <label for="choose-file2">
                                <img id="blah"
                                    src="{{ Auth::user()->avatar != null ? '/storage/uplodes/' . Auth::user()->avatar : '/storage/images/user1.png' }}"
                                    class="rounded-circle mt-4 mb-3 h308 w308 pe-auto">
                            </label>
                            <input type="file" name="avatar" id="choose-file2" onchange="readURL(this);"
                                class="dnone" accept="image/x-png,image/jpg,image/jpeg">
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-5 col-5">
                            <h4 class="fs151">
                                {{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}</h4>
                            <a href="#" class="fs111 text-dark" data-bs-toggle="modal"
                                data-bs-target="#popup1">change password</a><br>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-12 col-12">
                    <div>
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link active1 gray ps-0 pe-0 pt-0" data-toggle="tab" href="#mission">Basic
                                    Information</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane show active" id="mission">
                                <div class="row mt-4">
                                    <div class="col">
                                        <p class="mb-1 fs14">Name</p>
                                        <input type="text" class="popup" name="first_name"
                                            value="{{ Auth::user()->first_name }}" placeholder="Enter your name">
                                        @if ($errors->has('first_name'))
                                            <span class="text-danger">{{ $errors->first('first_name') }}</span>
                                        @endif
                                    </div>
                                    <div class="col">
                                        <p class="mb-1 fs14">Surname</p>
                                        <input type="text" class="popup" name="last_name"
                                            value="{{ Auth::user()->last_name }}" placeholder="Enter your surname">
                                        @if ($errors->has('last_name'))
                                            <span class="text-danger">{{ $errors->first('last_name') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col">
                                        <p class="mb-1 fs14">Employee ID</p>
                                        <input type="text" class="popup" name="employee_id"
                                            value="{{ Auth::user()->employee_id }}" placeholder="Enter your employee id">
                                        @if ($errors->has('employee_id'))
                                            <span class="text-danger">{{ $errors->first('employee_id') }}</span>
                                        @endif
                                    </div>
                                    <div class="col">
                                        <p class="mb-1 fs14">Manager</p>
                                        <input type="text" class="popup" name="manager"
                                            value="{{ Auth::user()->manager }}" placeholder="Enter your manager details">
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col">
                                        <p class="mb-1 fs14">Title</p>
                                        <input type="text" class="popup" name="title"
                                            value="{{ Auth::user()->title }}" placeholder="Enter your employee id">
                                        @if ($errors->has('title'))
                                            <span class="text-danger">{{ $errors->first('title') }}</span>
                                        @endif
                                    </div>
                                    <div class="col">
                                        <p class="mb-1 fs14">Department</p>
                                        <input type="text" class="popup" name="department"
                                            value="{{ Auth::user()->department }}"
                                            placeholder="Enter your manager details">
                                        @if ($errors->has('department'))
                                            <span class="text-danger">{{ $errors->first('department') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <p class="mb-1 mt-4 fs14">My Profile</p>
                                <textarea rows="4" placeholder="Enter your message" name="profile_text" class="popup1">{{ Auth::user()->profile_text }}</textarea>
                                <p class="mb-1 mt-4 fs14">Why I Volunteer?</p>
                                <textarea rows="4" placeholder="Enter your message" name="why_i_volunteer" class="popup1">{{ strip_tags(Auth::user()->why_i_volunteer) }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link active1 gray ps-0 pe-0 pt-0" data-toggle="tab" href="#mission">Address
                                    Information</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane show active" id="mission">
                                <div class="row mt-4">
                                    <div class="col">
                                        <p class="mb-1 fs14">Country</p>
                                        <select id="country-dd" class="popup pt-0 pb-0" name="country_id">
                                            @foreach ($countries as $country)
                                                <option value="{{ $country->country_id }}"
                                                    {{ $country->country_id == Auth::user()->country_id ? 'selected' : '' }}>
                                                    {{ $country->name }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('country_id'))
                                            <span class="text-danger">{{ $errors->first('country_id') }}</span>
                                        @endif
                                    </div>
                                    <div class="col">
                                        <p class="mb-1 fs14">City</p>
                                        <select id="city-dd" class="popup pt-0 pb-0" name="city_id">
                                            @foreach ($cities as $city)
                                                <option value="{{ $city->city_id }}"
                                                    {{ $city->city_id == Auth::user()->city_id ? 'selected' : '' }}>
                                                    {{ $city->name }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('city_id'))
                                            <span class="text-danger">{{ $errors->first('city_id') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link active1 gray ps-0 pe-0 pt-0" data-toggle="tab"
                                    href="#mission">Professional
                                    Information</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane show active" id="mission">
                                <div class="row mt-4">
                                    <div class="col">
                                        <p class="mb-1 fs14">Availablity</p>
                                        <select class="popup pt-0 pb-0" name="availability">
                                            <option value="daily"
                                                {{ Auth::user()->availability == 'daily' ? 'selected' : '' }}>Daily
                                            </option>
                                            <option value="weekly"
                                                {{ Auth::user()->availability == 'weekly' ? 'selected' : '' }}>Weekly
                                            </option>
                                            <option value="weekend"
                                                {{ Auth::user()->availability == 'weekend' ? 'selected' : '' }}>Weekend
                                            </option>
                                            <option value="monthly"
                                                {{ Auth::user()->availability == 'monthly' ? 'selected' : '' }}>Monthly
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <p class="mb-1 fs14">LinkedIn</p>
                                        <input type="url" class="popup" name="linked_in_url"
                                            value="{{ Auth::user()->linked_in_url }}" placeholder="Enter linkedIn URL">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link active1 gray ps-0 pe-0 pt-0" data-toggle="tab" href="#mission">My
                                    Skills</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane show active" id="mission">
                                <textarea rows="6" class="popup1 mt-3 bgw" id="divskill" placeholder="select your skill" disabled="">@foreach ($selected_skills as $selected)@php echo $selected->skill_name.'&#13;&#10;';@endphp @endforeach</textarea>
                                <button type="button" class="col-example8 mt-3" data-bs-toggle="modal"
                                    data-bs-target="#popup3">Add Skills</button>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end mt-4 mb-5">
                        <button id="button" type="submit" name="edit_user"
                            class="scrollToTopButton col-example7">Save</button>
                    </div>
                </div>
            </div>
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
