@extends('layouts.home_header2')
@section('content')
<br/><br/>
<form name="myForm" onsubmit="return validateForm()" method="post" enctype="multipart/form-data">
    <div id="popup3" class="modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content p-3">
                <div class="modal-header pb-0" style="border-bottom:0 ;">
                    <p class="mb-0" style="font-size:20px ;">Add Your Skills</p>
                    <img class="text-end mt-2 mb-2" src="/storage/images/cancel1.png" data-bs-dismiss="modal" style="cursor: pointer;height:13px">
                </div>
                <div class="modal-body pb-0">
                    <div class="row" style="font-size:10px ;">
                        <div class="col p-3" style="border:solid 1px #d9d9d9">
                            <select id="selectCountries" class="w-100 border-none" name="skill[]" multiple="multiple" size="26" style="border: none;overflow-y: auto; font-size:12px">
                                                                    <option value="1" selected="">Anthropology</option>
                                                                    <option value="2" selected="">Archeology</option>
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
                                            resultString += $(this).text() + '<br/>';
                                        });
                                        $('#divResult').html(resultString);
                                    }
                                });
                            });

                            function myFunction() {
                                var rslt = document.getElementById("divResult").innerHTML;
                                const chars = rslt.replace(/<br>/g, '\n');
                                document.getElementById("divskill").innerHTML = chars;
                            }
                        </script>
                        <div class="col p-3" style="border:solid 1px #d9d9d9">
                            <div id="divResult" style="font-size: 12px;">Anthropology<br>Archeology<br></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer p-0 pt-2" style="border-top:0 ;justify-content:flex-start;">
                    <button type="button" class="col-example8" data-bs-dismiss="modal">Cancle
                    </button>
                    <button type="button" class="col-example7" data-bs-dismiss="modal" onclick="myFunction()">Save
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="container-lg">
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
                            <img id="blah" src="/storage/images/user1.png" class="rounded-circle mt-4 mb-3" style="height:calc(30px + 8vw);width:calc(30px + 8vw);cursor:pointer;">
                        </label>
                        <input type="file" name="avatar" id="choose-file2" onchange="readURL(this);" style="display: none;" accept="image/x-png,image/jpg,image/jpeg">
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-5 col-5" style="margin: auto;">
                        <h4 class="" style="font-size:calc(15px + 0.1vw);">kruti patel</h4>
                        <a href="#" style="font-size:calc(11px + 0.1vw); color: black;" data-bs-toggle="modal" data-bs-target="#popup1">change password</a><br>
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
                                    <p class="mb-1" style="font-size:14px;">Name</p>
                                    <input type="text" class="popup" name="first_name" value="kruti" placeholder="Enter your name">
                                    <span id="error1" style="color:#f88634"></span>
                                </div>
                                <div class="col">
                                    <p class="mb-1" style="font-size:14px;">Surname</p>
                                    <input type="text" class="popup" name="last_name" value="patel" placeholder="Enter your surname">
                                    <span id="error2" style="color:#f88634"></span>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col">
                                    <p class="mb-1" style="font-size:14px;">Employee ID</p>
                                    <input type="text" class="popup" name="employee_id" value="" placeholder="Enter your employee id">
                                    <span id="error3" style="color:#f88634"></span>
                                </div>
                                <div class="col">
                                    <p class="mb-1" style="font-size:14px;">Manager</p>
                                    <input type="text" class="popup" name="manager" value="" placeholder="Enter your manager details">
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col">
                                    <p class="mb-1" style="font-size:14px;">Title</p>
                                    <input type="text" class="popup" name="title" value="" placeholder="Enter your employee id">
                                    <span id="error4" style="color:#f88634"></span>
                                </div>
                                <div class="col">
                                    <p class="mb-1" style="font-size:14px;">Department</p>
                                    <input type="text" class="popup" name="department" value="" placeholder="Enter your manager details">
                                    <span id="error5" style="color:#f88634"></span>
                                </div>
                            </div>
                            <p class="mb-1 mt-4" style="font-size:14px;">My Profile</p>
                            <textarea rows="4" placeholder="Enter your message" name="profile_text" value="" class="popup1"></textarea>
                            <p class="mb-1 mt-4" style="font-size:14px;">Why I Volunteer?</p>
                            <textarea rows="4" placeholder="Enter your message" name="why_i_volunteer" value="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<br><br>Ut enim ad minim veniam. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore.<br><br>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore." class="popup1">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore.</textarea>

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
                                    <p class="mb-1" style="font-size:14px;">City</p>
                                    <select class="popup pt-0 pb-0" name="city_id">
                                                                                    <option value="1" selected="">gujarat</option>
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
                                </div>
                                <div class="col">
                                    <p class="mb-1" style="font-size:14px;">Country</p>
                                    <select class="popup pt-0 pb-0" name="country_id">
                                                                                    <option value="1" selected="">india</option>
                                                                                    <option value="2">canada</option>
                                                                                    <option value="3">australia</option>
                                                                                    <option value="4">spain</option>
                                                                                    <option value="5">the united kingdom</option>
                                                                                    <option value="6">south africa</option>
                                                                                    <option value="7">france</option>
                                                                                    <option value="8">new york</option>
                                                                                    <option value="9">germany</option>
                                                                            </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-5">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active1 gray ps-0 pe-0 pt-0" data-toggle="tab" href="#mission">Professional
                                Information</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane show active" id="mission">
                            <div class="row mt-4">
                                <div class="col">
                                    <p class="mb-1" style="font-size:14px;">Availablity</p>
                                    <select class="popup pt-0 pb-0" name="availability">
                                                                                <option value="daily">Daily</option>
                                        <option value="weekly" selected="">Weekly</option>
                                        <option value="week-end">Weekend</option>
                                        <option value="monthly">Monthly</option>
                                    </select>
                                    
                                </div>
                                <div class="col">
                                    <p class="mb-1" style="font-size:14px;">LinkedIn</p>
                                    <input type="url" class="popup" name="linked_in_url" value="https://www.tutorialrepublic.com/codelab.php?topic=php&amp;file=add-newline-to-a-string" placeholder="Enter linkedIn URL" required="">
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
                            <textarea rows="6" class="popup1 mt-3" id="divskill" placeholder="select your skill" disabled="" style="background-color:white;">Anthropology
Archeology
</textarea>

                            <button type="button" class="col-example8 mt-3" data-bs-toggle="modal" data-bs-target="#popup3">Add Skills</button>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end mt-4 mb-5">
                    <button id="button" type="submit" name="edit_user" class="scrollToTopButton col-example7">Save</button>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection