@extends('layouts.admin_header')

@section('content')
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
    <br />
    <form action="{{ route('banner.store') }}" method="POST" enctype="multipart/form-data">
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
                        <textarea rows="5" name="text" class="popup1">{{ old('text') }}</textarea>
                        @if ($errors->has('text'))
                            <span class="text-danger">{{ $errors->first('text') }}</span>
                        @endif
                        <p class="mb-1 mt-4 fs14">Sort Order</p>
                        <input type="number" name="sort_order" class="popup" value="{{ old('sort_order') }}">
                        @if ($errors->has('sort_order'))
                            <span class="text-danger">{{ $errors->first('sort_order') }}</span>
                        @endif
                        <p class="mb-1 mt-4 fs14">Image</p>
                        <input type="file" name="image">
                        @if ($errors->has('image'))
                            <span class="text-danger">{{ $errors->first('image') }}</span>
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="d-flex align-content-end justify-content-end">
            <a class="col-example8 mt-4 mb-4 me-2 fs131" href="#">
                cancel
            </a>
            <button class="col-example mt-4 mb-4" name="add_banner" type="submit">
                save
            </button>
        </div>
    </form>
@endsection
