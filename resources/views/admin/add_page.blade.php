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
<form action="{{ route('page.add') }}" method="POST" enctype="multipart/form-data">
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
                    <p class="mb-1 fs14">Title</p>
                    <input type="text" name="title" class="popup" value="{{ old('title') }}">
                    @if ($errors->has('title'))
                        <span class="text-danger">{{ $errors->first('title') }}</span>
                    @endif
                    <p class="mb-1 mt-4 fs14">Description</p>
                    <textarea rows="8" name="description" class="popup1">{{ old('description') }}</textarea>
                    @if ($errors->has('description'))
                        <span class="text-danger">{{ $errors->first('description') }}</span>
                    @endif
                    <p class="mb-1 mt-4 fs14">Slug</p>
                    <input type="text" name="slug" class="popup" value="{{ old('slug') }}">
                    @if ($errors->has('slug'))
                        <span class="text-danger">{{ $errors->first('slug') }}</span>
                    @endif
                    <p class="mb-1 mt-4 fs14">Status</p>
                    <select class="popup pt-0 pb-0" name="status">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </td>
            </tr>
        </tbody>
    </table>
    <div class="d-flex align-content-end justify-content-end">
        <a class="col-example8 mt-4 mb-4 me-2 fs131" href="#">
            cancel
        </a>
        <button class="col-example mt-4 mb-4" name="add_page" type="submit">
            save
        </button>
    </div>
</form>
@endsection