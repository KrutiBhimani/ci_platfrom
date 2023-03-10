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
            <a class="nav-link active1 gray ps-0 pe-5 fs-4" data-toggle="tab" href="#userc">Mission
            Application</a>
        </li>
    </ul>
    <div class="d-flex justify-content-between mt-4 mb-4">
        <form class="m-0" action="{{ route('app') }}" method="POST" enctype="multipart/form-data">
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
    </div>
    <div class="tab-content">
        <div class="table-responsive">
            <div class="tab-pane show active" id="userc">
                <table class="table aeb">
                    <thead class="table-light border-bottom">
                        <tr>
                            <td class="p-3 pe-0 fs-6" scope="col">Mission Title</td>
                            <td class="p-3 pe-0 fs-6" scope="col">Mission Id</td>
                            <td class="p-3 pe-0 fs-6" scope="col">User Id</td>
                            <td class="p-3 pe-0 fs-6" scope="col">User Name</td>
                            <td class="p-3 pe-0 fs-6" scope="col">Applied Date</td>
                            <td class="p-3 pe-0 fs-6" scope="col">Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($apps as $app)
                        <tr>
                            <td class="p-3 pe-0  fs13">{{$app->title}}</td>
                            <td class="p-3 pe-0  fs13">{{$app->mission_id}}</td>
                            <td class="p-3 pe-0  fs13">{{$app->user_id}}</td>
                            <td class="p-3 pe-0  fs13">{{ $app->first_name.' '.$app->last_name }}</td>
                            <td class="p-3 pe-0  fs13">{{$app->applied_at}}</td>
                            <td class="p-3 pe-0 p-0 fs20">
                                <a href="approve_app/{{ $app->mission_application_id }}"><i class="fa fa-check-circle-o pe-2 gc" aria-hidden="true"></i></a>
                                <a href="decline_app/{{ $app->mission_application_id }}"><i class="fa fa-times-circle-o text-danger" aria-hidden="true"></i></a>
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