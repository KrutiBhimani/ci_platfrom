<div class="fixed-top border-sm-block" style="background-color:white ; border-bottom:2px solid rgb(225, 225, 225);z-index:1;">
    <div class="container-lg">
        <div class="d-flex justify-content-between position-relative">
            <nav class="navbar navbar-expand-sm ps-0 pe-0 " style="background-color:white ;">
                <a href="/home"><img class="d-none d-sm-block" src="/storage/images/logo.png"></a>
                <div class="container-fluid">
                    <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"><img src="/storage/images/list.png"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link" href="/stories">Stories</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/policy">Policy</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <nav class="navbar d-sm-none navbar-expand position-absolute top-0 end-0 pb-0" style="background-color:white ;">
                <div class="collapse navbar-collapse" id="navbarSupportedContent1">
                    <ul class="navbar-nav me-auto mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="/storage/uplodes/avatar-9.jpg" class="rounded-circle col" style="height: 30px;width: 60px;">
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="/edit_user">My Profile</a></li>
                                <li><a class="dropdown-item" href="/timesheet">volunteering timesheet</a></li>
                                <li><a class="dropdown-item" href="/logout">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
            <nav class="navbar d-none d-sm-block navbar-expand" style="background-color:white ;">
                <div class="collapse navbar-collapse" id="navbarSupportedContent1">
                    <ul class="navbar-nav me-auto mb-lg-0">
                        <li class="nav-item me-3 hello">
                            <div class="dropdown-menu position-absolute top-100 right-0" aria-labelledby="navbarDropdown" style="right:0;left:-100px">
                                <div class="d-flex align-items-center" style="display: flex;justify-content:space-between;color:gray;">
                                    <a href="#" style="color: black;" data-bs-toggle="modal" data-bs-target="#popupfdsds"><i class="fa fa-cog pl-2 pr-0 pb-2 pt-1" aria-hidden="true" style="font-size:25px;color:gray"></i></a>
                                    Notification
                                    <a href="home?source=clear&amp;user=29&amp;server=home" style="font-size:13px;color:gray;padding:0px 5px">Clear all</a>
                                </div>
                                <div class="w-100 text-center" style="border-top:1px solid #dddddd;border-bottom:1px solid #dddddd;background-color:#e8e8e8;color:gray;">Older</div>
                                <hr class="div">
                                <div class="p-2 pr-3 row align-items-center">
                                    <img class="col-lg-2 col-md-2 col-sm-2 col-2 rounded-circle" src="/storage/images/add.png" height="27px" width="22px">
                                    <span class="col-lg-9 col-md-9 col-sm-9 col-9 m-0 p-0">your application decline</span>
                                    <a class="col-lg-1 col-md-1 col-sm-1 col-1 rounded-circle text-end me-2" href="home?source=read&amp;note=89&amp;user=29&amp;server=home" style="background-color:#f88634;padding-right:0;height:15px;flex:0 0 0;"></a>
                                </div>
                                <hr class="div">
                                <div class="p-2 pr-3 row align-items-center">
                                    <img class="col-lg-2 col-md-2 col-sm-2 col-2 rounded-circle" src="/storage/images/add.png" height="27px" width="22px">
                                    <span class="col-lg-9 col-md-9 col-sm-9 col-9 m-0 p-0">your story approved</span>
                                    <div class="col-lg-1 col-md-1 col-sm-1 col-1 rounded-circle text-end me-2" style="background-color:gray;padding-right:0;height:15px;flex:0 0 0;"></div>
                                </div>
                                <hr class="div">
                                <div class="p-2 pr-3 row align-items-center">
                                    <img class="col-lg-2 col-md-2 col-sm-2 col-2 rounded-circle" src="/storage/images/add.png" height="27px" width="22px">
                                    <span class="col-lg-9 col-md-9 col-sm-9 col-9 m-0 p-0">new mission added</span>
                                    <a class="col-lg-1 col-md-1 col-sm-1 col-1 rounded-circle text-end me-2" href="home?source=read&amp;note=87&amp;user=29&amp;server=home" style="background-color:#f88634;padding-right:0;height:15px;flex:0 0 0;"></a>
                                </div>
                                <hr class="div">
                                <div class="p-2 pr-3 row align-items-center">
                                    <img class="col-lg-2 col-md-2 col-sm-2 col-2 rounded-circle" src="/storage/images/add.png" height="27px" width="22px">
                                    <span class="col-lg-9 col-md-9 col-sm-9 col-9 m-0 p-0">new story added</span>
                                    <a class="col-lg-1 col-md-1 col-sm-1 col-1 rounded-circle text-end me-2" href="home?source=read&amp;note=86&amp;user=29&amp;server=home" style="background-color:#f88634;padding-right:0;height:15px;flex:0 0 0;"></a>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{Auth::user()->avatar!=null ? '/storage/uplodes/'.Auth::user()->avatar : '/storage/images/user1.png'}}" class="rounded-circle col p-0" style="height: 30px;width: 30px;">
                            <label>{{Auth::user()->first_name.' '.Auth::user()->last_name}}</label>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="/edit_user">My Profile</a></li>
                                <li><a class="dropdown-item" href="/timesheet">volunteering timesheet</a></li>
                                <li><a class="dropdown-item" href="/logout">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</div>
<br><br>