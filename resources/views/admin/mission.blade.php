@extends('layouts.admin_header')

@section('content')
@if (Session::has('message'))
    <div class="alert alert-success mb-0 mt-3" role="alert">
        {{ Session::get('message') }}
    </div>
@endif
@if (Session::has('error'))
    <div class="alert alert-danger mb-0 mt-3" role="alert">
        {{ Session::get('error') }}
    </div>
@endif
<div class="p-3">
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active1 gray ps-0 pe-5 fs-4" data-toggle="tab" href="#userc">Mission</a>
        </li>
    </ul>
    <div class="d-flex justify-content-between mt-4 mb-4">
    <form class="m-0" action="{{ route('mission') }}" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="rb">
                <div class="input-group">
                    <span class="input-group-text rbc">
                    <img src="/storage/images/search.png" height="15px">
                    </span>
                    <input type="text" name="search" value="{{ request()->input('search') }}" placeholder="search" class="form-control rbc">
                </div>
            </div>
        </form>
        <a class="col-example1 pt7 fs1215" href="add_mission">
        <i class="fa fa-plus me-2" aria-hidden="true"></i>
        Add
        </a>
    </div>
    <div class="tab-content">
        <div class="tab-pane show active" id="userc">
            <div class="table-responsive">
                <table class="table aeb">
                    <thead class="table-light border-bottom">
                        <tr>
                            <td class="p-3 pe-0 fs-6" scope="col">Mission Title</td>
                            <td class="p-3 pe-0 fs-6" scope="col">Mission Type</td>
                            <td class="p-3 pe-0 fs-6" scope="col">Start Date</td>
                            <td class="p-3 pe-0 fs-6" scope="col">End Date</td>
                            <td class="p-3 pe-0 fs-6" scope="col">Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($missions as $mission)
                        <tr>
                            <td class="p-3 pe-0 fs13">{{ $mission->title }}</td>
                            <td class="p-3 pe-0 fs13">{{ $mission->mission_type }}</td>
                            <td class="p-3 pe-0 fs13">{{ $mission->start_date }}</td>
                            <td class="p-3 pe-0 fs13">{{ $mission->end_date }}</td>
                            <td class="p-3 pe-0 p-0 fs20">
                                <a href="edit_mission/{{ $mission->mission_id }}"><i class="fa fa-pencil-square-o co" aria-hidden="true"></i></a>
                                <div id="popup{{ $mission->mission_id }}" class="modal">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content p-2">
                                            <div class="modal-header pb-0 border-bottom-0">
                                                <p class="mb-0 fs20">Confirm Delete</p>
                                                <img class="text-end mt-2 mb-2 pe-auto h13" src="/storage/images/cancel1.png" data-bs-dismiss="modal">
                                            </div>
                                            <form method="post" enctype="multipart/form-data">
                                                <input type="text" value="91" name="timesheet_id" hidden="">
                                                <div class="modal-body pb-0">
                                                    <p class="mb-1">Are you sure you want to delete this item?</p>
                                                </div>
                                                <div class="modal-footer border-top-0">
                                                    <button type="button" class="col-example8" data-bs-dismiss="modal">Cancle
                                                    </button>
                                                    <a href="delete_mission/{{ $mission->mission_id }}" class="col-example7">Delete</a>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#popup{{ $mission->mission_id }}"><i class="fa fa-trash-o text-dark" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection