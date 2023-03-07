@extends('layouts.home_header1')
@section('content')
<div class="container-lg">
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
</div>
<main id="main">
    <section id="story">
        <div class="container-lg">
            <br>
            <div id="divgrid">
                <div class="row row-eq-height justify-content-center">
                    @if($mission_count != 0)
                    @foreach($missions as $mission)
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12 mb-5 d-flex align-items-stretch">
                        <div class="card box border-0">
                            <div class="gfg">
                                <img src="{{$mission->media_path}}" alt="" class="img-fluid" style="width:100%;">
                                <div class="d-flex align-items-center first-txt"><img src="/storage/images/pin.png" alt="" class="img-fluid pe-1" style="height:12px;">
                                    {{$mission->name}}
                                </div>
                                @php
                                $a = 0;
                                @endphp
                                @if($mission->mission_type == 'TIME')
                                @php
                                $current = date("Y-m-d h:i:s");
                                @endphp
                                @if ($mission->deadline != null && $current > $mission->deadline) 
                                @php
                                $a = 1;
                                @endphp
                                @elseif ($mission->end_date != null && $current > $mission->end_date)
                                @php
                                $a = 1;
                                @endphp
                                @endif
                                @if($mission->total_seat != null)
                                @foreach($applications as $application)
                                @if($application->missionid == $mission->missionid && ($mission->total_seat - $application->count == 0))
                                @php
                                $a = 1;
                                @endphp
                                @endif
                                @endforeach
                                @endif
                                @endif
                                @if($a == 1)
                                <div class="d-flex align-items-center five-txt" style="background-color:red;">CLOSED</div>
                                @endif
                                @foreach($applies as $apply)
                                @if($apply->mission_id == $mission->missionid && $apply->user_id == Auth::user()->user_id)
                                <div class="d-flex align-items-center five-txt">APPLIED</div>
                                @php
                                $a = 1;
                                @endphp
                                @endif
                                @endforeach
                                <div class="d-flex align-items-center second-txt2 p-2">
                                    @php
                                    $key = 0;
                                    @endphp
                                    @foreach($favs as $fav)
                                    @if($fav->mission_id == $mission->missionid)
                                    @php
                                    $key = 1;
                                    @endphp    
                                    @endif
                                    @endforeach
                                    @if($key == 1)
                                    <a href="unlike/{{ $mission->missionid }}"><i class="fa fa-heart text-danger" aria-hidden="true"></i></a>
                                    @else
                                    <a href="like/{{ $mission->missionid }}"><i class="fa fa-heart-o" aria-hidden="true" style="color:white"></i></a>
                                    @endif     
                                </div>
                                <div class="d-flex align-items-center third-txt p-2"><a href="" style="color: black;" data-bs-toggle="modal" data-bs-target="#popup{{$mission->missionid}}"><img src="/storage/images/user.png" alt="" class="img-fluid" style="height:17px"></a></div>
                                <div id="popup{{$mission->missionid}}" class="modal">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content p-2">
                                            <div class="modal-header pb-0" style="border-bottom:0 ;">
                                                <p class="mb-0" style="font-size:20px ;">Invite</p>
                                                <img class="text-end mt-2 mb-2" src="/storage/images/cancel1.png" data-bs-dismiss="modal" style="cursor: pointer;height:13px">
                                            </div>
                                            <form action="{{ route('invite.user') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <input type="text" name="mission_id" value="{{$mission->missionid}}" hidden="">
                                                <div class="modal-body pb-0">
                                                    <p class="mb-1 mt-3">Email </p>
                                                    <input type="email" class="popup" name="email" place-holder="enter user email to invite">
                                                </div>
                                                <div class="modal-footer mt-4" style="border-top:0 ;">
                                                    <button type="reset" class="col-example8" data-bs-dismiss="modal">Cancle
                                                    </button>
                                                    <button type="submit" id="button1" name="inviteuser" class="col-example7" data-bs-dismiss="modal">Invite
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex four-txt justify-content-center">
                                    <div class="bdg1">{{$mission->title}}</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12" style="color:black">
                                    <div class="card-body pb-3 remove">
                                        <a href="volunteering_mission/{{ $mission->missionid }}" style="color:black;">
                                            <h2 class="card-title mb-2" style="font-size:calc(15px + 0.3vw);">{{$mission->mission_title}}</h2>
                                        </a>
                                        <p class="mb-2" style="color:gray; font-size:calc(11px + 0.1vw);">
                                            {{$a == 1 ? 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit...' : $mission->short_description }}                  
                                        </p>
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <h6 class="m-0" style="font-size:calc(11px + 0.1vw);">{{$mission->organization_name}}</h6>
                                            </div>
                                            <div class="icon">
                                                @for ($x = 0; $x < 5; $x++)
                                                @if ($x < $mission->rating) 
                                                <img src="/storage/images/selected-star.png" alt="" class="star">
                                                @else
                                                <img src='/storage/images/star.png' alt='' class='star'>
                                                @endif
                                                @endfor
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @if($a == 0)
                                <div class="d-flex align-items-center">
                                    <hr class="flex-grow-1 div m-0">
                                    <div class="bdg">
                                        @if($mission->mission_type == 'TIME')
                                        @if($mission->start_date == null && $mission->end_date == null)
                                        Ongoing Opportunity
                                        @else
                                        From {{date("d-m-Y", strtotime($mission->start_date))}} until {{date("d-m-Y", strtotime($mission->end_date))}}
                                        @endif
                                        @else
                                        {{ $mission->goal_objective_text }}
                                        @endif                  
                                    </div>
                                    <hr class="flex-grow-1 div m-0">
                                </div>
                                <div class="card-body pt-2 pb-2 padremove">
                                    <div class="row">
                                        @if($mission->mission_type == 'TIME')
                                        @if($mission->total_seat != null)
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-6" style="color:black;">
                                            <div class="row">
                                                <div class="col-lg-1 col-md-1 col-sm-1 col-1 m-1 mt-0 mb-0"><img src="/storage/images/Seats-left.png" alt="" style="height:23px"></div>
                                                <div class="col-lg-9 col-md-9 col-sm-9 col-9">
                                                    @foreach($applications as $application)
                                                    @if($application->missionid == $mission->missionid)
                                                    {{$mission->total_seat - $application->count}}
                                                    <h6 class="mb-2" style="font-size:12px ;color:gray;">Seats Left</h6>
                                                    @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        @else
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-6" style="color:black;">
                                            <div class="row">
                                                <div class="col-lg-1 col-md-1 col-sm-1 col-1 m-1 mt-0 mb-0"><img src="/storage/images/Already-volunteered.png" alt="" style="height:20px"></div>
                                                <div class="col-lg-9 col-md-9 col-sm-9 col-9">
                                                    @foreach($applications as $application)
                                                    @if($application->missionid == $mission->missionid)
                                                    {{$application->count}}
                                                    <h6 class="mb-2" style="font-size:12px ;color:gray;">Already volunteered</h6>
                                                    @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                        @if($mission->deadline != null)
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-6" style="color:black;">
                                            <div class="row">
                                                <div class="col-lg-1 col-md-1 col-sm-1 col-1 m-1 mt-0 mb-0"><img src="/storage/images/deadline.png" alt="" style="height:28px"></div>
                                                <div class="col-lg-9 col-md-9 col-sm-9 col-9">
                                                    <h4 class="mb-2" style="font-size:calc(13px + 0.1vw);">
                                                        {{date("d-m-Y", strtotime($mission->deadline))}}                                  
                                                    </h4>
                                                    <h6 class="mb-2" style="font-size:12px ;color:gray;">Deadline</h6>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                        @else
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-6" style="color:black;">
                                            <div class="row">
                                                <div class="col-lg-1 col-md-1 col-sm-1 col-1 m-1 mt-0 mb-0"><img src="/storage/images/achieved.png" alt="" style="height:22px"></div>
                                                <div class="col-lg-9 col-md-9 col-sm-9 col-9">
                                                    <div class="mt-1 mb-3" style="background-color:#EEEEEE; height:7px; width:100%; border-radius: 10px;">
                                                        <div style="background-color:#f88634; height:7px; border-radius: 10px; width:80%;">
                                                        </div>
                                                    </div>
                                                    <h6 class="mb-2" style="font-size:12px ;color:gray;">8000 achieved</h6>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                @endif
                            </div>
                            <hr class="div">
                            <div class="d-flex align-items-center justify-content-center">
                                @if($a == 0)
                                <a href="apply/{{ $mission->missionid }}" style="color: inherit;"><button class=" col-example mt-3" style="font-size:calc(13px + 0.1vw);">Apply<i class="fa fa-arrow-right ps-2"></i></button></a>
                                @else
                                <a href="volunteering_mission/{{ $mission->missionid }}" style="color: inherit;"><button class=" col-example mt-3" style="font-size:calc(13px + 0.1vw);">View Detail<i class="fa fa-arrow-right ps-2"></i></button></a>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <div class="m-5 p-5 text-center">no mission found</div>
                    @endif
                </div>
            </div>
            <div id="divlist" style="display:none">
                <div class="row row-eq-height justify-content-center">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12 mb-4">
                        @foreach($missions as $mission)
                        <div class="card box border-0 mb-4">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-3 position-relative">
                                    <img src="{{$mission->media_path}}" alt="" class="img-fluid" style="height:100%">
                                    <div class="d-flex align-items-center first-txt1">
                                        <img src="/storage/images/pin.png" alt="" class="img-fluid pe-2" style="height:10px;">
                                        <span>{{$mission->name}}</span>
                                    </div>
                                    @php
                                    $a = 0;
                                    @endphp
                                    @if($mission->mission_type == 'TIME')
                                    @php
                                    $current = date("Y-m-d h:i:s");
                                    @endphp
                                    @if ($mission->deadline != null && $current > $mission->deadline) 
                                    @php
                                    $a = 1;
                                    @endphp
                                    @elseif ($mission->end_date != null && $current > $mission->end_date)
                                    @php
                                    $a = 1;
                                    @endphp
                                    @endif
                                    @if($mission->total_seat != null)
                                    @foreach($applications as $application)
                                    @if($application->missionid == $mission->missionid && ($mission->total_seat - $application->count == 0))
                                    @php
                                    $a = 1;
                                    @endphp
                                    @endif
                                    @endforeach
                                    @endif
                                    @endif
                                    @if($a == 1)
                                    <div class="d-flex align-items-center five-txt" style="background-color:red;">CLOSED</div>
                                    @endif
                                    @foreach($applies as $apply)
                                    @if($apply->mission_id == $mission->missionid && $apply->user_id == Auth::user()->user_id)
                                    <div class="d-flex align-items-center five-txt">APPLIED</div>
                                    @php
                                    $a = 1;
                                    @endphp
                                    @endif
                                    @endforeach
                                    <div class="d-flex align-items-center second-txt1 p-2">
                                        @php
                                        $key = 0;
                                        @endphp
                                        @foreach($favs as $fav)
                                        @if($fav->mission_id == $mission->missionid)
                                        @php
                                        $key = 1;
                                        @endphp    
                                        @endif
                                        @endforeach
                                        @if($key == 1)
                                        <a href=""><i class="fa fa-heart text-danger" aria-hidden="true"></i></a>
                                        @else
                                        <a href=""><i class="fa fa-heart-o" aria-hidden="true" style="color:white"></i></a>
                                        @endif                       
                                    </div>
                                    <div class="d-flex align-items-center third-txt1 p-2">
                                        <img src="/storage/images/user.png" alt="" class="img-fluid" style="height:17px">
                                    </div>
                                    <div class="d-flex four-txt justify-content-center">
                                        <div class="bdg1">{{$mission->title}}</div>
                                    </div>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-9">
                                    <div class="card-body me-4 pb-0">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <img src="/storage/images/pin1.png" alt="" class="img-fluid pe-3" style="height:13px;">
                                                <span class="black">{{$mission->name}}</span> <img src="/storage/images/web.png" alt="" class="img-fluid pe-3 ps-3" style="height:13px;">
                                                <span class="black">{{$mission->title}}</span> <img src="/storage/images/organization.png" alt="" class="img-fluid pe-3 ps-3" style="height:13px;">
                                                <span class="black">{{$mission->organization_name}}</span>
                                            </div>
                                            <div class="icon">
                                                @for ($x = 0; $x < 5; $x++)
                                                @if ($x < $mission->rating) 
                                                <img src="/storage/images/selected-star.png" alt="" class="star">
                                                @else
                                                <img src='/storage/images/star.png' alt='' class='star'>
                                                @endif
                                                @endfor
                                            </div>
                                        </div>
                                        <h2 class="card-title mt-2" style="font-size:calc(15px + 0.3vw); color:black;">
                                            <a href="" style="color: black;">{{$mission->mission_title}}</a>
                                        </h2>
                                        <p class="mb-3" style="color:gray; font-size:calc(11px + 0.1vw);">
                                            {{$a == 1 ? 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor...' : $mission->short_description }}                 
                                        </p>
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                @if($a == 0)
                                                <div class="row">
                                                    @if($mission->mission_type == 'TIME')
                                                    @if($mission->total_seat != null)
                                                    <div class="col" style="color:black;">
                                                        <div class="row">
                                                            <div class="col-lg-1 col-md-1 col-sm-1 col-1"><img src="/storage/images/Seats-left.png" alt="" style="height:21px"></div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-9">
                                                                @foreach($applications as $application)
                                                                @if($application->missionid == $mission->missionid)
                                                                {{$mission->total_seat - $application->count}}
                                                                <h6 class="mb-2" style="font-size:12px ;color:gray;">Seats Left</h6>
                                                                @endif
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @else
                                                    <div class="col" style="color:black;">
                                                        <div class="row">
                                                            <div class="col-lg-1 col-md-1 col-sm-1 col-1"><img src="/storage/images/Seats-left.png" alt="" style="height:21px"></div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-9">
                                                                @foreach($applications as $application)
                                                                @if($application->missionid == $mission->missionid)
                                                                {{$application->count}}
                                                                <h6 class="mb-2" style="font-size:12px ;color:gray;">Already volunteered</h6>
                                                                @endif
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endif
                                                    @if($mission->deadline != null)
                                                    <div class="col" style="color:black;">
                                                        <div class="row">
                                                            <div class="col-lg-1 col-md-1 col-sm-1 col-1"><img src="/storage/images/deadline.png" alt="" style="height:28px"></div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-9">
                                                                <h4 class="mb-1" style="font-size:calc(12px + 0.1vw);">
                                                                    {{date("d-m-Y", strtotime($mission->deadline))}}                                       
                                                                </h4>
                                                                <h6 class="mb-0" style="font-size:12px ;color:gray;">Deadline</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endif
                                                    @else
                                                    <div class="col" style="color:black;">
                                                        <div class="row">
                                                            <div class="col-lg-1 col-md-1 col-sm-1 col-1"><img src="/storage/images/achieved.png" alt="" style="height:22px"></div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-9">
                                                                <div class="mt-2 mb-2" id="forwidth" style="background-color:#EEEEEE; height:7px; width:100%; border-radius: 10px;">
                                                                    <div style="background-color:#f88634; height:7px; border-radius: 10px; width:80%;" class="6"></div>
                                                                </div>
                                                                <h6 class="mb-0" style="font-size:12px ;color:gray;">8000 achieved</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endif
                                                    <div class="col" style="color:black;">
                                                        <div class="row">
                                                            <div class="col-lg-1 col-md-1 col-sm-1 col-1"><img src="/storage/images/calender.png" alt="" style="height:20px"></div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-9">
                                                                <h4 class="mb-1" style="font-size:11px;">
                                                                    @if($mission->mission_type == 'TIME')
                                                                    @if($mission->start_date == null && $mission->end_date == null)
                                                                    Ongoing Opportunity
                                                                    @else
                                                                    From {{date("d-m-Y", strtotime($mission->start_date))}} until {{date("d-m-Y", strtotime($mission->end_date))}}
                                                                    @endif
                                                                    @else
                                                                    {{ $mission->goal_objective_text }}
                                                                    @endif                                
                                                                </h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col" style="color:black;">
                                                        <div class="row">
                                                            <div class="col-lg-1 col-md-1 col-sm-1 col-1"><i class="fa fa-cogs" aria-hidden="true" style="color: gray;"></i></div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-9">
                                                                <h4 class="mb-1" style="font-size:calc(12px + 0.1vw);">Skills</h4>
                                                                <h6 class="mb-0" style="font-size:12px ;color:gray;">{{$mission->skill_name}}</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif
                                            </div>
                                            <div>
                                                @if($a == 0)
                                                <a href="home?source=apply&amp;id=91" style="color: inherit;"><button class=" col-example" style="font-size:calc(13px + 0.1vw);">Apply</button></a>
                                                @else
                                                <a href="Volunteering_Mission?id=OThTRUNSRVRfU1RVRkY=" style="color: inherit;"><button class=" col-example" style="font-size:calc(13px + 0.1vw);">View Detail</button></a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <nav aria-label="Page navigation example">
                <ul class="pagination pager justify-content-center">
                    @php
                    $next = $page + 1;
                    $previous = $page - 1;
                    @endphp
                    @if ($page == 1) 
                    <li class='page-item'><a class='page-link' style='border-radius:5px; padding:9px; height:30px; width:30px; margin:4px;'><img src='/storage/images/previous.png' alt=''></a></li>
                    <li class='page-item'><a class='page-link' style='border-radius:5px; padding:9px; height:30px; width:30px; margin:4px;'><img src='/storage/images/left.png' alt=''></a></li>
                    @else
                    <li class='page-item'><a class='page-link' href='home?page=1' style='border-radius:5px; padding:9px; height:30px; width:30px; margin:4px;'><img src='/storage/images/previous.png' alt=''></a></li>
                    <li class='page-item'><a class='page-link' href='home?page={{$previous}}' style='border-radius:5px; padding:9px; height:30px; width:30px; margin:4px;'><img src='/storage/images/left.png' alt=''></a></li>
                    @endif
                    @for ($i = 1; $i <= $cnt; $i++) 
                    @if ($i == $page)
                    <li class='page-item'><a class='page-link active text-center' href='home?page={{$i}}' style='border-radius:5px; padding:5px; height:30px; width:30px; margin:4px; font-size:15px;'><b>{{$i}}</b></a></li>
                    @else
                    <li class='page-item'><a class='page-link text-center' href='home?page={{$i}}' style='border-radius:5px; padding:5px; height:30px; width:30px; margin:4px; font-size:15px; color:black;'>{{$i}}</a></li>
                    @endif
                    @endfor
                    @if ($page == $cnt) 
                    <li class='page-item'><a class='page-link' style='border-radius:5px; padding:9px; height:30px; width:30px; margin:4px;'><img src='/storage/images/arrow.png' alt=''></a></li>
                    <li class='page-item'><a class='page-link' style='border-radius:5px; padding:9px; height:30px; width:30px; margin:4px;'><img src='/storage/images/next.png' alt=''></a></li>
                    @else 
                    <li class='page-item'><a class='page-link' href='home?page={{$next}}' style='border-radius:5px; padding:9px; height:30px; width:30px; margin:4px;'><img src='/storage/images/arrow.png' alt=''></a></li>
                    <li class='page-item'><a class='page-link' href='home?page={{$cnt}}' style='border-radius:5px; padding:9px; height:30px; width:30px; margin:4px;'><img src='/storage/images/next.png' alt=''></a></li>
                    @endif
                </ul>
            </nav>
            <br>
        </div>
    </section>
</main>
<script>
    $(document).ready(function() {
      $("#gridlink").click(function() {
        $("#divlist").hide();
        $("#divgrid").show();
        $("#h2").removeClass("Ellipse-574");
        $("#h1").addClass("Ellipse-574");
      });
      $("#listlink").click(function() {
        $("#divlist").show();
        $("#divgrid").hide();
        $("#h1").removeClass("Ellipse-574");
        $("#h2").addClass("Ellipse-574");
      });
    })
</script>
@endsection