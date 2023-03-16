@extends('layouts.home_header2')
@section('content')
<div class="container-lg">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="h-100">
                <img id="mainImage" class="ps-1 pe-1 mt-2 w-100 ofit" src="{{$mission->media_path}}" height="80%">
                <div class="row pe-3 ps-3 pt-1">
                    <div class="top-content p-0" id="style-sheet-modern">
                        <div class="container-fluid p-0 m-0">
                            <div id="carousel-example" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner row w-100 mx-auto" role="listbox">
                                    @foreach ($medias as $key => $media) 
                                    <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3 p-1 {{$key==0 ? 'active' : ''}}">
                                        <img src="{{$media->media_path}}" class="img-fluid mx-auto d-block w-100 ofit h100" alt="img1">
                                    </div>
                                    @endforeach
                                </div>
                                <a class="carousel-control-prev text-bg-dark icon-css" href="#carousel-example" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next text-bg-dark icon-css" href="#carousel-example" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-12 mt-5 pt-4">
            <p class="mb-3 fs1501">{{$mission->mission_title}}</p>
            <p class="mb-3 text-secondary fs1115">{{$mission->short_description}}</p>
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
                <div class="text-dark">
                    <div class="d-flex justify-content-around">
                        <div class="pe-3">
                            <img src="/storage/images/Seats-left.png" alt="" class="h23">
                        </div>
                        <div>
                            @foreach($applications as $application)
                            @if($application->missionid == $mission->missionid)
                            {{$mission->total_seat - $application->count}}
                            <h6 class="mb-2 text-secondary" class="fs12">Seats Left</h6>
                            @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                @else
                <div class="text-dark">
                    <div class="d-flex justify-content-around">
                        <div class="pe-3">
                            <img src="/storage/images/Already-volunteered.png" alt="" class="h20">
                        </div>
                        <div>
                            @foreach($applications as $application)
                            @if($application->missionid == $mission->missionid)
                            {{$application->count}}
                            <h6 class="mb-2 text-secondary" class="fs12">Already volunteered</h6>
                            @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                @endif
                @if($mission->deadline != null)
                <div class="text-dark">
                    <div class="d-flex justify-content-around">
                        <div class="pe-3">
                            <img src="/storage/images/deadline.png" alt="" class="h28">
                        </div>
                        <div>
                                {{date("d-m-Y", strtotime($mission->deadline))}}
                            <h6 class="mb-2 text-secondary" class="fs12">Deadline</h6>
                        </div>
                    </div>
                </div>
                @endif
                @else
                <div class="text-dark w40">
                    <div class="d-flex justify-content-around">
                        <div class="pe-3">
                            <img src="/storage/images/achieved.png" alt="" class="h22">
                        </div>
                        <div class="w-100">
                            <div class="mt-1 mb-3 w-100 under">
                                <div class="uper" style="width:{{$goal_count}}%;">
                                </div>
                            </div>
                            <h6 class="mb-2 text-secondary fs12">{{$goal_achieved}} achieved</h6>
                        </div>
                    </div>
                </div>
                @endif
            </div>
            <hr class="div">
            <div class="row mt-3 mb-3">
                <div class="col-lg-6 col-md-12 col-sm-12 col-12 mt-2">
                    <div class="col-example2 text-center fs131">
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
                        <a href="/unlike/{{ $mission->missionid }}" class="inh tinh"><i class="fa fa-heart text-danger me-2" aria-hidden="true"></i>Remove From Favourite</a>
                        @else
                        <a href="/like/{{ $mission->missionid }}" class="inh tinh"><i class="fa fa-heart-o text-dark me-2 text-white" aria-hidden="true"></i>Add to Favourite</a>
                        @endif
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 col-12 mt-2">
                    <div class="col-example2 text-center fs131">
                        <a href="#" class="inh tinh" data-bs-toggle="modal" data-bs-target="#popup{{ $mission->missionid }}">
                        <img src="/storage/images/add1.png" alt="" class="mb-1 h15">
                        Recommend to a Co-Worker
                        </a>
                    </div>
                    <div id="popup{{ $mission->missionid }}" class="modal">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content p-2">
                                <div class="modal-header pb-0 border-bottom-0">
                                    <p class="mb-0 fs20">Invite</p>
                                    <img class="text-end mt-2 mb-2 pe-auto h13" src="/storage/images/cancel1.png" data-bs-dismiss="modal">
                                </div>
                                <form action="{{ route('invite.user') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="text" name="mission_id" value="{{$mission->missionid}}" hidden="">
                                    <div class="modal-body pb-0">
                                        <p class="mb-1 mt-3">Email </p>
                                        <input type="email" class="popup" name="email" place-holder="enter user email to invite">
                                    </div>
                                    <div class="modal-footer mt-4 border-top-0">
                                        <button type="reset" class="col-example8" data-bs-dismiss="modal">Cancle
                                        </button>
                                        <button type="submit" id="button1" name="inviteuser" class="col-example7" data-bs-dismiss="modal">Invite
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
                    @php 
                    $rate = 0;
                    @endphp
                    @foreach($vols as $vol)
                    @if($vol->user_id == Auth::user()->user_id)
                    @php 
                    $rate = 1;
                    break;
                    @endphp
                    @endif
                    @endforeach
                    @if($rateduser==1 && $rate == 1)
                    @for($x = 1; $x <= 5; $x++) 
                    @if ($x < ($rating->rating + 1)) 
                    <a href='/edit_rating/{{$x}}/{{$mission->missionid}}'><img src='/storage/images/selected-star.png' class="pe-auto h20"></a>
                    @else
                    <a href='/edit_rating/{{$x}}/{{$mission->missionid}}'><img src='/storage/images/star.png' class="pe-auto h22"></a>
                    @endif
                    @endfor
                    @elseif($rateduser==0 && $rate == 1)
                    @for ($x = 1; $x <= 5; $x++) 
                    <a href='/add_rating/{{$x}}/{{$mission->missionid}}'><img src='/storage/images/star.png' class="pe-auto h22"></a>
                    @endfor
                    @else
                    @for ($x = 0; $x < 5; $x++)
                    @if ($x < $mission->rating) 
                    <img src="/storage/images/selected-star.png" alt="" class="ps-1">
                    @else
                    <img src='/storage/images/star.png' alt='' class='ps-1'>
                    @endif
                    @endfor
                    @endif
                </div>
                <hr class="flex-grow-1 div">
            </div>
            <div class="row mt-3 mb-3 ms-1 me-1">
                <div class="col col-example3 pe-2 ps-2">
                    <img src="/storage/images/pin1.png" class="h18">
                    <h6 class="mt-3 mb-1 text-secondary fs10">City</h6>
                    <h4 class="mb-0 fs111">{{$mission->name}}</h4>
                </div>
                <div class="col col-example3 pe-2 ps-2">
                    <img src="/storage/images/web.png" class="h18">
                    <h6 class="mt-3 mb-1 text-secondary fs10">Theme</h6>
                    <h4 class="mb-0 fs111">{{$mission->title}}</h4>
                </div>
                <div class="col col-example3 pe-2 ps-2">
                    <img src="/storage/images/calender.png" class="h17">
                    <h6 class="mt-3 mb-1 text-secondary fs10">Date</h6>
                    <h4 class="mb-0 fs111">
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
                    <img src="/storage/images/organization.png" class="h15">
                    <h6 class="mt-3 mb-1 text-secondary fs10">Organization</h6>
                    <h4 class="mb-0 fs111">{{$mission->organization_name}}</h4>
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
                <a href="/apply/{{ $mission->missionid }}" class="inh">
                    <div class="col-example" class="fw400">Apply Now
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
                    @if($documents->isEmpty())
                    @else
                    <h4 class="mt-4 mb-2 fs118">Documents</h4>
                    <div class="d-flex flex-wrap">
                        @foreach($documents as $document)
                        <button class="col-example5 mt-2 fs131">
                        @if($document->document_type == 'doc' || $document->document_type == 'docx')
                        <img src="/storage/images/doc.png" alt="" class="h18">
                        @endif
                        @if($document->document_type == 'xls' || $document->document_type == 'xlsx')
                        <img src="/storage/images/xlsx.png" alt="" class="h18">
                        @endif
                        @if($document->document_type == 'pdf')
                        <img src="/storage/images/pdf.png" alt="" class="h18">
                        @endif
                        <a href="{{$document->document_path}}" target="_blank" class="inh">{{$document->document_name}}</a>
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
                    <form action="{{ route('add.comment') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{$mission->missionid}}" name="mission_id">
                        <textarea class="mt-3 ps-3 pe-3 textarea" rows="3" name="comment_text" placeholder="Enter your comments..."></textarea>
                        @if ($errors->has('comment_text'))
                        <span class="text-danger">{{ $errors->first('comment_text') }}</span>
                        @endif
                        <br/>
                        <button type="submit" name="add_comment" class="col-example mt-3 fitc">
                        Post Comment
                        </button>
                    </form>
                    @if($comment_count > 0)
                    <div class="pt-1 pb-1 ps-3 pe-3 bgy {{$comment_count > 3 ? 'hof':''}}">
                        @foreach ($comments as $comment) 
                        <div class="row mt-2 mb-2 p-3 ms-0 me-0 bgw">
                            <div class="col-lg-1 col-md-2 col-sm-2 col-12 p-0">
                                <img src="{{$comment->avatar!=null ? '/storage/uplodes/'.$comment->avatar : '/storage/images/user1.png'}}" class="rounded-circle h45">
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-10 col-12 p-0">
                                <p class="mb-1 fs14">{{$comment->first_name.' '.$comment->last_name}}</p>
                                <p class="mb-2 fs10">{{date("l, F d, Y, h:i A", strtotime($comment->comment_date))}}</p>
                                <p class="mb-0 fs12">{{$comment->comment_text}}</p>
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
                                    <td class="border-bottom-0">Rating</td>
                                    <td class="border-bottom-0">
                                        @for ($x = 0; $x < 5; $x++)
                                        @if ($x < $mission->rating) 
                                        <img src="/storage/images/selected-star.png" class="h15">
                                        @else
                                        <img src='/storage/images/star.png' class="h15">
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
                                <img src="{{$vol->avatar!=null ? '/storage/uplodes/'.$vol->avatar : '/storage/images/user1.png'}}" class="rounded-circle h60">
                                <p class="fs11">{{$vol->first_name.' '.$vol->last_name}}</p>
                            </div>
                            @php $count++ @endphp
                            @endforeach
                        </div>
                    </div>
                </div>
                <table class="table table-bordered m-0 text-center">
                    <tbody>
                        <tr class="border-bottom-0 border-start-0">
                            <td class="border-bottom-0 border-start-0"><img src="/storage/images/left.png" class="h12">
                            </td>
                            <td class="border-bottom-0 border-start-0">{{$count}} Recent Volunteers</td>
                            <td class="border-bottom-0 border-end-0"><img src="/storage/images/right-arrow1.png" class="h12">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@if($m_count > 0)
