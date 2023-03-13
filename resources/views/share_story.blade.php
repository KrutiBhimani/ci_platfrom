@extends('layouts.home_header2')
@section('content')<br/>
<div class="container-lg">
    <p class="fs-2 fw-light pt-5">Share your story</p>
    <form action="{{ route('share.story') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col">
                <p class="mb-1">Select mission</p>
                <select class="popup pt-0 pb-0" id="mission_id" name="mission_id">
                    <option value="" selected="" disabled="" hidden="">Select your mission</option>
                    @foreach ($missions as $mission)
                    <option value="{{ $mission->mission_id }}" @if($story){{$story->mission_id == $mission->mission_id ? 'selected' : '' }}@endif>{{ $mission->title }}</option>
                    @endforeach
                </select>
                @if ($errors->has('mission_id'))
                <span class="text-danger">{{ $errors->first('mission_id') }}</span>
                @endif
            </div>
            <div class="col">
                <p class="mb-1">My Story Title</p>
                <input type="text" class="popup" name="title" value="@if($story){{$story->title}}@endif" placeholder="Enter story title">
                @if ($errors->has('title'))
                <span class="text-danger">{{ $errors->first('title') }}</span>
                @endif
            </div>
            <div class="col removecal">
                <p class="mb-1">Date</p>
                <input type="datetime-local" step="1" name="published_at" value="@if($story){{$story->published_at}}@endif" class="popup">
            </div>
        </div>
        <p class="mb-1 mt-4">My Story</p>
        <textarea rows="5" placeholder="Enter your message" name="description" class="popup1">@if($story){{$story->description}}@endif</textarea>
        @if ($errors->has('description'))
        <span class="text-danger">{{ $errors->first('description') }}</span>
        @endif
        <p class="mb-1 mt-4">Enter Video URL</p>
        <textarea rows="2" placeholder="Enter your url" name="url" class="popup1"></textarea>
        <script>
            $(function() {
                // Multiple images preview in browser
                var imagesPreview = function(input, placeToInsertImagePreview) {
                    if (input.files) {
                        var filesAmount = input.files.length;
                        for (i = 0; i < filesAmount; i++) {
                            var reader = new FileReader();
                            reader.onload = function(event) {
                                $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(placeToInsertImagePreview).height(80).width(80).addClass('hj');
                            }
                            reader.readAsDataURL(input.files[i]);
                        }
                    }
                };
            
                $('#gallery-photo-add').on('change', function() {
                    imagesPreview(this, 'div.gallery');
                    $('.hide').remove();
                });
            });
        </script>
        <p class="mb-1 mt-3">Mission Images</p>
        <label for="gallery-photo-add" class="custom-file-upload">
        <img src="storage/images/drag-and-drop.png" class="h202"><br>
        </label>
        <input type="file" name="media_name[]" id="gallery-photo-add" onchange="readURL(this);" multiple="" class="dnone">
        <div class="hide">
        </div>
        <div class="gallery"></div>
        <div class="d-flex justify-content-between mt-3 mb-5">
            <div>
                <a href="/stories"><button type="button" class="col-example8">Cancle</button></a>
            </div>
            <div>
                <button id="button" type="submit" name="add" value="draft" class="scrollToTopButton col-example7">Save</button>
                <button id="button2" type="submit" name="add" value="publish" class="scrollTopButton col-example7" {{$story ? '' : 'disabled'}}>Submit</button>
            </div>
        </div>
    </form>
</div>
@endsection