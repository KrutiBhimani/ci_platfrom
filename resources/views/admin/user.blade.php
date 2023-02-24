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
            <a class="nav-link active1 gray ps-0 pe-5 fs-4" data-toggle="tab" href="#userc">User</a>
        </li>
    </ul>
    <div class="d-flex justify-content-between mt-4 mb-4">
        <form class="m-0" action="{{ route('user') }}" method="POST" enctype="multipart/form-data">
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
        <a class="col-example1" href="add_user" style="font-size:calc(12px + 0.15vw); padding-top: 7px;">
        <i class="fa fa-plus me-2" aria-hidden="true"></i>
        Add
        </a>
    </div>
    <div class="tab-content">
        <div class="tab-pane show active" id="userc">
            <div class="table-responsive">
                <table class="table" style="border: 1px solid #dee2e6;">
                    <thead class="table-light border-bottom">
                        <tr>
                            <td class="p-3 pe-0 fs-6" scope="col">First Name</td>
                            <td class="p-3 pe-0 fs-6" scope="col">Last Name</td>
                            <td class="p-3 pe-0 fs-6" scope="col">Email</td>
                            <td class="p-3 pe-0 fs-6" scope="col">Employee id</td>
                            <td class="p-3 pe-0 fs-6" scope="col">Department</td>
                            <td class="p-3 pe-0 fs-6" scope="col">Status</td>
                            <td class="p-3 pe-0 fs-6" scope="col">Action</td>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td class="p-3 pe-0" style="font-size:13px;">{{ $user->first_name }}</td>
                            <td class="p-3 pe-0" style="font-size:13px;">{{ $user->last_name }}</td>
                            <td class="p-3 pe-0" style="font-size:13px;">{{ $user->email }}</td>
                            <td class="p-3 pe-0" style="font-size:13px;">{{ $user->employee_id }}</td>
                            <td class="p-3 pe-0" style="font-size:13px;">{{ $user->department }}</td>
                            <td class="p-3 pe-0" style="font-size:13px;color: #7ed470;">{{ $user->status=='1' ? 'Active' : 'Inactive' }}</td>
                            <td class="p-3 pe-0 p-0" style="font-size:20px;">
                                <a href="edit_user/{{ $user->user_id }}"><i class="fa fa-pencil-square-o" style="color: #f88634;" aria-hidden="true"></i></a>
                                <div id="popup{{ $user->user_id }}" class="modal">
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
                                                <a href="delete_user/{{ $user->user_id }}" class="col-example7">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#popup{{ $user->user_id }}"><i class="fa fa-trash-o text-dark" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div></div>
@endsection