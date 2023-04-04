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
    <form action="{{ route('mission.store') }}" method="POST" enctype="multipart/form-data">
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
                        <p class="mb-1 fs14">Title*</p>
                        <input type="text" class="popup" name="title" value="{{ old('title') }}">
                        @if ($errors->has('title'))
                            <span class="text-danger">{{ $errors->first('title') }}</span>
                        @endif
                        <p class="mb-1 mt-4 fs14">Short Description*</p>
                        <input type="text" class="popup" name="short_description"
                            value="{{ old('short_description') }}">
                        @if ($errors->has('short_description'))
                            <span class="text-danger">{{ $errors->first('short_description') }}</span>
                        @endif
                        <p class="mb-1 mt-4 fs14">Description</p>
                        <textarea rows="5" name="description" class="popup1">{{ old('description') }}</textarea>
                        <p class="mb-1 mt-4 fs14">Country*</p>
                        <select class="popup pt-0 pb-0" id="country-dd" name="country_id">
                            <option value="none" selected="" disabled="" hidden=""></option>
                            @foreach ($countries as $country)
                                <option value="{{ $country->country_id }}">{{ $country->name }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('country_id'))
                            <span class="text-danger">{{ $errors->first('country_id') }}</span>
                        @endif
                        <p class="mb-1 mt-4 fs14">City*</p>
                        <select class="popup pt-0 pb-0" name="city_id" id="city-dd">
                            <option value="none" selected="" disabled="" hidden=""></option>
                            @foreach ($cities as $city)
                                <option value="{{ $city->city_id }}">{{ $city->name }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('city_id'))
                            <span class="text-danger">{{ $errors->first('city_id') }}</span>
                        @endif
                        <p class="mb-1 mt-4 fs14">Organisation Name</p>
                        <input type="text" class="popup" name="organization_name"
                            value="{{ old('organization_name') }}">
                        <p class="mb-1 mt-4 fs14">Organisation Detail</p>
                        <input type="text" class="popup" name="organization_detail"
                            value="{{ old('organization_detail') }}">
                        <p class="mb-1 mt-4 fs14">Start Date</p>
                        <input type="datetime-local" step="1" class="popup" name="start_date"
                            value="{{ old('start_date') }}">
                        <p class="mb-1 mt-4 fs14">End Date</p>
                        <input type="datetime-local" step="1" class="popup" name="end_date"
                            value="{{ old('end_date') }}">
                        <p class="mb-1 mt-4 fs14">type*</p>
                        <select class="popup pt-0 pb-0" id="selecttype" name="mission_type">
                            <option value="none" selected="" disabled="" hidden=""></option>
                            <option value="TIME">Time</option>
                            <option value="GOAL">Goal</option>
                        </select>
                        @if ($errors->has('mission_type'))
                            <span class="text-danger">{{ $errors->first('mission_type') }}</span>
                        @endif
                        <div id="divResult"></div>
                        <p class="mb-1 mt-4 fs14">theme*</p>
                        <select class="popup pt-0 pb-0" name="theme_id">
                            <option value="none" selected="" disabled="" hidden=""></option>
                            @foreach ($themes as $theme)
                                <option value="{{ $theme->mission_theme_id }}">{{ $theme->title }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('theme_id'))
                            <span class="text-danger">{{ $errors->first('theme_id') }}</span>
                        @endif
                        <p class="mb-1 mt-4 fs14">skill</p>
                        <select class="popup pt-0 pb-0 h-50" name="skill_id[]" multiple="multiple" size="6">
                            @foreach ($skills as $skill)
                                <option value="{{ $skill->skill_id }}">{{ $skill->skill_name }}</option>
                            @endforeach
                        </select>
                        <p class="mb-1 mt-4 fs14">Image</p>
                        <input type="file" name="media_name[]" multiple="">
                        @if ($errors->has('media_name'))
                            <span class="text-danger">{{ $errors->first('media_name') }}</span>
                        @endif
                        <p class="mb-1 mt-4 fs14">Document</p>
                        <input type="file" name="document_name[]" multiple="">
                        <p class="mb-1 mt-4 fs14">Availability</p>
                        <select class="popup pt-0 pb-0" name="availability">
                            <option value="null" selected="" disabled="" hidden=""></option>
                            <option value="daily">Daily</option>
                            <option value="weekly">Weekly</option>
                            <option value="weekend">Weekend</option>
                            <option value="monthly">Monthly</option>
                        </select>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="d-flex align-content-end justify-content-end">
            <a class="col-example8 mt-4 mb-4 me-2 fs131" href="#">
                cancel
            </a>
            <button class="col-example mt-4 mb-4" name="add_mission" type="submit">
                save
            </button>
        </div>
    </form>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#selecttype').change(function() {
                var selectedOptions = $('#selecttype option:selected');
                if (selectedOptions.length > 0) {
                    var resultString = '';
                    selectedOptions.each(function() {
                        var val = $(this).val();
                        if (val == "TIME")
                            resultString +=
                            "<p class='mb-1 mt-4 fs14'>Total Seats</p><input type='number' class='popup' name='total_seat'><p class='mb-1 mt-4 fs14'>Registration Deadline</p><input type='datetime-local' step='1' class='popup' name='deadline'>";
                        else
                            resultString +=
                            "<p class='mb-1 mt-4 fs14'>Goal</p><input type='text' class='popup' name='goal_objective_text'><p class='mb-1 mt-4 fs14'>Goal Value*</p><input type='number' class='popup' name='goal_value'>";
                    });
                    $('#divResult').html(resultString);
                }
            });
        });
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
