@extends('layouts.admin_header')

@section('content')
<br/>
<form class="m-3" method="post" enctype="multipart/form-data">
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
                    <input type="text" class="popup" name="title" required="">
                    <p class="mb-1 mt-4" style="font-size:14px;">Short Description*</p>
                    <input type="text" class="popup" name="short_description" required="">
                    <p class="mb-1 mt-4" style="font-size:14px;">Description</p>
                    <textarea rows="5" name="description" class="popup1"></textarea>
                    <p class="mb-1 mt-4" style="font-size:14px;">City*</p>
                    <select class="popup pt-0 pb-0" name="city_id" required="">
                        <option value="none" selected="" disabled="" hidden=""></option>
                        <option value="1">gujarat</option>
                        <option value="2">Toronto</option>
                        <option value="3">Melbourne</option>
                        <option value="4">Barcelona</option>
                        <option value="5">London</option>
                        <option value="6">Cape Town</option>
                        <option value="7">Paris</option>
                        <option value="8">New York</option>
                        <option value="9">Sydney</option>
                        <option value="10">Berlin</option>
                    </select>
                    <p class="mb-1 mt-4" style="font-size:14px;">Country*</p>
                    <select class="popup pt-0 pb-0" name="country_id" required="">
                        <option value="none" selected="" disabled="" hidden=""></option>
                        <option value="1">india</option>
                        <option value="2">canada</option>
                        <option value="3">australia</option>
                        <option value="4">spain</option>
                        <option value="5">the united kingdom</option>
                        <option value="6">south africa</option>
                        <option value="7">france</option>
                        <option value="8">new york</option>
                        <option value="9">germany</option>
                    </select>
                    <p class="mb-1 mt-4" style="font-size:14px;">Organisation Name</p>
                    <input type="text" class="popup" name="organization_name">
                    <p class="mb-1 mt-4" style="font-size:14px;">Organisation Detail</p>
                    <input type="text" class="popup" name="organization_detail">
                    <p class="mb-1 mt-4" style="font-size:14px;">Start Date</p>
                    <input type="datetime-local" step="1" class="popup" name="start_date">
                    <p class="mb-1 mt-4" style="font-size:14px;">End Date</p>
                    <input type="datetime-local" step="1" class="popup" name="end_date">
                    <p class="mb-1 mt-4" style="font-size:14px;">type*</p>
                    <select class="popup pt-0 pb-0" id="selecttype" name="mission_type" required="">
                        <option value="none" selected="" disabled="" hidden=""></option>
                        <option value="TIME">Time</option>
                        <option value="GOAL">Goal</option>
                    </select>
                    <div id="divResult"></div>
                    <p class="mb-1 mt-4" style="font-size:14px;">theme*</p>
                    <select class="popup pt-0 pb-0" name="theme_id" required="">
                        <option value="none" selected="" disabled="" hidden=""></option>
                        <option value="1">Environment</option>
                        <option value="2">Children</option>
                        <option value="3">Nutrition</option>
                        <option value="4">Animals</option>
                        <option value="5">Health</option>
                        <option value="6">Education</option>
                    </select>
                    <p class="mb-1 mt-4" style="font-size:14px;">skill</p>
                    <select class="popup pt-0 pb-0 h-50" name="skill_id[]" multiple="multiple" size="6">
                        <option value="1">Anthropology</option>
                        <option value="2">Archeology</option>
                        <option value="3">Astronomy</option>
                        <option value="4">Computer Science</option>
                        <option value="5">Environmental Science</option>
                        <option value="6">History</option>
                        <option value="7">Library Sciences</option>
                        <option value="8">Mathematics</option>
                        <option value="9">Music Theory</option>
                        <option value="10">Research</option>
                        <option value="11">Administrative Support</option>
                        <option value="12">Customer Service</option>
                        <option value="13">Data Entry</option>
                        <option value="14">Executive Admin</option>
                        <option value="15">Office Management</option>
                        <option value="16">Office Reception</option>
                        <option value="17">Program Management</option>
                        <option value="18">Transactions</option>
                        <option value="19">Agronomy </option>
                        <option value="20">Animal Care / Handling </option>
                        <option value="21">Animal Therapy </option>
                        <option value="22">Aquarium Maintenance</option>
                        <option value="23">Botany</option>
                        <option value="24">Environmental Education</option>
                        <option value="25">Environmental Policy</option>
                        <option value="26">Farming</option>
                    </select>
                    <!-- <input id="divResult1" value=''></input> -->
                    <p class="mb-1 mt-4" style="font-size:14px;">Image</p>
                    <input type="file" name="media_name[]" multiple="">
                    <p class="mb-1 mt-4" style="font-size:14px;">Document</p>
                    <input type="file" name="document_name[]" multiple="">
                    <p class="mb-1 mt-4" style="font-size:14px;">Availability</p>
                    <select class="popup pt-0 pb-0" name="availability">
                        <option value="null" selected="" disabled="" hidden=""></option>
                        <option value="daily">Daily</option>
                        <option value="weekly">Weekly</option>
                        <option value="week-end">Weekend</option>
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
@endsection