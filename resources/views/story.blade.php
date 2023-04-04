@extends('layouts.home_header2')
@section('content')
    <div class="example mt-3">
        <img class="image1" src="/storage/images/Grow-Trees-On-the-path-to-environment-sustainability-login - Copy.png">
        <div class="middle">
            <p class="txt1 mb-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                incididunt ut
                labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                laboris nisi ut aliquip
            </p>
            <a href="/share_story">
                <div class="text text-center">Share your Story
                    <i class="fa fa-arrow-right pl-2"></i>
                </div>
            </a>
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
        <div class="row row-eq-height justify-content-center mt-5">
            @foreach ($stories as $story)
                <div class="col-lg-4 col-md-6 col-sm-6 col-12 mb-5 d-flex align-items-stretch">
                    <div class="card box border-0">
                        <div class="gfg1">
                            <img src="{{ $story->path }}" alt="no image " class="img-fluid image2 w-100 h190">
                            <div class="middle1">
                                <a href="/story_detail/{{ $story->story_id }}">
                                    <div class="text1 text-center">View Detail
                                        <i class="fa fa-arrow-right pl-2"></i>
                                    </div>
                                </a>
                            </div>
                            <div class="d-flex four-txt justify-content-center">
                                <div class="bdg1">{{ $story->theme_title }}</div>
                            </div>
                        </div>
                        <div class="card-body remove">
                            <h2 class="card-title mb-2 fs153">{{ $story->story_title }}</h2>
                            <p class="mb-3 text-secondary fs111">
                                {{ $story->story_description ? substr($story->story_description, 0, 99) . '...' : '' }}</p>
                            <div class="row">
                                <div class="col-lg-2 col-md-2 col-sm-2 col-2">
                                    <img src="{{ $story->avatar ? '/storage/uplodes/' . $story->avatar : '/storage/images/user1.png' }}"
                                        class="rounded-circle" height="34px" width="34px">
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-8 col-8 pt-2 pb-2">
                                    <p class="mb-0 fs12">{{ $story->first_name . ' ' . $story->last_name }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <nav aria-label="Page navigation example">
                <ul class="pagination pager justify-content-center">
                    @php
                        $next = $page + 1;
                        $previous = $page - 1;
                    @endphp
                    @if ($page == 1)
                        <li class='page-item'><a class='page-link peginate'><img src='/storage/images/previous.png'
                                    alt=''></a></li>
                        <li class='page-item'><a class='page-link peginate'><img src='/storage/images/left.png'
                                    alt=''></a></li>
                    @else
                        <li class='page-item'><a class='page-link peginate' href='stories?page=1'><img
                                    src='/storage/images/previous.png' alt=''></a></li>
                        <li class='page-item'><a class='page-link peginate' href='stories?page={{ $previous }}'><img
                                    src='/storage/images/left.png' alt=''></a></li>
                    @endif
                    @for ($i = 1; $i <= $cnt; $i++)
                        @if ($i == $page)
                            <li class='page-item'><a class='page-link active text-center peginate p-0 pt-1'
                                    href='stories?page={{ $i }}'><b>{{ $i }}</b></a></li>
                        @else
                            <li class='page-item'><a class='page-link text-center text-dark peginate p-0 pt-1'
                                    href='stories?page={{ $i }}'>{{ $i }}</a></li>
                        @endif
                    @endfor
                    @if ($page == $cnt)
                        <li class='page-item'><a class='page-link peginate'><img src='/storage/images/arrow.png'
                                    alt=''></a></li>
                        <li class='page-item'><a class='page-link peginate'><img src='/storage/images/next.png'
                                    alt=''></a></li>
                    @else
                        <li class='page-item'><a class='page-link peginate' href='stories?page={{ $next }}'><img
                                    src='/storage/images/arrow.png' alt=''></a></li>
                        <li class='page-item'><a class='page-link peginate' href='stories?page={{ $cnt }}'><img
                                    src='/storage/images/next.png' alt=''></a></li>
                    @endif
                </ul>
            </nav>
        </div>
        <br>
    </div>
@endsection
