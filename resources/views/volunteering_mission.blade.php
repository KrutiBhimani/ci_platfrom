@extends('layouts.home_header2')
@section('content')

<div class="container-lg">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
            <div style="height:100%;">
                <img id="mainImage" class="ps-1 pe-1 mt-2" src="{{$mission->media_path}}" height="80%" width="100%" style="object-fit: cover;">
                <div class="row pe-3 ps-3 pt-1">
                    <div class="top-content p-0" id="style-sheet-modern">
                        <div class="container-fluid p-0 m-0">
                            <div id="carousel-example" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner row w-100 mx-auto" role="listbox">
                                    <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3 p-1">
                                        <img src="/storage/uplodes/img.png" class="img-fluid mx-auto d-block" style="object-fit: cover;height: 100px; width:100%" alt="img1">
                                    </div>
                                    <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3 p-1 active">
                                        <img src="/storage/uplodes/img1.png" class="img-fluid mx-auto d-block" style="object-fit: cover;height: 100px; width:100%" alt="img1">
                                    </div>
                                    <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3 p-1">
                                        <img src="/storage/uplodes/wolgawron-169hero-service-istock.jpg" class="img-fluid mx-auto d-block" style="object-fit: cover;height: 100px; width:100%" alt="img1">
                                    </div>
                                    <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3 p-1">
                                        <img src="/storage/uplodes/CSR-initiative-stands-for-Coffee--and-Farmer-Equity.png" class="img-fluid mx-auto d-block" style="object-fit: cover;height: 100px; width:100%" alt="img1">
                                    </div>
                                    <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3 p-1">
                                        <img src="/storage/uplodes/Grow-Trees-On-the-path-to-environment-sustainability.png" class="img-fluid mx-auto d-block" style="object-fit: cover;height: 100px; width:100%" alt="img1">
                                    </div>
                                    <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3 p-1">
                                        <img src="/storage/uplodes/image.png" class="img-fluid mx-auto d-block" style="object-fit: cover;height: 100px; width:100%" alt="img1">
                                    </div>
                                </div>
                                <a class="carousel-control-prev" href="#carousel-example" role="button" data-slide="prev" style="z-index:0;background-color: black; width:5%;top:4px;bottom:4px;left:3px;">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carousel-example" role="button" data-slide="next" style="z-index:0;background-color: black; width:5%;top:4px;bottom:4px;right:3px;">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-12 mt-5">
            <p class="mb-3" style="font-size:calc(15px + 1vw);">{{$mission->mission_title}}</p>
            <p class="mb-3" style="color: gray; font-size: calc(11px + 0.15vw);">{{$mission->short_description}}</p>
            <div class="d-flex align-items-center">
                <hr class="flex-grow-1 div">
                <div class="bdg2">
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
                <hr class="flex-grow-1 div">
            </div>
            <div class="d-flex justify-content-around mt-2 mb-2">
                @if($mission->mission_type == 'TIME')
                @if($mission->total_seat != null)
                <div style="color:black;">
                    <div class="d-flex justify-content-around">
                        <div class="pe-3">
                            <img src="/storage/images/Seats-left.png" alt="" style="height:23px">
                        </div>
                        <div>
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
                <div style="color:black;">
                    <div class="d-flex justify-content-around">
                        <div class="pe-3">
                            <img src="/storage/images/Already-volunteered.png" alt="" style="height:20px">
                        </div>
                        <div>
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
                <div style="color:black;">
                    <div class="d-flex justify-content-around">
                        <div class="pe-3">
                            <img src="/storage/images/deadline.png" alt="" style="height:28px">
                        </div>
                        <div>
                            <h4 class="mb-2" style="font-size:calc(13px + 0.1vw);">
                                {{date("d-m-Y", strtotime($mission->deadline))}}                                
                            </h4>
                            <h6 class="mb-2" style="font-size:12px ;color:gray;">Deadline</h6>
                        </div>
                    </div>
                </div>
                @endif
                @else
                <div style="color:black;">
                    <div class="d-flex justify-content-around">
                        <div class="pe-3">
                            <img src="/storage/images/achieved.png" alt="" style="height:22px">
                        </div>
                        <div style="width: 100%;">
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
            <hr class="div">
            <div class="row mt-3 mb-3">
                <div class="col-lg-6 col-md-12 col-sm-12 col-12 mt-2">
                    <div class="col-example2 text-center" style="font-size:calc(13px + 0.1vw);">
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
                        <a href="unlike/{{ $mission->missionid }}" style="color: inherit; text-decoration: inherit;"><i class="fa fa-heart text-danger me-2" aria-hidden="true"></i>Remove From Favourite</a>
                        @else
                        <a href="like/{{ $mission->missionid }}" style="color: inherit; text-decoration: inherit;"><i class="fa fa-heart-o text-dark me-2" aria-hidden="true" style="color:white"></i>Add to Favourite</a>
                        @endif
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 col-12 mt-2">
                    <div class="col-example2 text-center" style="font-size:calc(13px + 0.1vw);">
                        <a href="#" style="color: inherit; text-decoration: inherit;" data-bs-toggle="modal" data-bs-target="#popup91">
                        <img src="/storage/images/add1.png" alt="" class="mb-1" style="height:15px ;">
                        Recommend to a Co-Worker
                        </a>
                    </div>
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
                                        <button id="button1" type="submit" name="inviteuser" class="col-example7" data-bs-dismiss="modal">Invite
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex align-items-center">
                <hr class="flex-grow-1 div">
                <div class="ps-2 pe-2">
                @for ($x = 0; $x < 5; $x++)
                                                    @if ($x < $mission->rating) 
                                                        <img src="/storage/images/selected-star.png" alt="" class="ps-1">
                                                    @else
                                                        <img src='/storage/images/star.png' alt='' class='ps-1'>
                                                    @endif
                                                @endfor
                </div>
                <hr class="flex-grow-1 div">
            </div>
            <div class="row mt-3 mb-3 ms-1 me-1">
                <div class="col col-example3 pe-2 ps-2">
                    <img src="/storage/images/pin1.png" style="height:18px;">
                    <h6 class="mt-3 mb-1" style="color:gray; font-size:10px">City</h6>
                    <h4 class="mb-0" style="font-size:calc(11px + 0.1vw);">{{$mission->name}}</h4>
                </div>
                <div class="col col-example3 pe-2 ps-2">
                    <img src="/storage/images/web.png" style="height:18px;">
                    <h6 class="mt-3 mb-1" style="color:gray; font-size:10px">Theme</h6>
                    <h4 class="mb-0" style="font-size:calc(11px + 0.1vw);">{{$mission->title}}</h4>
                </div>
                <div class="col col-example3 pe-2 ps-2">
                    <img src="/storage/images/calender.png" style="height:17px;">
                    <h6 class="mt-3 mb-1" style="color:gray; font-size:10px">Date</h6>
                    <h4 class="mb-0" style="font-size:calc(11px + 0.1vw);">
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
                <div class="col col-example3 pe-2 ps-2">
                    <img src="/storage/images/organization.png" style="height:15px;">
                    <h6 class="mt-3 mb-1" style="color:gray; font-size:10px">Organization</h6>
                    <h4 class="mb-0" style="font-size:calc(11px + 0.1vw);">{{$mission->organization_name}}</h4>
                </div>
            </div>
            <div class="d-flex align-items-center justify-content-center">
                    @php 
                        $key = 0;
                        $current = date("Y-m-d h:i:s");
                    @endphp
                    @foreach ($vols as $vol) 
                        @if ($vol->user_id == Auth::user()->user_id)
                            @php
                            $key = 1;
                            @endphp
                        @endif
                    @endforeach
                    @if ($mission->mission_type == 'TIME') 
                        @if (($mission->deadline != null && $current > $mission->deadline) || ($mission->end_date != null && $current > $mission->end_date))
                            @php
                            $key = 1;
                            @endphp
                        @endif
                    @endif
                    @if($key == 0)
                        <a href="Volunteering_Mission?source=apply&id=<?php echo $mission->missionid ?>" style="color: inherit;">
                            <div class="col-example" style="font-size:calc(15px + 0.1vw); font-weight: 400;">Apply Now
                            <i class="fa fa-arrow-right ps-2"></i>
                            </div>
                        </a>
                    @endif
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-lg-8 col-md-8 col-sm-12 col-12">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active gray" data-toggle="tab" href="#mission">Mission</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link gray" data-toggle="tab" href="#organization">Organization</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link gray" data-toggle="tab" href="#comments">Comments</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane show active" id="mission">
                    @php
                    echo $mission->description
                    @endphp
                    @if(!empty($documents))
                    <h4 class="mt-4 mb-2" style="font-size:calc(11px + 0.8vw);">Documents</h4>
                    <div class="d-flex flex-wrap">
                        @foreach($documents as $document)
                        <button class="col-example5 mt-2" style="font-size:calc(13px + 0.1vw);">
                        @if($document->document_type == 'doc' || $document->document_type == 'docx')
                        <img src="/storage/images/doc.png" alt="" style="height:18px ;">
                        @endif
                        @if($document->document_type == 'xls' || $document->document_type == 'xlsx')
                        <img src="/storage/images/xlsx.png" alt="" style="height:18px ;">
                        @endif
                        @if($document->document_type == 'pdf')
                        <img src="/storage/images/pdf.png" alt="" style="height:18px ;">
                        @endif
                        <a href="{{$document->document_path}}" target="_blank" style="color: inherit;">{{$document->document_name}}</a>
                        </button>
                        @endforeach
                    </div>
                    @endif
                </div>
                <div class="tab-pane" id="organization">
                    <p class="gray pt-3">
                        {{$mission->organization_detail}}
                    </p>
                </div>
                <div class="tab-pane" id="comments">
                    <form class="m-0" method="post" enctype="multipart/form-data">
                        <textarea class="mt-3 ps-3 pe-3 textarea" rows="3" name="comment_text" placeholder="Enter your comments..." required=""></textarea>
                        <div class="error1"></div>
                        <button type="submit" name="add_comment" class="col-example mt-3" style="font-size:15px; width:fit-content">
                        Post Comment
                        </button>
                    </form>
                    @if($comment_count > 0)
                            <div class="pt-1 pb-1 ps-3 pe-3" style="background-color:#f7f7f7; {{$comment_count > 4 ? 'height: 450px;overflow-y: auto':''}}">
                                @foreach ($comments as $comment) 
                                    <div class="row mt-2 mb-2 p-3 ms-0 me-0" style="background-color:white;">
                                        <div class="col-lg-1 col-md-2 col-sm-2 col-12 p-0">
                                            <img src="{{$comment->avatar!=null ? '/storage/uplodes/'.$comment->avatar : '/storage/images/user1.png'}}" class="rounded-circle" height="45px">
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-10 col-12 p-0">
                                            <p class="mb-1" style="font-size:14px ;">{{$comment->first_name.' '.$comment->last_name}}</p>
                                            <p class="mb-2" style="font-size:10px ;">{{date("l, F d, Y, h:i A", strtotime($comment->comment_date))}}</p>
                                            <p class="mb-0" style="font-size:12px ;">{{$comment->comment_text}}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                       @endif
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
            <div class="col-example3 ps-3 pe-3 pt-3 pb-0 mt-3">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active1 gray pt-0 ps-0" data-toggle="tab" href="#info">Information</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane show active" id="info">
                        <table class="table mb-0">
                            <tbody>
                                <tr>
                                    <td>Skills</td>
                                    <td>
                                        @php 
                                        $skill = '';
                                        @endphp
                                        @foreach ($skills as $item) 
                                            @php $skill .= $item->skill_name . ', ' @endphp
                                        @endforeach
                                        @php
                                        $skill = rtrim($skill, ', ')
                                        @endphp
                                        {{$skill}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Days</td>
                                    <td>{{$mission->availability}}</td>
                                </tr>
                                <tr>
                                    <td style="border-bottom: 0;">Rating</td>
                                    <td style="border-bottom: 0;">
                                        @for ($x = 0; $x < 5; $x++)
                                                    @if ($x < $mission->rating) 
                                                        <img src="/storage/images/selected-star.png" height="15px">
                                                    @else
                                                        <img src='/storage/images/star.png' height="15px">
                                                    @endif
                                                @endfor
                                                <span class="gray2">(by {{$rate_count > 0 ? $rate_count : '0'}} volunteers)</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-example3 pt-3 pb-0 mt-3">
                <ul class="nav nav-tabs ms-3 me-3">
                    <li class="nav-item ">
                        <a class="nav-link active1 gray pt-0 ps-0" data-toggle="tab" href="#Volunteer">Recent
                        Volunteers</a>
                    </li>
                </ul>
                <div class="tab-content ps-3 pe-3 pt-4 pb-1">
                    <div class="tab-pane show active ps-3 pe-3" id="Volunteer">
                        <div class="row">
                            @php
                                $count = 0;
                                @endphp
                                @foreach ($vols as $vol) 
                                    <div class="col-4 text-center p-0">
                                        <img src="{{$vol->avatar!=null ? '/storage/uplodes/'.$vol->avatar : '/storage/images/user1.png'}}" class="rounded-circle" height="60px">
                                        <p style="font-size:11px ;">{{$vol->first_name.' '.$vol->last_name}}</p>
                                    </div>
                                @php $count++ @endphp
                            @endforeach
                            
                        </div>
                    </div>
                </div>
                <table class="table table-bordered m-0 text-center">
                    <tbody>
                        <tr style="border-bottom: 0; border-start:0;">
                            <td style="border-bottom: 0; border-start: 0;"><img src="/storage/images/left.png" height="12px">
                            </td>
                            <td style="border-bottom: 0; border-start: 0;">{{$count}} Recent Volunteers</td>
                            <td style="border-bottom: 0; border-end: 0;"><img src="/storage/images/right-arrow1.png" height="12px">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<hr class="div mt-5 mb-5">
<div class="container-lg">
    <div class="row row-eq-height justify-content-center">
        <p class="text-center" style="font-size:30px ;font-weight: 350;">
            Related Missions
        </p>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12 mb-5 d-flex align-items-stretch">
            <div class="card box border-0">
                <div class="gfg">
                    <img src="/storage/uplodes/CSR-initiative-stands-for-Coffee--and-Farmer-Equity.png" alt="" class="img-fluid" style="width:100%;">
                    <div class="d-flex align-items-center first-txt"><img src="/storage/images/pin.png" alt="" class="img-fluid pe-1" style="height:12px;">London</div>
                    <div class="d-flex align-items-center five-txt">APPLIED</div>
                    <div class="d-flex align-items-center second-txt2 p-2">
                        <a href="Volunteering_Mission?source=like_mission&amp;id=94&amp;user=61"><i class="fa fa-heart-o" aria-hidden="true" style="color:white"></i></a>                                
                    </div>
                    <div class="d-flex align-items-center third-txt p-2"><a href="" style="color: black;" data-bs-toggle="modal" data-bs-target="#popup94"><img src="/storage/images/user.png" alt="" class="img-fluid" style="height:17px"></a></div>
                    <div id="popup94" class="modal">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content p-2">
                                <div class="modal-header pb-0" style="border-bottom:0 ;">
                                    <p class="mb-0" style="font-size:20px ;">Invite</p>
                                    <img class="text-end mt-2 mb-2" src="/storage/images/cancel1.png" data-bs-dismiss="modal" style="cursor: pointer;height:13px">
                                </div>
                                <form class="m-0" method="post" enctype="multipart/form-data">
                                    <input type="text" name="m_id" value="94" hidden="">
                                    <div class="modal-body pb-0">
                                        <p class="mb-1 mt-3">Email </p>
                                        <input type="email" class="popup" name="email" place-holder="enter user email to invite">
                                    </div>
                                    <div class="modal-footer mt-4" style="border-top:0 ;">
                                        <button type="reset" class="col-example8" data-bs-dismiss="modal">Cancle
                                        </button>
                                        <button type="submit" name="inviteuser" class="col-example7" data-bs-dismiss="modal">Invite
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex four-txt justify-content-center">
                        <div class="bdg1">Environment</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12" style="color:black">
                        <div class="card-body pb-3 remove">
                            <a href="Volunteering_Mission?id=OTRTRUNSRVRfU1RVRkY=" style="color:black;">
                                <h2 class="card-title mb-2" style="font-size:calc(15px + 0.3vw);">CSR initiative stands for Coffee and Farmer Equity</h2>
                            </a>
                            <p class="mb-2" style="color:gray; font-size:calc(11px + 0.1vw);">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit...                                        
                            </p>
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h6 class="m-0" style="font-size:calc(11px + 0.1vw);">CSE Network</h6>
                                </div>
                                <div class="icon">
                                    <img src="/storage/images/star.png" alt="" class="ps-1 star"><img src="/storage/images/star.png" alt="" class="ps-1 star"><img src="/storage/images/star.png" alt="" class="ps-1 star"><img src="/storage/images/star.png" alt="" class="ps-1 star"><img src="/storage/images/star.png" alt="" class="ps-1 star">                                            
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="div">
                <div class="d-flex align-items-center justify-content-center">
                    <a href="Volunteering_Mission?id=OTRTRUNSRVRfU1RVRkY=" style="color: inherit;"><button class=" col-example mt-3" style="font-size:calc(13px + 0.1vw);">View Detail<i class="fa fa-arrow-right ps-2"></i></button></a>
                </div>
            </div>
        </div>
    </div>
    <br>
</div>
@endsection