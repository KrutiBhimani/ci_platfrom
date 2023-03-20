<form id="selectSort3" method="post" enctype="multipart/form-data" class="mb-0 border-sm-block mt13">
    <div>
        <div class="container-lg p-0">
            <div class="container-lg d-sm-none mt-2">
                <table class="table m-0">
                    <thead>
                        <tr class="bs">
                            <td class="p-2">
                                <input type="text" value="" id="clickedButton" name="search" placeholder="Search mission..." class="form-control shadow-none m-2 border-0 fs18" onchange="showHide2()">
                            </td>
                            <td>
                                <nav class="navbar navbar-expand-sm bgw">
                                    <div class="container-fluid justify-content-end">
                                        <button class="navbar-toggler p-0 border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent2" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                        <img src="/storage/images/filter.png" class="input-group-text m-0 p-0 bgw border-0" id="basic-addon1" height="30px">
                                        </button>
                                    </div>
                                </nav>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <nav class="navbar navbar-expand-sm bgw">
                                    <div class="container-fluid">
                                        <div class="collapse navbar-collapse w-100" id="navbarSupportedContent2">
                                            <ul class="navbar-nav me-auto mb-2 mb-lg-0 fs-6">
                                                <li class="nav-item dropdown">
                                                    <select class="Rounded-Rectangle-9 w-100" name="country" onchange="showHide2()">
                                                        <option value="none" hidden="">Country</option>
                                                        @foreach($countries as $country)
                                                        <option value="{{$country->name}}"  @if (request()->country) 
                                                        @if ($country->name == request()->country) 
                                                        {{'selected'}}
                                                        @endif
                                                        @endif >{{$country->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </li>
                                                <li class="nav-item dropdown m25">
                                                    <a class="w-100 nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <label class="w-100">City</label>
                                                    </a>
                                                    <ul class="dropdown-menu p-0" aria-labelledby="navbarDropdown">
                                                        @foreach($cities as $city)
                                                        <input type="checkbox" name="city[]" value="{{$city->name}}" onchange="showHide2()" @if (request()->city)
                                                        @foreach (request()->city as $item) 
                                                        @if ($city->name == $item) 
                                                        {{'checked'}}
                                                        @endif
                                                        @endforeach
                                                        @endif> {{$city->name}}<br>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                                <li class="nav-item dropdown m25">
                                                    <a class="w-100 nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <label class="w-100">Theme</label>
                                                    </a>
                                                    <ul class="dropdown-menu p-0" aria-labelledby="navbarDropdown">
                                                        @foreach($themes as $theme)
                                                        <input type="checkbox" name="theme[]" value="{{$theme->title}}" onchange="showHide2()" @if (request()->theme)
                                                        @foreach (request()->theme as $item) 
                                                        @if ($theme->title == $item) 
                                                        {{'checked'}}
                                                        @endif
                                                        @endforeach
                                                        @endif> {{$theme->title}}<br>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                                <li class="nav-item dropdown m25">
                                                    <a class="w-100 nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <label class="w-100">Skill</label>
                                                    </a>
                                                    <ul class="dropdown-menu p-0" aria-labelledby="navbarDropdown">
                                                        @foreach($skills as $skill)
                                                        <input type="checkbox" name="skill[]" value="{{$skill->skill_name}}" onchange="showHide()" @if (request()->skill)
                                                        @foreach (request()->skill as $item) 
                                                        @if ($skill->skill_name == $item) 
                                                        {{'checked'}}
                                                        @endif
                                                        @endforeach
                                                        @endif> {{$skill->skill_name}}<br>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </nav>
                            </td>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</form>
<form class="m-0" id="selectSort1" action="{{ route('home.index') }}" method="PUT" enctype="multipart/form-data">
    @csrf
    <div class="border-sm-block" style="border-bottom:2px solid rgb(225, 225, 225)">
        <div class="container-lg">
            <div class="d-none d-sm-block">
                <table class="table mb-0">
                    <thead>
                        <tr>
                            <td class="border-end wd2">
                                <div class="input-group d-flex align-items-center">
                                    <div class="input-group-prepend p50">
                                        <img src="/storage/images/search.png" alt="" class="input-group-text p-0 m-0 border-0 bgw" id="basic-addon1">
                                    </div>
                                    <input type="text" value="" id="clickedButton" name="search" value="{{ request()->search }}" placeholder="Search mission..." class="form-control shadow-none m-2 fs18 border-0" onchange="showHide()">
                                </div>
                            </td>
                            <td class="border-end wd8">
                                <nav class="navbar navbar-expand ps-0 pe-0 bgw">
                                    <ul class="w-100 navbar-nav me-auto mb-2 mb-lg-0">
                                        <li class="w-100 nav-item dropdown fs-6">
                                            <select class="Rounded-Rectangle-9 w-100" name="country" onchange="showHide()">
                                                <option value="none" hidden="">Country</option>
                                                @foreach($countries as $country)
                                                <option value="{{$country->name}}"  @if (request()->country) 
                                                @if ($country->name == request()->country) 
                                                {{'selected'}}
                                                @endif
                                                @endif >{{$country->name}}</option>
                                                @endforeach
                                            </select>
                                        </li>
                                    </ul>
                                </nav>
                            </td>
                            <td class="border-end pe-4 wd8">
                                <nav class="navbar navbar-expand ps-0 pe-0 bgw">
                                    <ul class="w-100 navbar-nav me-auto mb-2 mb-lg-0">
                                        <li class="w-100 nav-item dropdown fs-6">
                                            <a class="w-100 nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <label class="w-100">City</label>
                                            </a>
                                            <ul class="dropdown-menu p-0" aria-labelledby="navbarDropdown">
                                                @foreach($cities as $city)
                                                <input type="checkbox" name="city[]" value="{{$city->name}}" onchange="showHide()" @if (request()->city)
                                                @foreach (request()->city as $item) 
                                                @if ($city->name == $item) 
                                                {{'checked'}}
                                                @endif
                                                @endforeach
                                                @endif> {{$city->name}}<br>
                                                @endforeach
                                            </ul>
                                        </li>
                                    </ul>
                                </nav>
                            </td>
                            <td class="border-end pe-4 wd8">
                                <nav class="navbar navbar-expand ps-0 pe-0 bgw">
                                    <ul class="w-100 navbar-nav me-auto mb-2 mb-lg-0">
                                        <li class="w-100 nav-item dropdown fs-6">
                                            <a class="w-100 nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <label class="w-100">Theme</label>
                                            </a>
                                            <ul class="dropdown-menu p-0" aria-labelledby="navbarDropdown">
                                                @foreach($themes as $theme)
                                                <input type="checkbox" name="theme[]" value="{{$theme->title}}" onchange="showHide()" @if (request()->theme)
                                                @foreach (request()->theme as $item) 
                                                @if ($theme->title == $item) 
                                                {{'checked'}}
                                                @endif
                                                @endforeach
                                                @endif> {{$theme->title}}<br>
                                                @endforeach
                                            </ul>
                                        </li>
                                    </ul>
                                </nav>
                            </td>
                            <td class="border-end pe-4 wd8">
                                <nav class="navbar navbar-expand ps-0 pe-0 bgw">
                                    <ul class="w-100 navbar-nav me-auto mb-2 mb-lg-0">
                                        <li class="w-100 nav-item dropdown fs-6">
                                            <a class="w-100 nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <label class="w-100">Skill</label>
                                            </a>
                                            <ul class="dropdown-menu p-0" aria-labelledby="navbarDropdown">
                                                @foreach($skills as $skill)
                                                <input type="checkbox" name="skill[]" value="{{$skill->skill_name}}" onchange="showHide()" @if (request()->skill)
                                                @foreach (request()->skill as $item) 
                                                @if ($skill->skill_name == $item) 
                                                {{'checked'}}
                                                @endif
                                                @endforeach
                                                @endif> {{$skill->skill_name}}<br>
                                                @endforeach
                                            </ul>
                                        </li>
                                    </ul>
                                </nav>
                            </td>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <div class="container-lg d-none d-lg-block mb-4 mt-3">
        <div class="row row-cols-auto ps-4" id="text">
            @if(request()->skill)
            @foreach (request()->skill as $item) 
            <div class="p-1 six-txt pe-2 m-1">
                <span>{{$item}}</span>
                <img src="storage/images/cancel.png" alt="" height="8px" onclick="remove('{{$item}}')" class="pe-auto">
            </div>
            @endforeach
            @endif
            @if(request()->theme)
            @foreach (request()->theme as $item) 
            <div class="p-1 six-txt pe-2 m-1">
                <span>{{$item}}</span>
                <img src="storage/images/cancel.png" alt="" height="8px" onclick="remove('{{$item}}')" class="pe-auto">
            </div>
            @endforeach
            @endif
            @if(request()->city)
            @foreach (request()->city as $item) 
            <div class="p-1 six-txt pe-2 m-1">
                <span>{{$item}}</span>
                <img src="storage/images/cancel.png" alt="" height="8px" onclick="remove('{{$item}}')" class="pe-auto">
            </div>
            @endforeach
            @endif
            @if(request()->country && request()->country!='none')
            <div class="p-1 six-txt pe-2 m-1">
                <span id="removecountry">{{request()->country}}</span>
                <img src="storage/images/cancel.png" alt="" height="8px" onclick="removecountry()" class="pe-auto">
            </div>
            @endif
            @if(request()->skill || request()->theme || request()->city || (request()->country && request()->country!='none'))
            <button class="p-1 ps-2 pe-2 m-1 rbc">
            <a href="/home" class="text-dark fs11">Clear all</a>
            </button>
            @endif
        </div>
    </div>
    <div class="container-lg mt-3">
        <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-5 col-12">
                <h2 class="mb-0 fs143">Explore <b> {{$mission_count}} missions</b></h2>
            </div>
            <div class="col-lg-7 col-mb-7 col-sm-7 col-0 df">
                <div class="d-none d-lg-block">
                    <select class="Rounded-Rectangle-8" name="sort" onchange="showHide()">
                        <option value="none" selected="" disabled="" hidden="">Sort By...</option>
                        <option value="Newest" @if (request()->sort && (request()->sort == 'Newest')) {{'selected'}} @endif>Newest</option>
                        <option value="Oldest" @if (request()->sort && (request()->sort == 'Oldest')) {{'selected'}} @endif>Oldest</option>
                        <option value="Lowest available seats" @if (request()->sort && (request()->sort == 'Lowest available seats')) {{'selected'}} @endif>Lowest available seats</option>
                        <option value="Highest available seats" @if (request()->sort && (request()->sort == 'Highest available seats')) {{'selected'}} @endif>Highest available seats</option>
                        <option value="Sort by my favourite" @if (request()->sort && (request()->sort == 'Sort by my favourite')) {{'selected'}} @endif>Sort by my favourite</option>
                        <option value="sort by deadline" @if (request()->sort && (request()->sort == 'sort by deadline')) {{'selected'}} @endif>sort by deadline</option>
                    </select>
                    <a id="gridlink" class="ms-2" href="#"><i id="h1" class="fa fa-th-large Ellipse-574 p-2 fs-5 text-secondary" aria-hidden="true"></i></a>
                    <a id="listlink" href="#"><i id="h2" class="fa fa-list-ul p-2 fs-5 text-secondary" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
    </div>
</form>
<script>
    $(document).ready(function() {
      $('#selectSort').change(function() {
        var selectedOptions = $('#selectSort option:selected');
        if (selectedOptions.length > 0) {
          var resultString = '';
          selectedOptions.each(function() {
            resultString += $(this).val();
          });
          $('#divResult').html(resultString);
        }
      });
    });
    
    function showHide() {
      let form = document.getElementById("selectSort1");
      form.submit();
    }
    
    function showHide2() {
      let form2 = document.getElementById("selectSort3");
      form2.submit();
    }
    
    function removecountry() {
      $("option:selected").removeAttr("selected");
      let form3 = document.getElementById("selectSort1");
      form3.submit();
    }
    
    function remove(value) {
      $('input[value="' + value + '"]').removeAttr('checked');
      let form3 = document.getElementById("selectSort1");
      form3.submit();
    }
</script>