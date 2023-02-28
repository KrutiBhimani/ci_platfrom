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
            <a class="nav-link active1 gray ps-0 pe-5 fs-4" data-toggle="tab" href="#userc">Story</a>
        </li>
    </ul>
    <div class="d-flex justify-content-between mt-4 mb-4">
        <form class="m-0" action="{{ route('story') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div style="border: 2px solid #dee2e6; border-radius:5px;">
                <div class="input-group">
                    <span class="input-group-text" style="background-color:transparent; border:none;">
                    <img src="/storage/images/search.png" height="15px">
                    </span>
                    <input type="text" name="search" value="{{ request()->input('search') }}" placeholder="search" class="form-control" style="border:none;border-radius:5px;background-color:transparent;">
                </div>
            </div>
        </form>
    </div>
    <div class="tab-content">
        <div class="tab-pane show active" id="userc">
            <div class="table-responsive">
                <table class="table" style="border: 1px solid #dee2e6;">
                    <thead class="table-light border-bottom">
                        <tr>
                            <td class="p-3 pe-0 fs-6" scope="col">Story Title</td>
                            <td class="p-3 pe-0 fs-6" scope="col">Full Name</td>
                            <td class="p-3 pe-0 fs-6" scope="col">Mission Title</td>
                            <td class="p-3 pe-0 fs-6" scope="col">Action</td>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($stories as $story)
                        <tr>
                            <td class="p-3 pe-0" style="font-size:13px;">{{ $story->story_title }}</td>
                            <td class="p-3 pe-0" style="font-size:13px;">{{ $story->first_name.' '.$story->last_name }}</td>
                            <td class="p-3 pe-0" style="font-size:13px;">{{ $story->title }}</td>
                            <td class="p-3 pe-0 p-0" style="font-size:20px;">
                                <a href="view_story/{{ $story->story_id }}" class="col-example13" style="background-color: white;">View</a>
                                <a href="approve_story/{{ $story->story_id }}"><i class="fa fa-check-circle-o pe-2" style="color: #14c506;" aria-hidden="true"></i></a>
                                <a href="decline_story/{{ $story->story_id }}"><i class="fa fa-times-circle-o text-danger pe-2" aria-hidden="true"></i></a>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#popup{{ $story->story_id }}"><i class="fa fa-trash-o text-dark" aria-hidden="true"></i></a>
                                <div id="popup{{ $story->story_id }}" class="modal">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content p-2">
                                            <div class="modal-header pb-0" style="border-bottom:0 ;">
                                                <p class="mb-0" style="font-size:20px ;">Confirm Delete </p>
                                                <img class="text-end mt-2 mb-2" src="/storage/images/cancel1.png" data-bs-dismiss="modal" style="cursor: pointer;height:13px">
                                            </div>
                                            <div class="modal-body pb-0">
                                                Are you sure you want to delete this item?
                                            </div>
                                            <div class="modal-footer mt-3 justify-content-center" style="border-top:0 ;">
                                                <button type="button" class="col-example8" data-bs-dismiss="modal">Cancle
                                                </button>
                                                <a href="delete_story/{{ $story->story_id }}" class="col-example7">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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