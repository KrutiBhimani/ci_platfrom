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
<form action="{{ route('mission.edit') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <table class="table table-borderless aeb">
        <thead class="table-light border-bottom">
            <tr>
                <td class="p-3 fs-6" scope="col">Edit</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="p-3 fs-6">
                    <input type="hidden" class="popup" name="mission_id" value="{{$mission->mission_id}}" >
                    <p class="mb-1 fs14">Title</p>
                    <input type="text" class="popup" name="title" value="{{$mission->title}}" >
                    @if ($errors->has('title'))
                        <span class="text-danger">{{ $errors->first('title') }}</span>
                    @endif
                    <p class="mb-1 mt-4 fs14">Short Description</p>
                    <input type="text" class="popup" name="short_description" value="{{$mission->short_description}}">
                    @if ($errors->has('short_description'))
                        <span class="text-danger">{{ $errors->first('short_description') }}</span>
                    @endif
                    <p class="mb-1 mt-4 fs14">Description</p>
                    <textarea rows="5" name="description" class="popup1">{{$mission->description}}</textarea>
                    <p class="mb-1 mt-4 fs14">City</p>
                    <select class="popup pt-0 pb-0" name="city_id">
                        @foreach ($cities as $city)
                            <option value="{{ $city->city_id }}" {{$city->city_id==$mission->city_id? 'selected' : ''}}>{{ $city->name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('city_id'))
                        <span class="text-danger">{{ $errors->first('city_id') }}</span>
                    @endif
                    <p class="mb-1 mt-4 fs14">Country</p>
                    <select class="popup pt-0 pb-0" id="selectCountries" name="country_id">
                        @foreach ($countries as $country)
                            <option value="{{ $country->country_id }}" {{$country->country_id==$mission->country_id? 'selected' : ''}}>{{ $country->name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('country_id'))
                        <span class="text-danger">{{ $errors->first('country_id') }}</span>
                    @endif
                    <p class="mb-1 mt-4 fs14">Organisation Name</p>
                    <input type="text" class="popup" name="organization_name" value="{{$mission->organization_name}}">
                    <p class="mb-1 mt-4 fs14">Organisation Detail</p>
                    <input type="text" class="popup" name="organization_detail" value="{{$mission->organization_detail}}">
                    <p class="mb-1 mt-4 fs14">Start Date</p>
                    <input type="datetime-local" step="1" class="popup" name="start_date" value="{{$mission->start_date}}">
                    <p class="mb-1 mt-4 fs14">End Date</p>
                    <input type="datetime-local" step="1" class="popup" name="end_date" value="{{$mission->end_date}}">
                    <p class="mb-1 mt-4 fs14">type</p>
                    <select class="popup pt-0 pb-0" id="selecttype" name="mission_type">
                        <option value="TIME" {{$mission->mission_type=='TIME' ? 'selected' : ''}}>TIME</option>
                        <option value="GOAL" {{$mission->mission_type=='GOAL' ? 'selected' : ''}}>GOAL</option>
                    </select>
                    <div id='divresult1'>
                        @if($mission->mission_type=='TIME')
                            <p class='mb-1 mt-4' style='font-size:14px;'>Total Seats</p>
                            <input type='number' class='popup' name='total_seat' value="{{$time->total_seat}}">
                            <p class='mb-1 mt-4' style='font-size:14px;'>Registration Deadline</p>
                            <input type="datetime-local" step="1" class='popup' name='deadline' value="{{$time->deadline}}">
                        @else
                            <p class='mb-1 mt-4' style='font-size:14px;'>Goal</p>
                            <input type='text' class='popup' name='goal_objective_text' value="{{$goal->goal_objective_text}}">
                            <p class='mb-1 mt-4' style='font-size:14px;'>Goal Value</p>
                            <input type="number" step="1" class='popup' name='goal_value' value="{{$goal->goal_value}}">
                        @endif
                    </div>
                    
                    <div id="divResult"></div>
                    <p class="mb-1 mt-4 fs14">theme</p>
                    <select class="popup pt-0 pb-0" name="theme_id">
                    <option value="none" selected="" disabled="" hidden=""></option>
                        @foreach ($themes as $theme)
                            <option value="{{ $theme->mission_theme_id }}" {{$theme->mission_theme_id==$mission->theme_id? 'selected' : ''}}>{{ $theme->title }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('theme_id'))
                        <span class="text-danger">{{ $errors->first('theme_id') }}</span>
                    @endif
                    <p class="mb-1 mt-4 fs14">skill</p>
                    <select class="popup pt-0 pb-0 h-50" name="skill_id[]" multiple="multiple" size="6">
                        @foreach ($skills as $skill)
                            <option value="{{ $skill->skill_id }}" @foreach ($selected_skills as $selected_skill) {{$selected_skill->skill_id==$skill->skill_id ? 'selected':''}}@endforeach>{{ $skill->skill_name }}</option>
                        @endforeach
                    </select>
                    <p class="mb-1 mt-4 fs14">Image</p>
                    <input type="file" name="media_name[]" multiple="" >
                    @if ($errors->has('media_name'))
                        <span class="text-danger">{{ $errors->first('media_name') }}</span>
                    @endif
                    <p class="mb-1 mt-4 fs14">Document</p>
                    <input type="file" name="document_name[]" multiple="">
                    <p class="mb-1 mt-4 fs14">Availability</p>
                    <select class="popup pt-0 pb-0" name="availability">
                        <option value="none" selected="" disabled="" hidden=""></option>
                        <option value="daily" {{$mission->availability=='daily' ? 'selected' : ''}}>Daily</option>
                        <option value="weekly" {{$mission->availability=='weekly' ? 'selected' : ''}}>Weekly</option>
                        <option value="weekend" {{$mission->availability=='weekend' ? 'selected' : ''}}>Weekend</option>
                        <option value="monthly" {{$mission->availability=='monthly' ? 'selected' : ''}}>Monthly</option>
                    </select>
                </td>
            </tr>
        </tbody>
    </table>
    <div class="d-flex align-content-end justify-content-end">
        <a class="col-example8 mt-4 mb-4 me-2 fs131" href="#">
        cancel
        </a>
        <button class="col-example mt-4 mb-4" name="edit_mission" type="submit">
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
                    if (val == "TIME") {
                        resultString += "<p class='mb-1 mt-4' style='font-size:14px;'>Total Seats</p><input type='number' class='popup' name='total_seat'><p class='mb-1 mt-4' style='font-size:14px;' >Registration Deadline</p><input type='date' class='popup' name='deadline'>";

                    } else
                        resultString += "<p class='mb-1 mt-4' style='font-size:14px;'>Goal</p><input type='text' class='popup' name='goal_objective_text'><p class='mb-1 mt-4' style='font-size:14px;' >Goal Value*</p><input type='number' class='popup' name='goal_value'>";
                    $("#divresult1").remove();
                });
                $('#divResult').html(resultString);
            }
        });
    });
</script>
@endsection