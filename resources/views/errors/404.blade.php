@extends('layouts.home_header2')
@section('content')
<div class="container">
            <div class="d-flex justify-content-center">
                <img src="/storage/images/404.png" class="h22020">   
            </div>
            <div class="text-center">
                <p class="mt-2 fs25">Page not found</p>
                <p class="fs37 mb-2"><b>Oops!</b> The page you were looking for doesn't exist.</p>
                <p class="fs20 mb-5">You may have misstyped the address or the page may have moved.</p>
                @if(Auth::user()) 
                <a href="/home">
                    <button class="col-example7 fs143">Go to Homepage
                        <i class="fa fa-arrow-right ps-2"></i>
                    </button>
                </a>
                @elseif(Auth::guard('admin')->user())
                <a href="/admin/user">
                    <button class="col-example7 fs143">Go to Users
                        <i class="fa fa-arrow-right ps-2"></i>
                    </button>
                </a>
               @else 
               <a href="/login">
                    <button class="col-example7 fs143">Go to Login
                        <i class="fa fa-arrow-right ps-2"></i>
                    </button>
                </a>
                @endif
            </div>
        </div>
@endsection