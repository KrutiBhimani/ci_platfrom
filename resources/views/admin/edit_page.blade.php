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
<form action="{{route('page.update',$page->cms_page_id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <table class="table table-borderless aeb">
        <thead class="table-light border-bottom">
            <tr>
                <td class="p-3 fs-6" scope="col">Edit</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="p-3 fs-6">
                    <p class="mb-1 fs14">Title</p>
                    <input type="text" name="title" class="popup" value="{{$page->title}}">
                    <p class="mb-1 mt-4 fs14">Description</p>
                    <textarea rows="8" name="description" class="popup1">{{ strip_tags($page->description) }}</textarea>
                    <p class="mb-1 mt-4 fs14">Slug</p>
                    <input type="text" name="slug" class="popup" value="{{$page->slug}}">
                    <p class="mb-1 mt-4 fs14">Status</p>
                    <select class="popup pt-0 pb-0" name="status">
                        <option value="1" {{ $page->status==1 ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ $page->status==0 ? 'selected' : '' }}>Inactive</option>
                    </select>
                </td>
            </tr>
        </tbody>
    </table>
    <div class="d-flex align-content-end justify-content-end">
        <a class="col-example8 mt-4 mb-4 me-2 fs131" href="#">
            cancel
        </a>
        <button class="col-example mt-4 mb-4" name="edit_page" type="submit">
            save
        </button>
    </div>
</form>
@endsection