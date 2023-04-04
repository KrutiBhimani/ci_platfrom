<div class="fixed-top border-sm-block bgw zi1" style="border-bottom:2px solid rgb(225, 225, 225);">
    <div class="container-lg">
        <div class="d-flex justify-content-between position-relative">
            <nav class="navbar navbar-expand-sm ps-0 pe-0 bgw">
                <a href="/home"><img class="d-none d-sm-block" src="/storage/images/logo.png"></a>
                <div class="container-fluid">
                    <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
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
            <nav class="navbar d-sm-none navbar-expand position-absolute top-0 end-0 pb-0 bgw">
                <div class="collapse navbar-collapse" id="navbarSupportedContent1">
                    <ul class="navbar-nav me-auto mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="/storage/uplodes/avatar-9.jpg" class="rounded-circle col h30">
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
            <nav class="navbar d-none d-sm-block navbar-expand bgw">
                <div class="collapse navbar-collapse" id="navbarSupportedContent1">
                    <ul class="navbar-nav me-auto mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="{{ Auth::user()->avatar != null ? '/storage/uplodes/' . Auth::user()->avatar : '/storage/images/user1.png' }}"
                                    class="rounded-circle col p-0" style="height: 30px;width: 30px;">
                                <label>{{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}</label>
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
<div id="contactpopup" class="modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content p-2">
            <div class="modal-header pb-0 border-bottom-0">
                <p class="mb-0 fs20">contact Us</p>
                <img class="text-end mt-2 mb-2 pe-auto h13" src="/storage/images/cancel1.png" data-bs-dismiss="modal">
            </div>
            <form action="{{ route('contact.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body pb-0">
                    <p class="mb-1">Name*</p>
                    <input type="text" class="popup" name=""
                        value="{{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}" disabled>
                    <p class="mb-1 mt-3">Email Address*</p>
                    <input type="email" class="popup" name="" value="{{ Auth::user()->email }}" disabled>
                    <p class="mb-1 mt-3">Subject*</p>
                    <input type="text" class="popup" name="subject" placeholder="Enter your subject"
                        value="{{ old('subject') }}">
                    @if ($errors->has('subject'))
                        <span class="text-danger">{{ $errors->first('subject') }}</span>
                    @endif
                    <p class="mb-1 mt-3">Message*</p>
                    <textarea class="popup1" rows="4" name="message" placeholder="Enter your message">{{ old('message') }}</textarea>
                    @if ($errors->has('message'))
                        <span class="text-danger">{{ $errors->first('message') }}</span>
                    @endif
                </div>
                <div class="modal-footer border-top-0">
                    <button type="button" class="col-example8" data-bs-dismiss="modal">Cancle
                    </button>
                    <button type="submit" name='contact' class="col-example7" data-bs-dismiss="modal">Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    @if ($errors->has('subject') || $errors->has('message'))
        $('#contactpopup').modal('show');
    @endif
</script>
