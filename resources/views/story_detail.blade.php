@extends('layouts.home_header2')
@section('content')
<div class="container-lg">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="h-100">
                <img id="mainImage" class="ps-1 pe-1 ofit" src="/storage/uplodes/Grow-Trees-On-the-path-to-environment-sustainability.png" height="80%" width="100%">
                <div class="row pe-3 ps-3 pt-1">
                    <div class="top-content p-0" id="style-sheet-modern">
                        <div class="container-fluid p-0 m-0">
                            <div id="carousel-example" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner row w-100 mx-auto" role="listbox">
                                    <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3 p-1">
                                        <img src="/storage/uplodes/doctor-laptop.jpg" class="img-fluid mx-auto d-block ofit h100 w-100" alt="img1">
                                    </div>
                                    <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3 p-1 active">
                                        <img src="/storage/uplodes/image.png" class="img-fluid mx-auto d-block ofit h100 w-100" alt="img1">
                                    </div>
                                    <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3 p-1">
                                        <img src="/storage/uplodes/wolgawron-169hero-service-istock.jpg" class="img-fluid mx-auto d-block ofit h100 w-100" alt="img1">
                                    </div>
                                    <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3 p-1">
                                        <img src="/storage/uplodes/img.png" class="img-fluid mx-auto d-block ofit h100 w-100" alt="img1">
                                    </div>
                                    <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3 p-1">
                                        <img src="/storage/uplodes/img1.png" class="img-fluid mx-auto d-block ofit h100 w-100" alt="img1">
                                    </div>
                                    <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3 p-1">
                                        <img src="/storage/uplodes/Grow-Trees-On-the-path-to-environment-sustainability.png" class="img-fluid mx-auto d-block ofit h100 w-100" alt="img1">
                                    </div>
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
        <div class="col-lg-6 col-md-6 col-sm-12 col-12 mt-5 pt-5">
            <div class="d-flex justify-content-between">
                <div>
                    <img src="/storage/images/user1.png" class="rounded-circle" height="82px" width="78">
                    <p class="mb-0 fs13">kruti patel</p>
                </div>
                <div class="d-flex align-items-end">
                    <div class="bdg2"><img src="/storage/images/eye.png" class="me-2">12000 view</div>
                </div>
            </div>
            <p class="mt-4 fs112">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<br><br>Ut enim ad minim veniam. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore.<br><br>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore.</p>
            <div class="row mt-3 mb-3">
                <div class="col-lg-7 col-md-12 col-sm-12 col-12 mt-2">
                    <div class="col-example2 text-center fs132">
                        <a href="#" class="inh tinh" data-bs-toggle="modal" data-bs-target="#popup17">
                        <img src="/storage/images/add1.png" alt="" class="mb-1 h15">
                        Recommend to a Co-Worker
                        </a>
                    </div>
                    <div id="popup17" class="modal">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content p-2">
                                <div class="modal-header pb-0 border-bottom-0">
                                    <p class="mb-0 fs20">Invite</p>
                                    <img class="text-end mt-2 mb-2 pe-auto h13" src="/storage/images/cancel1.png" data-bs-dismiss="modal">
                                </div>
                                <form class="m-0" method="post" enctype="multipart/form-data">
                                    <input type="text" name="s_id" value="17" hidden="">
                                    <div class="modal-body pb-0">
                                        <p class="mb-1 mt-3">Email </p>
                                        <input type="email" class="popup" name="email" place-holder="enter user email to invite">
                                    </div>
                                    <div class="modal-footer mt-4 border-top-0">
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
                <div class="col-lg-5 col-md-12 col-sm-12 col-12 mt-2">
                    <div class="col-example text-center fs132">
                        <a href="Volunteering_Mission?id=OTFTRUNSRVRfU1RVRkY=" class="inh tinh">
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
                    <a class="nav-link active1 gray ps-0" data-toggle="tab" href="#mission">10 Users and Customer Engagement Strategies for 2019</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane show active" id="mission">
                    <p class="mt-4 mb-3 fs1015">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.<br><br>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br><br>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br><br>We use these technologies for a number of purposes, such as:
                    </p>
                    <div class="col-lg-7 col-md-8 col-sm-10 col-12 ms-0 ps-0">
                        <ul class="fs1015 mb-3">
                            <li>
                                <p class="fs1015 mb-2">But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain.</p>
                            </li>
                            <li>
                                <p class="fs1015 mb-2">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi.</p>
                            </li>
                            <li>
                                <p class="fs1015 mb-2">On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized</p>
                            </li>
                            <li>
                                <p class="fs1015 mb-2">But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain.</p>
                            </li>
                            <li>
                                <p class="fs1015 mb-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore</p>
                            </li>
                        </ul>
                    </div>
                    <p class="fs1015 mb-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection