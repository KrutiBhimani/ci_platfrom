<div class="row h-100 p-0 m-0">
    <div class="col-md-2 d-md-none col-sm-2 col-2 ps-2 pe-2 position-relative bco">
        <div class="position-sticky top-0 pt-5">
            <div class="nav flex-column nav-pills m-0">
                <a href="/admin/user"
                    class="nav-link text-center  {{ Request::is('admin/user') || Request::is('admin/user/create') || Request::is('admin/user/*/edit') ? 'active' : '' }}">
                    <i class="fa fa-user me-2 p-1" aria-hidden="true"></i>
                </a>
                <a href="/admin/page"
                    class="nav-link text-center {{ Request::is('admin/page') || Request::is('admin/page/create') || Request::is('admin/page/*/edit') ? 'active' : '' }}">
                    <i class="fa fa-file-text me-2 p-1" aria-hidden="true"></i>
                </a>
                <a href="/admin/mission"
                    class="nav-link text-center {{ Request::is('admin/mission') || Request::is('admin/mission/create') || Request::is('admin/mission/*/edit') ? 'active' : '' }}">
                    <i class="fa fa-bullseye me-2 p-1" aria-hidden="true"></i>
                </a>
                <a href="/admin/theme"
                    class="nav-link text-center {{ Request::is('admin/theme') || Request::is('admin/theme/create') || Request::is('admin/theme/*/edit') ? 'active' : '' }}">
                    <i class="fa fa-object-ungroup me-2 p-1" aria-hidden="true"></i>
                </a>
                <a href="/admin/skill"
                    class="nav-link text-center {{ Request::is('admin/skill') || Request::is('admin/skill/create') || Request::is('admin/skill/*/edit') ? 'active' : '' }}">
                    <i class="fa fa-pencil-square-o me-2 p-1" aria-hidden="true"></i>
                </a>
                <a href="/admin/app" class="nav-link text-center {{ Request::is('admin/app') ? 'active' : '' }}">
                    <i class="fa fa-folder me-2 p-1" aria-hidden="true"></i>
                </a>
                <a href="/admin/story"
                    class="nav-link text-center {{ Request::is('admin/story') || Request::is('admin/story/*') ? 'active' : '' }}">
                    <i class="fa fa-book  me-2 p-1" aria-hidden="true"></i>
                </a>
                <a href="/admin/banner"
                    class="nav-link text-center {{ Request::is('admin/banner') || Request::is('admin/banner/create') || Request::is('admin/banner/*/edit') ? 'active' : '' }}">
                    <i class="fa fa-map-signs me-2 p-1" aria-hidden="true"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="d-none col-lg-2 col-md-2 d-md-block m-0 p-0 position-relative bco">
        <div class="position-sticky top-0 pt-4">
            <p class="p-3 mb-0 wc">NEVIGATION</p>
            <div class="nav flex-column nav-pills ms-4 me-4 fs14">
                <a href="/admin/user"
                    class="nav-link text-start {{ Request::is('admin/user') || Request::is('admin/user/create') || Request::is('admin/user/*/edit') ? 'active' : '' }}">
                    <i class="fa fa-user me-2 p-1" aria-hidden="true"></i>
                    User
                </a>
                <a href="/admin/page"
                    class="nav-link text-start {{ Request::is('admin/page') || Request::is('admin/page/create') || Request::is('admin/page/*/edit') ? 'active' : '' }}">
                    <i class="fa fa-file-text me-2 p-1" aria-hidden="true"></i>
                    CMS Page
                </a>
                <a href="/admin/mission"
                    class="nav-link text-start {{ Request::is('admin/mission') || Request::is('admin/mission/create') || Request::is('admin/mission/*/edit') ? 'active' : '' }}">
                    <i class="fa fa-bullseye me-2 p-1" aria-hidden="true"></i>
                    Mission
                </a>
                <a href="/admin/theme"
                    class="nav-link text-start {{ Request::is('admin/theme') || Request::is('admin/theme/create') || Request::is('admin/theme/*/edit') ? 'active' : '' }}">
                    <i class="fa fa-object-ungroup me-2 p-1" aria-hidden="true"></i>
                    Mission Theme
                </a>
                <a href="/admin/skill"
                    class="nav-link text-start {{ Request::is('admin/skill') || Request::is('admin/skill/create') || Request::is('admin/skill/*/edit') ? 'active' : '' }}">
                    <i class="fa fa-pencil-square-o me-2 p-1" aria-hidden="true"></i>
                    Mission Skill
                </a>
                <a href="/admin/app" class="nav-link text-start {{ Request::is('admin/app') ? 'active' : '' }}">
                    <i class="fa fa-folder me-2 p-1" aria-hidden="true"></i>
                    Mission Application
                </a>
                <a href="/admin/story"
                    class="nav-link text-start {{ Request::is('admin/story') || Request::is('admin/story/*') ? 'active' : '' }}">
                    <i class="fa fa-book  me-2 p-1" aria-hidden="true"></i>
                    Story
                </a>
                <a href="/admin/banner"
                    class="nav-link text-start {{ Request::is('admin/banner') || Request::is('admin/banner/create') || Request::is('admin/banner/*/edit') ? 'active' : '' }}">
                    <i class="fa fa-map-signs me-2 p-1" aria-hidden="true"></i>
                    Banner Management
                </a>
            </div>
        </div>
    </div>
    <div class="col-lg-10 col-md-10 col-sm-10 col-10 m-0 p-0 position-relative">
        <div class="position-sticky top-0 zi2">
            <div class="d-flex justify-content-between hd ">
                <div class="p-3">
                    {{ date('l, F d, Y, h:i A') }}
                </div>
                <nav class="navbar navbar-expand bgw">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent1">
                        <ul class="navbar-nav me-auto mb-lg-0">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle me-4" href="#" id="navbarDropdown"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="/storage/images/user1.png" class="rounded-circle m-2 mt-0 mb-0 col"
                                        width="29" height="29">
                                    <label> admin </label>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="/logout">Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
