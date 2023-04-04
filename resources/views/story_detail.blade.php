@extends('layouts.home_header2')
@section('content')
    <div class="container-lg">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="h-100">
                    <img id="mainImage" class="ps-1 pe-1 ofit" src="{{ $story->path }}" height="80%" width="100%">
                    <div class="row pe-3 ps-3 pt-1">
                        <div class="top-content p-0" id="style-sheet-modern">
                            <div class="container-fluid p-0 m-0">
                                <div id="carousel-example" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner row w-100 mx-auto" role="listbox">
                                        @foreach ($medias as $key => $media)
                                            <div
                                                class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3 p-1 {{ $key == 0 ? 'active' : '' }}">
                                                @if ($media->type == 'video')
                                                    <iframe class="img-fluid mx-auto d-block w-100 ofit h100"
                                                        src="{{ $media->path }}"></iframe>
                                                @else
                                                    <img src="{{ $media->path }}"
                                                        class="img-fluid mx-auto d-block w-100 ofit h100 pe-auto"
                                                        alt="img1">
                                                @endif
                                            </div>
                                        @endforeach
                                    </div>
                                    <a class="carousel-control-prev text-bg-dark icon-css" href="#carousel-example"
                                        role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next text-bg-dark icon-css" href="#carousel-example"
                                        role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-12 mt-5 pt-5">
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
                <div class="d-flex justify-content-between">
                    <div>
                        <img src="{{ $story->avatar != null ? '/storage/uplodes/' . $story->avatar : '/storage/images/user1.png' }}"
                            class="rounded-circle" height="82px" width="78">
                        <p class="mb-0 fs13 text-center">{{ $story->first_name . ' ' . $story->last_name }}</p>
                    </div>
                    <div class="d-flex align-items-end">
                        <div class="bdg2"><img src="/storage/images/eye.png" class="me-2">{{ $story->view_count }} view
                        </div>
                    </div>
                </div>
                <p class="mt-4 fs112">{!! $story->why_i_volunteer !!}</p>
                <div class="row mt-3 mb-3">
                    <div class="col-lg-7 col-md-12 col-sm-12 col-12 mt-2">
                        <div class="col-example2 text-center fs132">
                            <a href="#" class="inh tinh" data-bs-toggle="modal"
                                data-bs-target="#popup{{ $story->story_id }}">
                                <img src="/storage/images/add1.png" alt="" class="mb-1 h15">
                                Recommend to a Co-Worker
                            </a>
                        </div>
                        <div id="popup{{ $story->story_id }}" class="modal">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content p-2">
                                    <div class="modal-header pb-0 border-bottom-0">
                                        <p class="mb-0 fs20">Invite</p>
                                        <img class="text-end mt-2 mb-2 pe-auto h13" src="/storage/images/cancel1.png"
                                            data-bs-dismiss="modal">
                                    </div>
                                    <form action="{{ route('story_detail.store') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <input type="text" name="story_id" value="{{ $story->story_id }}"
                                            hidden="">
                                        <div class="modal-body pb-0">
                                            <p class="mb-1 mt-3">Email </p>
                                            <input type="email" class="popup" name="email"
                                                place-holder="enter user email to invite">
                                            @if ($errors->has('email'))
                                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                        <div class="modal-footer mt-4 border-top-0">
                                            <button type="reset" class="col-example8" data-bs-dismiss="modal">Cancle
                                            </button>
                                            <button type="submit" id="button1" name="inviteuser" class="col-example7"
                                                data-bs-dismiss="modal">Invite
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-12 col-sm-12 col-12 mt-2">
                        <div class="col-example text-center fs132">
                            <a href="/volunteering_mission/{{ $story->mission_id }}" class="inh tinh">
                                Open Mission
                                <i class="fa fa-arrow-right ps-3"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active1 gray ps-0" data-toggle="tab"
                            href="#mission">{{ $story->story_title }}</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane show active" id="mission">
                        <p class="mt-4 mb-3 fs1015">
                            {!! $story->story_desc !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.carousel-item').on({
                click: function() {
                    var imageURL = $(this).attr('src');
                    var duration = 0;
                    $('#mainImage').fadeOut(duration, function() {
                        $(this).attr('src', imageURL);
                    }).fadeIn(duration);
                }
            }, 'img');
            var mainImageElement = $('#mainImage');
            var height = parseInt(mainImageElement.attr('height'));
            var width = parseInt(mainImageElement.attr('width'))
        });
        @if ($errors->has('email'))
            $('#popup{{ $story->story_id }}').modal('show');
        @endif
    </script>
@endsection
