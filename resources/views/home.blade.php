@extends('layouts.home_header')
@section('content')
<main id="main">
    <section id="story">
        <div class="container-lg">
            <br>
            <div id="divgrid">
                <div class="row row-eq-height justify-content-center">
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
                                        <a href=""><i class="fa fa-heart text-danger" aria-hidden="true"></i></a>
                                    @else
                                        <a href=""><i class="fa fa-heart-o" aria-hidden="true" style="color:white"></i></a>
                                    @endif     
                                </div>
                                <div class="d-flex align-items-center third-txt p-2"><a href="" style="color: black;" data-bs-toggle="modal" data-bs-target="#popup91"><img src="/storage/images/user.png" alt="" class="img-fluid" style="height:17px"></a></div>
                                <div id="popup91" class="modal">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content p-2">
                                            <div class="modal-header pb-0" style="border-bottom:0 ;">
                                                <p class="mb-0" style="font-size:20px ;">Invite</p>
                                                <img class="text-end mt-2 mb-2" src="/storage/images/cancel1.png" data-bs-dismiss="modal" style="cursor: pointer;height:13px">
                                            </div>
                                            <form class="m-0" method="post" enctype="multipart/form-data">
                                                <input type="text" name="m_id" value="91" hidden="">
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
                                        <a href="Volunteering_Mission?id=OTFTRUNSRVRfU1RVRkY=" style="color:black;">
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
                                    <a href="home?source=apply&amp;id=91" style="color: inherit;"><button class=" col-example mt-3" style="font-size:calc(13px + 0.1vw);">Apply<i class="fa fa-arrow-right ps-2"></i></button></a>
                                @else
                                    <a href="Volunteering_Mission?id=OThTRUNSRVRfU1RVRkY=" style="color: inherit;"><button class=" col-example mt-3" style="font-size:calc(13px + 0.1vw);">View Detail<i class="fa fa-arrow-right ps-2"></i></button></a>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div id="divlist" style="display:none">
                <div class="row row-eq-height justify-content-center">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12 mb-4">
                        <div class="card box border-0 mb-4">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-3 position-relative">
                                    <img src="/storage/uplodes/Grow-Trees-On-the-path-to-environment-sustainability.png" alt="" class="img-fluid" style="height:100%">
                                    <div class="d-flex align-items-center first-txt1">
                                        <img src="/storage/images/pin.png" alt="" class="img-fluid pe-2" style="height:10px;">
                                        <span>Toronto</span>
                                    </div>
                                    <div class="d-flex align-items-center second-txt1 p-2">
                                        <a href="home?source=unlike_mission&amp;like=91&amp;user=29"><i class="fa fa-heart text-danger" aria-hidden="true"></i></a>                    
                                    </div>
                                    <div class="d-flex align-items-center third-txt1 p-2">
                                        <img src="/storage/images/user.png" alt="" class="img-fluid" style="height:17px">
                                    </div>
                                    <div class="d-flex four-txt justify-content-center">
                                        <div class="bdg1">Environment</div>
                                    </div>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-9">
                                    <div class="card-body me-4">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <img src="/storage/images/pin1.png" alt="" class="img-fluid pe-3" style="height:13px;">
                                                <span class="black">Toronto</span> <img src="/storage/images/web.png" alt="" class="img-fluid pe-3 ps-3" style="height:13px;">
                                                <span class="black">Environment</span> <img src="/storage/images/organization.png" alt="" class="img-fluid pe-3 ps-3" style="height:13px;">
                                                <span class="black">Tree Canada</span>
                                            </div>
                                            <div class="icon">
                                                <img src="/storage/images/selected-star.png" alt="" class="ps-1 star"><img src="/storage/images/selected-star.png" alt="" class="ps-1 star"><img src="/storage/images/selected-star.png" alt="" class="ps-1 star"><img src="/storage/images/star.png" alt="" class="ps-1 star"><img src="/storage/images/star.png" alt="" class="ps-1 star">                        
                                            </div>
                                        </div>
                                        <h2 class="card-title mt-2" style="font-size:calc(15px + 0.3vw); color:black;">
                                            <a href="" style="color: black;">
                                            Grow Trees – On the path to environment sustainability                        </a>
                                        </h2>
                                        <p class="mb-3" style="color:gray; font-size:calc(11px + 0.1vw);">
                                            Lorem ipsum dolor sit amet, consectetur  adipiscing elit, sed do eiusmod tempor incididunt ut labore...                      
                                        </p>
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <div class="row">
                                                    <div class="col" style="color:black;">
                                                        <div class="row">
                                                            <div class="col-lg-1 col-md-1 col-sm-1 col-1"><img src="/storage/images/Seats-left.png" alt="" style="height:21px"></div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-9">
                                                                <h4 class="mb-1" style="font-size:calc(12px + 0.1vw);">
                                                                    19                                        
                                                                </h4>
                                                                <h6 class="mb-0" style="font-size:12px ;color:gray;">Seats Left</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col" style="color:black;">
                                                        <div class="row">
                                                            <div class="col-lg-1 col-md-1 col-sm-1 col-1"><img src="/storage/images/deadline.png" alt="" style="height:28px"></div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-9">
                                                                <h4 class="mb-1" style="font-size:calc(12px + 0.1vw);">
                                                                    25/02/2023                                        
                                                                </h4>
                                                                <h6 class="mb-0" style="font-size:12px ;color:gray;">Deadline</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col" style="color:black;">
                                                        <div class="row">
                                                            <div class="col-lg-1 col-md-1 col-sm-1 col-1"><img src="/storage/images/calender.png" alt="" style="height:20px"></div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-9">
                                                                <h4 class="mb-1" style="font-size:11px;">
                                                                    From 10-01-2019 until 24-02-2023                                      
                                                                </h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col" style="color:black;">
                                                        <div class="row">
                                                            <div class="col-lg-1 col-md-1 col-sm-1 col-1"><i class="fa fa-cogs" aria-hidden="true" style="color: gray;"></i></div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-9">
                                                                <h4 class="mb-1" style="font-size:calc(12px + 0.1vw);">Skills</h4>
                                                                <h6 class="mb-0" style="font-size:12px ;color:gray;">Agronomy </h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <button class="col-example1" style="font-size:calc(12px + 0.1vw);">
                                                <a href="Volunteering_Mission?id=OTFTRUNSRVRfU1RVRkY=" style="color: inherit;">Apply</a>
                                                <i class="fa fa-arrow-right"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card box border-0 mb-4">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-3 position-relative">
                                    <img src="/storage/uplodes/Education-Supplies-for-Every--Pair-of-Shoes-Sold.png" alt="" class="img-fluid" style="height:100%">
                                    <div class="d-flex align-items-center first-txt1">
                                        <img src="/storage/images/pin.png" alt="" class="img-fluid pe-2" style="height:10px;">
                                        <span>Melbourne</span>
                                    </div>
                                    <div class="d-flex align-items-center second-txt1 p-2">
                                        <a href="home?source=unlike_mission&amp;like=92&amp;user=29"><i class="fa fa-heart text-danger" aria-hidden="true"></i></a>                    
                                    </div>
                                    <div class="d-flex align-items-center third-txt1 p-2">
                                        <img src="/storage/images/user.png" alt="" class="img-fluid" style="height:17px">
                                    </div>
                                    <div class="d-flex four-txt justify-content-center">
                                        <div class="bdg1">Children</div>
                                    </div>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-9">
                                    <div class="card-body me-4">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <img src="/storage/images/pin1.png" alt="" class="img-fluid pe-3" style="height:13px;">
                                                <span class="black">Melbourne</span> <img src="/storage/images/web.png" alt="" class="img-fluid pe-3 ps-3" style="height:13px;">
                                                <span class="black">Children</span> <img src="/storage/images/organization.png" alt="" class="img-fluid pe-3 ps-3" style="height:13px;">
                                                <span class="black">Australian Paradise</span>
                                            </div>
                                            <div class="icon">
                                                <img src="/storage/images/selected-star.png" alt="" class="ps-1 star"><img src="/storage/images/selected-star.png" alt="" class="ps-1 star"><img src="/storage/images/selected-star.png" alt="" class="ps-1 star"><img src="/storage/images/selected-star.png" alt="" class="ps-1 star"><img src="/storage/images/star.png" alt="" class="ps-1 star">                        
                                            </div>
                                        </div>
                                        <h2 class="card-title mt-2" style="font-size:calc(15px + 0.3vw); color:black;">
                                            <a href="" style="color: black;">
                                            Education Supplies for Every Pair of Shoes Sold                        </a>
                                        </h2>
                                        <p class="mb-3" style="color:gray; font-size:calc(11px + 0.1vw);">
                                            Lorem ipsum dolor sit amet, consectetur dipiscing elit, sed do eiusmod tempor incididunt ut labore...                      
                                        </p>
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <div class="row">
                                                    <div class="col" style="color:black;">
                                                        <div class="row">
                                                            <div class="col-lg-1 col-md-1 col-sm-1 col-1"><img src="/storage/images/Seats-left.png" alt="" style="height:21px"></div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-9">
                                                                <h4 class="mb-1" style="font-size:calc(12px + 0.1vw);">
                                                                    2                                        
                                                                </h4>
                                                                <h6 class="mb-0" style="font-size:11px ;color:gray;">Already volunteered</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col" style="color:black;">
                                                        <div class="row">
                                                            <div class="col-lg-1 col-md-1 col-sm-1 col-1"><img src="/storage/images/deadline.png" alt="" style="height:28px"></div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-9">
                                                                <h4 class="mb-1" style="font-size:calc(12px + 0.1vw);">
                                                                    25/02/2023                                        
                                                                </h4>
                                                                <h6 class="mb-0" style="font-size:12px ;color:gray;">Deadline</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col" style="color:black;">
                                                        <div class="row">
                                                            <div class="col-lg-1 col-md-1 col-sm-1 col-1"><img src="/storage/images/calender.png" alt="" style="height:20px"></div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-9">
                                                                <h4 class="mb-1" style="font-size:11px;">
                                                                    From 10-01-2019 until 24-02-2023                                      
                                                                </h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col" style="color:black;">
                                                        <div class="row">
                                                            <div class="col-lg-1 col-md-1 col-sm-1 col-1"><i class="fa fa-cogs" aria-hidden="true" style="color: gray;"></i></div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-9">
                                                                <h4 class="mb-1" style="font-size:calc(12px + 0.1vw);">Skills</h4>
                                                                <h6 class="mb-0" style="font-size:12px ;color:gray;">Botany</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <button class="col-example1" style="font-size:calc(12px + 0.1vw);">
                                                <a href="Volunteering_Mission?id=OTJTRUNSRVRfU1RVRkY=" style="color: inherit;">Apply</a>
                                                <i class="fa fa-arrow-right"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card box border-0 mb-4">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-3 position-relative">
                                    <img src="/storage/uplodes/Nourish-the-Children-in--African-country.png" alt="" class="img-fluid" style="height:100%">
                                    <div class="d-flex align-items-center first-txt1">
                                        <img src="/storage/images/pin.png" alt="" class="img-fluid pe-2" style="height:10px;">
                                        <span>Barcelona</span>
                                    </div>
                                    <div class="d-flex align-items-center second-txt1 p-2">
                                        <a href="home?source=like_mission&amp;like=93&amp;user=29"><i class="fa fa-heart-o" aria-hidden="true" style="color:white"></i></a>                    
                                    </div>
                                    <div class="d-flex align-items-center third-txt1 p-2">
                                        <img src="/storage/images/user.png" alt="" class="img-fluid" style="height:17px">
                                    </div>
                                    <div class="d-flex four-txt justify-content-center">
                                        <div class="bdg1">Nutrition</div>
                                    </div>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-9">
                                    <div class="card-body me-4">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <img src="/storage/images/pin1.png" alt="" class="img-fluid pe-3" style="height:13px;">
                                                <span class="black">Barcelona</span> <img src="/storage/images/web.png" alt="" class="img-fluid pe-3 ps-3" style="height:13px;">
                                                <span class="black">Nutrition</span> <img src="/storage/images/organization.png" alt="" class="img-fluid pe-3 ps-3" style="height:13px;">
                                                <span class="black">The Hunger</span>
                                            </div>
                                            <div class="icon">
                                                <img src="/storage/images/star.png" alt="" class="ps-1 star"><img src="/storage/images/star.png" alt="" class="ps-1 star"><img src="/storage/images/star.png" alt="" class="ps-1 star"><img src="/storage/images/star.png" alt="" class="ps-1 star"><img src="/storage/images/star.png" alt="" class="ps-1 star">                        
                                            </div>
                                        </div>
                                        <h2 class="card-title mt-2" style="font-size:calc(15px + 0.3vw); color:black;">
                                            <a href="" style="color: black;">
                                            Nourish the Children in African country                        </a>
                                        </h2>
                                        <p class="mb-3" style="color:gray; font-size:calc(11px + 0.1vw);">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore...                      
                                        </p>
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <div class="row">
                                                    <div class="col" style="color:black;">
                                                        <div class="row">
                                                            <div class="col-lg-1 col-md-1 col-sm-1 col-1"><img src="/storage/images/Seats-left.png" alt="" style="height:21px"></div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-9">
                                                                <h4 class="mb-1" style="font-size:calc(12px + 0.1vw);">
                                                                    19                                        
                                                                </h4>
                                                                <h6 class="mb-0" style="font-size:12px ;color:gray;">Seats Left</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col" style="color:black;">
                                                        <div class="row">
                                                            <div class="col-lg-1 col-md-1 col-sm-1 col-1"><img src="/storage/images/deadline.png" alt="" style="height:28px"></div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-9">
                                                                <h4 class="mb-1" style="font-size:calc(12px + 0.1vw);">
                                                                    25/02/2023                                        
                                                                </h4>
                                                                <h6 class="mb-0" style="font-size:12px ;color:gray;">Deadline</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col" style="color:black;">
                                                        <div class="row">
                                                            <div class="col-lg-1 col-md-1 col-sm-1 col-1"><img src="/storage/images/calender.png" alt="" style="height:20px"></div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-9">
                                                                <h4 class="mb-1" style="font-size:11px;">
                                                                    Ongoing Opportunity                                      
                                                                </h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col" style="color:black;">
                                                        <div class="row">
                                                            <div class="col-lg-1 col-md-1 col-sm-1 col-1"><i class="fa fa-cogs" aria-hidden="true" style="color: gray;"></i></div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-9">
                                                                <h4 class="mb-1" style="font-size:calc(12px + 0.1vw);">Skills</h4>
                                                                <h6 class="mb-0" style="font-size:12px ;color:gray;">Environmental Science</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <button class="col-example1" style="font-size:calc(12px + 0.1vw);">
                                                <a href="Volunteering_Mission?id=OTNTRUNSRVRfU1RVRkY=" style="color: inherit;">Apply</a>
                                                <i class="fa fa-arrow-right"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card box border-0 mb-4">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-3 position-relative">
                                    <img src="/storage/uplodes/CSR-initiative-stands-for-Coffee--and-Farmer-Equity.png" alt="" class="img-fluid" style="height:100%">
                                    <div class="d-flex align-items-center first-txt1">
                                        <img src="/storage/images/pin.png" alt="" class="img-fluid pe-2" style="height:10px;">
                                        <span>London</span>
                                    </div>
                                    <div class="d-flex align-items-center second-txt1 p-2">
                                        <a href="home?source=like_mission&amp;like=94&amp;user=29"><i class="fa fa-heart-o" aria-hidden="true" style="color:white"></i></a>                    
                                    </div>
                                    <div class="d-flex align-items-center third-txt1 p-2">
                                        <img src="/storage/images/user.png" alt="" class="img-fluid" style="height:17px">
                                    </div>
                                    <div class="d-flex four-txt justify-content-center">
                                        <div class="bdg1">Environment</div>
                                    </div>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-9">
                                    <div class="card-body me-4">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <img src="/storage/images/pin1.png" alt="" class="img-fluid pe-3" style="height:13px;">
                                                <span class="black">London</span> <img src="/storage/images/web.png" alt="" class="img-fluid pe-3 ps-3" style="height:13px;">
                                                <span class="black">Environment</span> <img src="/storage/images/organization.png" alt="" class="img-fluid pe-3 ps-3" style="height:13px;">
                                                <span class="black">CSE Network</span>
                                            </div>
                                            <div class="icon">
                                                <img src="/storage/images/star.png" alt="" class="ps-1 star"><img src="/storage/images/star.png" alt="" class="ps-1 star"><img src="/storage/images/star.png" alt="" class="ps-1 star"><img src="/storage/images/star.png" alt="" class="ps-1 star"><img src="/storage/images/star.png" alt="" class="ps-1 star">                        
                                            </div>
                                        </div>
                                        <h2 class="card-title mt-2" style="font-size:calc(15px + 0.3vw); color:black;">
                                            <a href="" style="color: black;">
                                            CSR initiative stands for Coffee and Farmer Equity                        </a>
                                        </h2>
                                        <p class="mb-3" style="color:gray; font-size:calc(11px + 0.1vw);">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore...                      
                                        </p>
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <div class="row">
                                                    <div class="col" style="color:black;">
                                                        <div class="row">
                                                            <div class="col-lg-1 col-md-1 col-sm-1 col-1"><img src="/storage/images/Seats-left.png" alt="" style="height:21px"></div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-9">
                                                                <h4 class="mb-1" style="font-size:calc(12px + 0.1vw);">
                                                                    2                                        
                                                                </h4>
                                                                <h6 class="mb-0" style="font-size:11px ;color:gray;">Already volunteered</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col" style="color:black;">
                                                        <div class="row">
                                                            <div class="col-lg-1 col-md-1 col-sm-1 col-1"><img src="/storage/images/calender.png" alt="" style="height:20px"></div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-9">
                                                                <h4 class="mb-1" style="font-size:11px;">
                                                                    Ongoing Opportunity                                      
                                                                </h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col" style="color:black;">
                                                        <div class="row">
                                                            <div class="col-lg-1 col-md-1 col-sm-1 col-1"><i class="fa fa-cogs" aria-hidden="true" style="color: gray;"></i></div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-9">
                                                                <h4 class="mb-1" style="font-size:calc(12px + 0.1vw);">Skills</h4>
                                                                <h6 class="mb-0" style="font-size:12px ;color:gray;">Farming</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <button class="col-example1" style="font-size:calc(12px + 0.1vw);">
                                                <a href="Volunteering_Mission?id=OTRTRUNSRVRfU1RVRkY=" style="color: inherit;">Apply</a>
                                                <i class="fa fa-arrow-right"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card box border-0 mb-4">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-3 position-relative">
                                    <img src="/storage/uplodes/Animal-welfare-&amp;-save-birds-campaign.png" alt="" class="img-fluid" style="height:100%">
                                    <div class="d-flex align-items-center first-txt1">
                                        <img src="/storage/images/pin.png" alt="" class="img-fluid pe-2" style="height:10px;">
                                        <span>Cape Town</span>
                                    </div>
                                    <div class="d-flex align-items-center second-txt1 p-2">
                                        <a href="home?source=unlike_mission&amp;like=95&amp;user=29"><i class="fa fa-heart text-danger" aria-hidden="true"></i></a>                    
                                    </div>
                                    <div class="d-flex align-items-center third-txt1 p-2">
                                        <img src="/storage/images/user.png" alt="" class="img-fluid" style="height:17px">
                                    </div>
                                    <div class="d-flex four-txt justify-content-center">
                                        <div class="bdg1">Animals</div>
                                    </div>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-9">
                                    <div class="card-body me-4">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <img src="/storage/images/pin1.png" alt="" class="img-fluid pe-3" style="height:13px;">
                                                <span class="black">Cape Town</span> <img src="/storage/images/web.png" alt="" class="img-fluid pe-3 ps-3" style="height:13px;">
                                                <span class="black">Animals</span> <img src="/storage/images/organization.png" alt="" class="img-fluid pe-3 ps-3" style="height:13px;">
                                                <span class="black">JR Foundation</span>
                                            </div>
                                            <div class="icon">
                                                <img src="/storage/images/star.png" alt="" class="ps-1 star"><img src="/storage/images/star.png" alt="" class="ps-1 star"><img src="/storage/images/star.png" alt="" class="ps-1 star"><img src="/storage/images/star.png" alt="" class="ps-1 star"><img src="/storage/images/star.png" alt="" class="ps-1 star">                        
                                            </div>
                                        </div>
                                        <h2 class="card-title mt-2" style="font-size:calc(15px + 0.3vw); color:black;">
                                            <a href="" style="color: black;">
                                            Animal welfare &amp; save birds campaign                        </a>
                                        </h2>
                                        <p class="mb-3" style="color:gray; font-size:calc(11px + 0.1vw);">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore...                      
                                        </p>
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <div class="row">
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
                                                    <div class="col" style="color:black;">
                                                        <div class="row">
                                                            <div class="col-lg-1 col-md-1 col-sm-1 col-1"><img src="/storage/images/calender.png" alt="" style="height:20px"></div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-9">
                                                                <h4 class="mb-1" style="font-size:11px;">
                                                                    plant 10,000 trees                                      
                                                                </h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col" style="color:black;">
                                                        <div class="row">
                                                            <div class="col-lg-1 col-md-1 col-sm-1 col-1"><i class="fa fa-cogs" aria-hidden="true" style="color: gray;"></i></div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-9">
                                                                <h4 class="mb-1" style="font-size:calc(12px + 0.1vw);">Skills</h4>
                                                                <h6 class="mb-0" style="font-size:12px ;color:gray;">Transactions</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <button class="col-example1" style="font-size:calc(12px + 0.1vw);">
                                                <a href="Volunteering_Mission?id=OTVTRUNSRVRfU1RVRkY=" style="color: inherit;">Apply</a>
                                                <i class="fa fa-arrow-right"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card box border-0 mb-4">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-3 position-relative">
                                    <img src="/storage/uplodes/Plantation-and-Afforestation-programme.png" alt="" class="img-fluid" style="height:100%">
                                    <div class="d-flex align-items-center first-txt1">
                                        <img src="/storage/images/pin.png" alt="" class="img-fluid pe-2" style="height:10px;">
                                        <span>Paris</span>
                                    </div>
                                    <div class="d-flex align-items-center second-txt1 p-2">
                                        <a href="home?source=like_mission&amp;like=96&amp;user=29"><i class="fa fa-heart-o" aria-hidden="true" style="color:white"></i></a>                    
                                    </div>
                                    <div class="d-flex align-items-center third-txt1 p-2">
                                        <img src="/storage/images/user.png" alt="" class="img-fluid" style="height:17px">
                                    </div>
                                    <div class="d-flex four-txt justify-content-center">
                                        <div class="bdg1">Health</div>
                                    </div>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-9">
                                    <div class="card-body me-4">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <img src="/storage/images/pin1.png" alt="" class="img-fluid pe-3" style="height:13px;">
                                                <span class="black">Paris</span> <img src="/storage/images/web.png" alt="" class="img-fluid pe-3 ps-3" style="height:13px;">
                                                <span class="black">Health</span> <img src="/storage/images/organization.png" alt="" class="img-fluid pe-3 ps-3" style="height:13px;">
                                                <span class="black">Amaze Doctors</span>
                                            </div>
                                            <div class="icon">
                                                <img src="/storage/images/star.png" alt="" class="ps-1 star"><img src="/storage/images/star.png" alt="" class="ps-1 star"><img src="/storage/images/star.png" alt="" class="ps-1 star"><img src="/storage/images/star.png" alt="" class="ps-1 star"><img src="/storage/images/star.png" alt="" class="ps-1 star">                        
                                            </div>
                                        </div>
                                        <h2 class="card-title mt-2" style="font-size:calc(15px + 0.3vw); color:black;">
                                            <a href="" style="color: black;">
                                            Plantation and Afforestation program                        </a>
                                        </h2>
                                        <p class="mb-3" style="color:gray; font-size:calc(11px + 0.1vw);">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore...                      
                                        </p>
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <div class="row">
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
                                                    <div class="col" style="color:black;">
                                                        <div class="row">
                                                            <div class="col-lg-1 col-md-1 col-sm-1 col-1"><img src="/storage/images/calender.png" alt="" style="height:20px"></div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-9">
                                                                <h4 class="mb-1" style="font-size:11px;">
                                                                    plant 10,000 trees                                      
                                                                </h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col" style="color:black;">
                                                        <div class="row">
                                                            <div class="col-lg-1 col-md-1 col-sm-1 col-1"><i class="fa fa-cogs" aria-hidden="true" style="color: gray;"></i></div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-9">
                                                                <h4 class="mb-1" style="font-size:calc(12px + 0.1vw);">Skills</h4>
                                                                <h6 class="mb-0" style="font-size:12px ;color:gray;">Research</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <button class="col-example1" style="font-size:calc(12px + 0.1vw);">
                                                <a href="Volunteering_Mission?id=OTZTRUNSRVRfU1RVRkY=" style="color: inherit;">Apply</a>
                                                <i class="fa fa-arrow-right"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card box border-0 mb-4">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-3 position-relative">
                                    <img src="/storage/uplodes/Grow-Trees-On-the-path-to-environment-sustainability.png" alt="" class="img-fluid" style="height:100%">
                                    <div class="d-flex align-items-center first-txt1">
                                        <img src="/storage/images/pin.png" alt="" class="img-fluid pe-2" style="height:10px;">
                                        <span>New York</span>
                                    </div>
                                    <div class="d-flex align-items-center five-txt">APPLIED</div>
                                    <div class="d-flex align-items-center second-txt1 p-2">
                                        <a href="home?source=like_mission&amp;like=97&amp;user=29"><i class="fa fa-heart-o" aria-hidden="true" style="color:white"></i></a>                    
                                    </div>
                                    <div class="d-flex align-items-center third-txt1 p-2">
                                        <img src="/storage/images/user.png" alt="" class="img-fluid" style="height:17px">
                                    </div>
                                    <div class="d-flex four-txt justify-content-center">
                                        <div class="bdg1">Education</div>
                                    </div>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-9">
                                    <div class="card-body me-4">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <img src="/storage/images/pin1.png" alt="" class="img-fluid pe-3" style="height:13px;">
                                                <span class="black">New York</span> <img src="/storage/images/web.png" alt="" class="img-fluid pe-3 ps-3" style="height:13px;">
                                                <span class="black">Education</span> <img src="/storage/images/organization.png" alt="" class="img-fluid pe-3 ps-3" style="height:13px;">
                                                <span class="black">Tree Canada</span>
                                            </div>
                                            <div class="icon">
                                                <img src="/storage/images/selected-star.png" alt="" class="ps-1 star"><img src="/storage/images/selected-star.png" alt="" class="ps-1 star"><img src="/storage/images/selected-star.png" alt="" class="ps-1 star"><img src="/storage/images/star.png" alt="" class="ps-1 star"><img src="/storage/images/star.png" alt="" class="ps-1 star">                        
                                            </div>
                                        </div>
                                        <h2 class="card-title mt-2" style="font-size:calc(15px + 0.3vw); color:black;">
                                            <a href="" style="color: black;">
                                            Grow Trees – On the path to environment sustainability                        </a>
                                        </h2>
                                        <p class="mb-3" style="color:gray; font-size:calc(11px + 0.1vw);">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor...                      
                                        </p>
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <div class="row">
                                                </div>
                                            </div>
                                            <div>
                                                <button class="col-example1" style="font-size:calc(12px + 0.1vw);">
                                                <a href="Volunteering_Mission?id=OTdTRUNSRVRfU1RVRkY=" style="color: inherit;">View Detail</a>
                                                <i class="fa fa-arrow-right"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card box border-0 mb-4">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-3 position-relative">
                                    <img src="/storage/uplodes/Education-Supplies-for-Every--Pair-of-Shoes-Sold.png" alt="" class="img-fluid" style="height:100%">
                                    <div class="d-flex align-items-center first-txt1">
                                        <img src="/storage/images/pin.png" alt="" class="img-fluid pe-2" style="height:10px;">
                                        <span>Sydney</span>
                                    </div>
                                    <div class="d-flex align-items-center five-txt" style="background-color:red;">CLOSED</div>
                                    <div class="d-flex align-items-center second-txt1 p-2">
                                        <a href="home?source=like_mission&amp;like=98&amp;user=29"><i class="fa fa-heart-o" aria-hidden="true" style="color:white"></i></a>                    
                                    </div>
                                    <div class="d-flex align-items-center third-txt1 p-2">
                                        <img src="/storage/images/user.png" alt="" class="img-fluid" style="height:17px">
                                    </div>
                                    <div class="d-flex four-txt justify-content-center">
                                        <div class="bdg1">Children</div>
                                    </div>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-9">
                                    <div class="card-body me-4">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <img src="/storage/images/pin1.png" alt="" class="img-fluid pe-3" style="height:13px;">
                                                <span class="black">Sydney</span> <img src="/storage/images/web.png" alt="" class="img-fluid pe-3 ps-3" style="height:13px;">
                                                <span class="black">Children</span> <img src="/storage/images/organization.png" alt="" class="img-fluid pe-3 ps-3" style="height:13px;">
                                                <span class="black">Tree Canada</span>
                                            </div>
                                            <div class="icon">
                                                <img src="/storage/images/star.png" alt="" class="ps-1 star"><img src="/storage/images/star.png" alt="" class="ps-1 star"><img src="/storage/images/star.png" alt="" class="ps-1 star"><img src="/storage/images/star.png" alt="" class="ps-1 star"><img src="/storage/images/star.png" alt="" class="ps-1 star">                        
                                            </div>
                                        </div>
                                        <h2 class="card-title mt-2" style="font-size:calc(15px + 0.3vw); color:black;">
                                            <a href="" style="color: black;">
                                            Education Supplies for Every Pair of Shoes Sold                        </a>
                                        </h2>
                                        <p class="mb-3" style="color:gray; font-size:calc(11px + 0.1vw);">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor...                      
                                        </p>
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <div class="row">
                                                </div>
                                            </div>
                                            <div>
                                                <button class="col-example1" style="font-size:calc(12px + 0.1vw);">
                                                <a href="Volunteering_Mission?id=OThTRUNSRVRfU1RVRkY=" style="color: inherit;">View Detail</a>
                                                <i class="fa fa-arrow-right"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card box border-0 mb-4">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-3 position-relative">
                                    <img src="/storage/uplodes/Nourish-the-Children-in--African-country.png" alt="" class="img-fluid" style="height:100%">
                                    <div class="d-flex align-items-center first-txt1">
                                        <img src="/storage/images/pin.png" alt="" class="img-fluid pe-2" style="height:10px;">
                                        <span>Berlin</span>
                                    </div>
                                    <div class="d-flex align-items-center five-txt" style="background-color:red;">CLOSED</div>
                                    <div class="d-flex align-items-center second-txt1 p-2">
                                        <a href="home?source=like_mission&amp;like=99&amp;user=29"><i class="fa fa-heart-o" aria-hidden="true" style="color:white"></i></a>                    
                                    </div>
                                    <div class="d-flex align-items-center third-txt1 p-2">
                                        <img src="/storage/images/user.png" alt="" class="img-fluid" style="height:17px">
                                    </div>
                                    <div class="d-flex four-txt justify-content-center">
                                        <div class="bdg1">Nutrition</div>
                                    </div>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-9">
                                    <div class="card-body me-4">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <img src="/storage/images/pin1.png" alt="" class="img-fluid pe-3" style="height:13px;">
                                                <span class="black">Berlin</span> <img src="/storage/images/web.png" alt="" class="img-fluid pe-3 ps-3" style="height:13px;">
                                                <span class="black">Nutrition</span> <img src="/storage/images/organization.png" alt="" class="img-fluid pe-3 ps-3" style="height:13px;">
                                                <span class="black"></span>
                                            </div>
                                            <div class="icon">
                                                <img src="/storage/images/star.png" alt="" class="ps-1 star"><img src="/storage/images/star.png" alt="" class="ps-1 star"><img src="/storage/images/star.png" alt="" class="ps-1 star"><img src="/storage/images/star.png" alt="" class="ps-1 star"><img src="/storage/images/star.png" alt="" class="ps-1 star">                        
                                            </div>
                                        </div>
                                        <h2 class="card-title mt-2" style="font-size:calc(15px + 0.3vw); color:black;">
                                            <a href="" style="color: black;">
                                            Nourish the Children in African country                        </a>
                                        </h2>
                                        <p class="mb-3" style="color:gray; font-size:calc(11px + 0.1vw);">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor...                      
                                        </p>
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <div class="row">
                                                </div>
                                            </div>
                                            <div>
                                                <button class="col-example1" style="font-size:calc(12px + 0.1vw);">
                                                <a href="Volunteering_Mission?id=OTlTRUNSRVRfU1RVRkY=" style="color: inherit;">View Detail</a>
                                                <i class="fa fa-arrow-right"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <nav aria-label="Page navigation example">
                <ul class="pagination pager justify-content-center">
                    <li class="page-item"><a class="page-link" style="border-radius:5px; padding:9px; height:30px; width:30px; margin:4px;"><img src="/storage/images/previous.png" alt=""></a></li>
                    <li class="page-item"><a class="page-link" style="border-radius:5px; padding:9px; height:30px; width:30px; margin:4px;"><img src="/storage/images/left.png" alt=""></a></li>
                    <li class="page-item"><a class="page-link active text-center" href="home?page=1" style="border-radius:5px; padding:5px; height:30px; width:30px; margin:4px; font-size:15px;"><b>1</b></a></li>
                    <li class="page-item"><a class="page-link" style="border-radius:5px; padding:9px; height:30px; width:30px; margin:4px;"><img src="/storage/images/arrow.png" alt=""></a></li>
                    <li class="page-item"><a class="page-link" style="border-radius:5px; padding:9px; height:30px; width:30px; margin:4px;"><img src="/storage/images/next.png" alt=""></a></li>
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