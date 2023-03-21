<!doctype html>
@extends('layouts.home_header2')
@section('content')<br/><br/>
<div class="container-lg mt-5">
    <h2 class="mb-0">Privacy and Cookies Policy</h2>
    <div class="row pageactive">
        <div class="col-lg-3 col-md-3 col-sm-12 col-12 mb-5">
            <div id="list-example" class="list-group ppt">
                @foreach($pages as $page)
                <a class="gray1 list-group-item list-group-item-action active" href="#policy{{$page->cms_page_id}}">
                    <div class="d-flex justify-content-between">
                        {{$page->title}}
                        <img class="mt-2" src="/storage/images/arrow.png" height="10px">
                    </div>
                </a>
                <hr class="div ms-3 me-3">
                @endforeach
            </div>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-12 col-12 mb-5">
            <div data-bs-spy="scroll" data-bs-target="#list-example" data-bs-smooth-scroll="true" class="scrollspy-example" tabindex="0">
                @foreach($pages as $page)
                <div id="policy{{$page->cms_page_id}}" class="temp">
                    <br><br>
                    <h4 class="mt-2 fs118">{{$page->title}}</h4>
                    {!!$page->description!!}
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection