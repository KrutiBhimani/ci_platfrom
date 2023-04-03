@extends('layouts.home_header2')
@section('content')
    <link rel="stylesheet" type="text/css" href="/../css/toastr.min.css">
    <script src="/../js/toastr.min.js"></script>

    @foreach ($timesheets as $timesheet)
        <div id="popupdelete{{ $timesheet->timesheet_id }}" class="modal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content p-2">
                    <div class="modal-header pb-0 border-bottom-0">
                        <p class="mb-0 fs20">Confirm Delete</p>
                        <img class="text-end mt-2 mb-2 pe-auto h13" src="/storage/images/cancel1.png"
                            data-bs-dismiss="modal">
                    </div>
                    <input type="text" value="16" name="timesheet_id" hidden="">
                    <div class="modal-body pb-0">
                        <p class="mb-1">Are you sure you want to delete this item?</p>
                    </div>
                    <form action="{{ route('timesheet.destroy', $timesheet->timesheet_id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('DELETE')
                        <div class="modal-footer border-top-0">
                            <button type="button" class="col-example8" data-bs-dismiss="modal">Cancle
                            </button>
                            <button type="submit" name="delete" class="col-example7" data-bs-dismiss="modal">Delete
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
    <div id="popup1" class="modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content p-2">
                <div class="modal-header pb-0 border-bottom-0">
                    <p class="mb-0 fs20">Please input below Volunteering Hours</p>
                    <img class="text-end mt-2 mb-2 h13 pe-auto" src="mvc/Assets/images/cancel1.png" data-bs-dismiss="modal">
                </div>
                <form action="{{ route('timesheet.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body pb-0">
                        <p class="mb-1">Mission</p>
                        <select class="popup pt-0 pb-0" name="mission_id">
                            <option value="none" selected="" disabled="" hidden="">Select your mission</option>
                            @foreach ($missions as $mission)
                                @if ($mission->mission_type == 'TIME')
                                    <option value="{{ $mission->mission_id }}">{{ $mission->title }}</option>
                                @endif
                            @endforeach
                        </select>
                        @if ($errors->has('mission_id'))
                            <span class="text-danger">{{ $errors->first('mission_id') }}</span>
                        @endif
                        <p class="mb-1 mt-3">Date Volunteered</p>
                        <input type="date" name="date_volunteered" class="popup" value="Select date">
                        @if ($errors->has('date_volunteered'))
                            <span class="text-danger">{{ $errors->first('date_volunteered') }}</span>
                        @endif
                        <div class="row">
                            <div class="col">
                                <p class="mb-1 mt-3">Hours</p>
                                <input type="number" class="popup" name="h" placeholder="Enter Spent Hours">
                            </div>
                            <div class="col">
                                <p class="mb-1 mt-3">Minute</p>
                                <input type="number" class="popup" name="m" placeholder="Enter Spent Minutes">
                            </div>
                        </div>
                        <p class="mb-1 mt-3">Message</p>
                        <textarea class="popup1" rows="4" placeholder="Enter your message" name="notes"></textarea>
                    </div>
                    <div class="modal-footer border-top-0">
                        <button type="button" class="col-example8" data-bs-dismiss="modal">Cancle
                        </button>
                        <button type="submit" name="add_hours" class="col-example7" data-bs-dismiss="modal">Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="popup2" class="modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content p-2">
                <div class="modal-header pb-0 border-bottom-0">
                    <p class="mb-0 fs20">Please input below Volunteering Goal</p>
                    <img class="text-end mt-2 mb-2 h13 pe-auto" src="mvc/Assets/images/cancel1.png" data-bs-dismiss="modal">
                </div>
                <form action="{{ route('timesheet.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body pb-0">
                        <p class="mb-1">Mission</p>
                        <select class="popup pt-0 pb-0" name="missionid">
                            <option value="none" selected="" disabled="" hidden="">Select your mission
                            </option>
                            @foreach ($missions as $mission)
                                @if ($mission->mission_type == 'GOAL')
                                    <option value="{{ $mission->mission_id }}">{{ $mission->title }}</option>
                                @endif
                            @endforeach
                        </select>
                        @if ($errors->has('missionid'))
                            <span class="text-danger">{{ $errors->first('missionid') }}</span>
                        @endif
                        <p class="mb-1 mt-3">Date Volunteered</p>
                        <input type="date" name="datevolunteered" class="popup">
                        @if ($errors->has('datevolunteered'))
                            <span class="text-danger">{{ $errors->first('datevolunteered') }}</span>
                        @endif
                        <p class="mb-1 mt-3">Action</p>
                        <input type="text" class="popup" name="action" placeholder="Enter Action">
                        <p class="mb-1 mt-3">Message</p>
                        <textarea class="popup1" rows="4" placeholder="Enter your message" name="notes"></textarea>
                    </div>
                    <div class="modal-footer border-top-0">
                        <button type="button" class="col-example8" data-bs-dismiss="modal">Cancle
                        </button>
                        <button type="submit" name="add_goals" class="col-example7" data-bs-dismiss="modal">Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="container-lg">
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
        <p class="fs-2 fw-light pt-5">Volunteering Timesheet</p>
        <div class="row">
            <div class="col m-2 pb-5 brbs">
                <div class="d-flex justify-content-between mb-4 mt-4">
                    <p class="ps-3 m-0">Volunteering Hours</p>
                    <button data-bs-toggle="modal" data-bs-target="#popup1" type="button"
                        class="col-example7 ps-2 pe-2 pt-1 pb-1">
                        <i class="fa fa-plus pe-1" aria-hidden="true"></i>
                        Add
                    </button>
                </div>
                <table class="w-100">
                    <thead>
                        <tr>
                            <td class="pt-3 ps-0 pb-1 font-weight-bold fs14" scope="col">Mission
                            </td>
                            <td class="pt-3 ps-0 pb-1 font-weight-bold fs14" scope="col">Date
                            </td>
                            <td class="pt-3 ps-0 pb-1 font-weight-bold fs14" scope="col">Hours
                            </td>
                            <td class="pt-3 ps-0 pb-1 font-weight-bold fs14" scope="col">Minutes
                            </td>
                            <td class="pt-3 ps-0 pb-1 font-weight-bold fs14" scope="col"></td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($timesheets as $timesheet)
                            @if ($timesheet->mission_type == 'TIME')
                                <tr>
                                    <td class="pt-3 ps-0 fs111">{{ $timesheet->title }}</td>
                                    <td class="pt-3 ps-0 fs111">
                                        {{ date('d/m/Y', strtotime($timesheet->date_volunteered)) }}</td>
                                    <td class="pt-3 ps-0 fs111">{{ date('H', strtotime($timesheet->time)) }}h</td>
                                    <td class="pt-3 ps-0 fs111">{{ date('i', strtotime($timesheet->time)) }}min</td>
                                    <td class="pt-3 ps-0 fs111">
                                        <button class="p-0 border-0 bgw" data-bs-toggle="modal"
                                            data-bs-target="#popupedit{{ $timesheet->timesheet_id }}" type="button">
                                            <i class="fa fa-pencil-square-o co fs20" aria-hidden="true"></i>
                                        </button>
                                        <button class="p-0 border-0 bgw" data-bs-toggle="modal"
                                            data-bs-target="#popupdelete{{ $timesheet->timesheet_id }}" type="button">
                                            <i class="fa fa-trash-o text-dark fs20" aria-hidden="true"></i>
                                        </button>
                                    </td>
                                </tr>
                                <form action="{{ route('timesheet.update', $timesheet->timesheet_id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div id="popupedit{{ $timesheet->timesheet_id }}" class="modal">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content p-2">
                                                <div class="modal-header pb-0 border-bottom-0">
                                                    <p class="mb-0 fs20">Please input below Volunteering Hours</p>
                                                    <img class="text-end mt-2 mb-2 pe-auto h13"
                                                        src="/storage/images/cancel1.png" data-bs-dismiss="modal">
                                                </div>
                                                <input type="text" value="16" name="timesheet_id" hidden="">
                                                <div class="modal-body pb-0">
                                                    <p class="mb-1">Mission</p>
                                                    <select class="popup pt-0 pb-0" name="mission_id">
                                                        @foreach ($missions as $mission)
                                                            @if ($mission->mission_type == 'TIME')
                                                                <option value="{{ $mission->mission_id }}"
                                                                    {{ $mission->mission_id == $timesheet->mission_id ? 'selected' : '' }}>
                                                                    {{ $mission->title }}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                    <p class="mb-1 mt-3">Date Volunteered</p>
                                                    <input type="date" name="date_volunteered"
                                                        value="{{ $timesheet->date_volunteered }}" class="popup">
                                                    @if ($errors->has('date_volunteered'))
                                                        <span
                                                            class="text-danger">{{ $errors->first('date_volunteered') }}</span>
                                                    @endif
                                                    <div class="row">
                                                        <div class="col">
                                                            <p class="mb-1 mt-3">Hours</p>
                                                            <input type="number" class="popup" name="h"
                                                                value="{{ date('H', strtotime($timesheet->time)) }}"
                                                                placeholder="Enter Spent Hours">
                                                        </div>
                                                        <div class="col">
                                                            <p class="mb-1 mt-3">Minute</p>
                                                            <input type="number" class="popup" name="m"
                                                                value="{{ date('i', strtotime($timesheet->time)) }}"
                                                                placeholder="Enter Spent Minutes">
                                                        </div>
                                                    </div>
                                                    <p class="mb-1 mt-3">Message</p>
                                                    <textarea class="popup1" rows="4" placeholder="Enter your message" name="notes">{{ $timesheet->notes }}</textarea>
                                                </div>
                                                <div class="modal-footer border-top-0">
                                                    <button type="button" class="col-example8"
                                                        data-bs-dismiss="modal">Cancle
                                                    </button>
                                                    <button type="submit" name="edit_hours" class="col-example7"
                                                        data-bs-dismiss="modal">Submit
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col m-2 pb-5 brbs">
                <div class="d-flex justify-content-between mb-4 mt-4">
                    <p class="ps-3 m-0">Volunteering Goals</p>
                    <button data-bs-toggle="modal" data-bs-target="#popup2" type="button"
                        class="col-example7 ps-2 pe-2 pt-1 pb-1">
                        <i class="fa fa-plus pe-1" aria-hidden="true"></i>
                        Add
                    </button>
                </div>
                <table class="w-100">
                    <thead>
                        <tr>
                            <td class="pt-3 ps-3 pb-1 font-weight-bold fs14" scope="col">Mission
                            </td>
                            <td class="pt-3 ps-3 pb-1 font-weight-bold fs14" scope="col">Date
                            </td>
                            <td class="pt-3 ps-3 pb-1 font-weight-bold fs14" scope="col">Action
                            </td>
                            <td class="pt-3 ps-3 pb-1 pe-3 font-weight-bold fs14" scope="col">
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($timesheets as $timesheet)
                            @if ($timesheet->mission_type == 'GOAL')
                                <tr>
                                    <td class="pt-3 ps-3 fs111">{{ $timesheet->title }}</td>
                                    <td class="pt-3 ps-3 fs111">
                                        {{ date('d/m/Y', strtotime($timesheet->date_volunteered)) }}</td>
                                    <td class="pt-3 ps-3 fs111">{{ $timesheet->action }}</td>
                                    <td class="pt-3 ps-3 fs111">
                                        <button class="p-0 border-0 bgw" data-bs-toggle="modal"
                                            data-bs-target="#popupedit{{ $timesheet->timesheet_id }}" type="button">
                                            <i class="fa fa-pencil-square-o co fs20" aria-hidden="true"></i>
                                        </button>
                                        <button class="p-0 border-0 bgw" data-bs-toggle="modal"
                                            data-bs-target="#popupdelete{{ $timesheet->timesheet_id }}" type="button">
                                            <i class="fa fa-trash-o text-dark fs20" aria-hidden="true"></i>
                                        </button>
                                    </td>
                                </tr>
                                <form action="{{ route('timesheet.update', $timesheet->timesheet_id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div id="popupedit{{ $timesheet->timesheet_id }}" class="modal">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content p-2">
                                                <div class="modal-header pb-0 border-bottom-0">
                                                    <p class="mb-0 fs20">Please input below Volunteering Goal</p>
                                                    <img class="text-end mt-2 mb-2 pe-auto h13"
                                                        src="/storage/images/cancel1.png" data-bs-dismiss="modal">
                                                </div>
                                                <input type="text" value="15" name="timesheet_id" hidden="">
                                                <div class="modal-body pb-0">
                                                    <p class="mb-1">Mission</p>
                                                    <select class="popup pt-0 pb-0" name="mission_id">
                                                        @foreach ($missions as $mission)
                                                            @if ($mission->mission_type == 'GOAL')
                                                                <option value="{{ $mission->mission_id }}"
                                                                    {{ $mission->mission_id == $timesheet->mission_id ? 'selected' : '' }}>
                                                                    {{ $mission->title }}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                    <p class="mb-1 mt-3">Date Volunteered</p>
                                                    <input type="date" name="datevolunteered"
                                                        value="{{ $timesheet->date_volunteered }}" class="popup">
                                                    @if ($errors->has('datevolunteered'))
                                                        <span
                                                            class="text-danger">{{ $errors->first('datevolunteered') }}</span>
                                                    @endif
                                                    <p class="mb-1 mt-3">Action</p>
                                                    <input type="text" class="popup" name="action"
                                                        value="{{ $timesheet->action }}" placeholder="Enter Action">
                                                    <p class="mb-1 mt-3">Message</p>
                                                    <textarea class="popup1" rows="4" placeholder="Enter your message" name="notes">{{ $timesheet->notes }}</textarea>
                                                </div>
                                                <div class="modal-footer border-top-0">
                                                    <button type="button" class="col-example8"
                                                        data-bs-dismiss="modal">Cancle
                                                    </button>
                                                    <button type="submit" name="edit_goals" class="col-example7"
                                                        data-bs-dismiss="modal">Submit
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
