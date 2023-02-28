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
<form action="{{ route('mission.add') }}" method="POST" enctype="multipart/form-data">
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
                    <p class="mb-1" style="font-size:14px;">Title*</p>
                    <input type="text" class="popup" name="title"  value="{{ old('title') }}">
                    @if ($errors->has('title'))
                        <span class="text-danger">{{ $errors->first('title') }}</span>
                    @endif
                    <p class="mb-1 mt-4" style="font-size:14px;">Short Description*</p>
                    <input type="text" class="popup" name="short_description" value="{{ old('short_description') }}">
                    @if ($errors->has('short_description'))
                        <span class="text-danger">{{ $errors->first('short_description') }}</span>
                    @endif
                    <p class="mb-1 mt-4" style="font-size:14px;">Description</p>
                    <textarea rows="5" name="description" class="popup1">{{ old('description') }}</textarea>
                    <p class="mb-1 mt-4" style="font-size:14px;">City*</p>
                    <select class="popup pt-0 pb-0" name="city_id">
                        <option value="none" selected="" disabled="" hidden=""></option>
                        @foreach ($cities as $city)
                            <option value="{{ $city->city_id }}">{{ $city->name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('city_id'))
                        <span class="text-danger">{{ $errors->first('city_id') }}</span>
                    @endif
                    <p class="mb-1 mt-4" style="font-size:14px;">Country*</p>
                    <select class="popup pt-0 pb-0" id="selectCountries" name="country_id">
                        <option value="none" selected="" disabled="" hidden=""></option>
                        @foreach ($countries as $country)
                            <option value="{{ $country->country_id }}">{{ $country->name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('country_id'))
                        <span class="text-danger">{{ $errors->first('country_id') }}</span>
                    @endif
                    <p class="mb-1 mt-4" style="font-size:14px;">Organisation Name</p>
                    <input type="text" class="popup" name="organization_name" value="{{ old('organization_name') }}">
                    <p class="mb-1 mt-4" style="font-size:14px;">Organisation Detail</p>
                    <input type="text" class="popup" name="organization_detail" value="{{ old('organization_detail') }}">
                    <p class="mb-1 mt-4" style="font-size:14px;">Start Date</p>
                    <input type="datetime-local" step="1" class="popup" name="start_date" value="{{ old('start_date') }}">
                    <p class="mb-1 mt-4" style="font-size:14px;">End Date</p>
                    <input type="datetime-local" step="1" class="popup" name="end_date" value="{{ old('end_date') }}">
                    <p class="mb-1 mt-4" style="font-size:14px;">type*</p>
                    <select class="popup pt-0 pb-0" id="selecttype" name="mission_type">
                        <option value="none" selected="" disabled="" hidden=""></option>
                        <option value="TIME">Time</option>
                        <option value="GOAL">Goal</option>
                    </select>
                    @if ($errors->has('mission_type'))
                        <span class="text-danger">{{ $errors->first('mission_type') }}</span>
                    @endif
                    <div id="divResult"></div>
                    <p class="mb-1 mt-4" style="font-size:14px;">theme*</p>
                    <select class="popup pt-0 pb-0" name="theme_id">
                    <option value="none" selected="" disabled="" hidden=""></option>
                        @foreach ($themes as $theme)
                            <option value="{{ $theme->mission_theme_id }}">{{ $theme->title }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('theme_id'))
                        <span class="text-danger">{{ $errors->first('theme_id') }}</span>
                    @endif
                    <p class="mb-1 mt-4" style="font-size:14px;">skill</p>
                    <select class="popup pt-0 pb-0 h-50" name="skill_id[]" multiple="multiple" size="6">
                        @foreach ($skills as $skill)
                            <option value="{{ $skill->skill_id }}">{{ $skill->skill_name }}</option>
                        @endforeach
                    </select>
                    <p class="mb-1 mt-4" style="font-size:14px;">Image</p>
                    <input type="file" name="media_name[]" multiple="" >
                    @if ($errors->has('media_name'))
                        <span class="text-danger">{{ $errors->first('media_name') }}</span>
                    @endif
                    <p class="mb-1 mt-4" style="font-size:14px;">Document</p>
                    <input type="file" name="document_name[]" multiple="">
                    <p class="mb-1 mt-4" style="font-size:14px;">Availability</p>
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
        <a class="col-example8 mt-4 mb-4 me-2" href="#" style="font-size:calc(13px + 0.1vw);">
        cancel
        </a>
        <button class="col-example mt-4 mb-4" name="add_mission" type="submit" style="font-size:calc(13px + 0.1vw);">
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
                        resultString += "<p class='mb-1 mt-4' style='font-size:14px;'>Total Seats</p><input type='number' class='popup' name='total_seat'><p class='mb-1 mt-4' style='font-size:14px;' >Registration Deadline</p><input type='datetime-local' step='1' class='popup' name='deadline'>";
                    else
                        resultString += "<p class='mb-1 mt-4' style='font-size:14px;'>Goal</p><input type='text' class='popup' name='goal_objective_text'><p class='mb-1 mt-4' style='font-size:14px;' >Goal Value*</p><input type='number' class='popup' name='goal_value'>";
                });
                $('#divResult').html(resultString);
            }
        });
    });
</script>
@endsection