<hr class="div mt-5 mb-5">
<div class="container-lg">
    <div class="row row-eq-height justify-content-center">
        <p class="text-center fs30 fw350">
            Related Missions
        </p>
        @foreach($missions as $mission)
        <div class="col-lg-4 col-md-6 col-sm-6 col-12 mb-5 d-flex align-items-stretch">
            <div class="card box border-0">
                <div class="gfg">
                    <img src="{{$mission->media_path}}" alt="" class="img-fluid w-100">
                    <div class="d-flex align-items-center first-txt"><img src="/storage/images/pin.png" alt="" class="img-fluid pe-1 h12">
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
                    <div class="d-flex align-items-center five-txt text-bg-danger">CLOSED</div>
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
                        <a href="/unlike/{{ $mission->missionid }}"><i class="fa fa-heart text-danger" aria-hidden="true"></i></a>
                        @else
                        <a href="/like/{{ $mission->missionid }}"><i class="fa fa-heart-o text-white" aria-hidden="true"></i></a>
                        @endif     
                    </div>
                    <div class="d-flex align-items-center third-txt p-2"><a href="" class="text-dark" data-bs-toggle="modal" data-bs-target="#popup{{$mission->missionid}}"><img src="/storage/images/user.png" alt="" class="img-fluid h17"></a></div>
                    <div id="popup{{$mission->missionid}}" class="modal">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content p-2">
                                <div class="modal-header pb-0 border-bottom-0">
                                    <p class="mb-0 fs20">Invite</p>
                                    <img class="text-end mt-2 mb-2 pe-auto h13"  src="/storage/images/cancel1.png" data-bs-dismiss="modal">
                                </div>
                                <form action="{{ route('invite.user') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="text" name="mission_id" value="{{$mission->missionid}}" hidden="">
                                    <div class="modal-body pb-0">
                                        <p class="mb-1 mt-3">Email </p>
                                        <input type="email" class="popup" name="email" place-holder="enter user email to invite">
                                    </div>
                                    <div class="modal-footer mt-4 border-top-0">
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
                    <div class="col-md-12 text-dark">
                        <div class="card-body pb-3 remove">
                            <a href="/volunteering_mission/{{ $mission->missionid }}" class="text-dark">
                                <h2 class="card-title mb-2 fs153">{{$mission->mission_title}}</h2>
                            </a>
                            <p class="mb-2 text-secondary fs111">
                                {{$a == 1 ? 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit...' : $mission->short_description }}                  
                            </p>
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h6 class="m-0 fs111">{{$mission->organization_name}}</h6>
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
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6" class="text-dark">
                                <div class="row">
                                    <div class="col-lg-1 col-md-1 col-sm-1 col-1 m-1 mt-0 mb-0"><img src="/storage/images/Seats-left.png" alt="" class="h23"></div>
                                    <div class="col-lg-9 col-md-9 col-sm-9 col-9">
                                        @foreach($applications as $application)
                                        @if($application->missionid == $mission->missionid)
                                        {{$mission->total_seat - $application->count}}
                                        <h6 class="mb-2 text-secondary fs12">Seats Left</h6>
                                        @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            @else
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6" class="text-dark">
                                <div class="row">
                                    <div class="col-lg-1 col-md-1 col-sm-1 col-1 m-1 mt-0 mb-0"><img src="/storage/images/Already-volunteered.png" alt="" class="h20"></div>
                                    <div class="col-lg-9 col-md-9 col-sm-9 col-9">
                                        @foreach($applications as $application)
                                        @if($application->missionid == $mission->missionid)
                                        {{$application->count}}
                                        <h6 class="mb-2 text-secondary fs12">Already volunteered</h6>
                                        @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            @endif
                            @if($mission->deadline != null)
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6" class="text-dark">
                                <div class="row">
                                    <div class="col-lg-1 col-md-1 col-sm-1 col-1 m-1 mt-0 mb-0"><img src="/storage/images/deadline.png" alt="" class="h28"></div>
                                    <div class="col-lg-9 col-md-9 col-sm-9 col-9">
                                            {{date("d-m-Y", strtotime($mission->deadline))}} 
                                        <h6 class="mb-2 text-secondary fs12">Deadline</h6>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @else
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6" class="text-dark">
                                <div class="row">
                                    <div class="col-lg-1 col-md-1 col-sm-1 col-1 m-1 mt-0 mb-0"><img src="/storage/images/achieved.png" alt="" class="h22"></div>
                                    @php
                                    $goal_value = $mission->goal_value;
                                    $goal_achieved = 0;
                                    @endphp
                                    @foreach($times as $time)
                                        @if($mission->missionid == $time->mission_id)
                                            @php
                                                $goal_achieved = $goal_achieved + $time->action;
                                            @endphp
                                        @endif
                                    @endforeach
                                    @php
                                        $goal_count = ($goal_achieved)*(100)/($goal_value);
                                    @endphp
                                    <div class="col-lg-9 col-md-9 col-sm-9 col-9">
                                        <div class="mt-1 mb-3 under">
                                            <div class='uper' style="width:{{$goal_count}}%;">
                                            </div>
                                        </div>
                                        <h6 class="mb-2 text-secondary fs12">{{$goal_achieved}} achieved</h6>
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
                    <a href="/apply/{{ $mission->missionid }}" class="inh"><button class=" col-example mt-3 fs131">Apply<i class="fa fa-arrow-right ps-2"></i></button></a>
                    @else
                    <a href="/volunteering_mission/{{ $mission->missionid }}" class="inh"><button class=" col-example mt-3 fs131">View Detail<i class="fa fa-arrow-right ps-2"></i></button></a>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <br>
</div>
@else
<br/><br/>
@endif
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
</script>
@endsection