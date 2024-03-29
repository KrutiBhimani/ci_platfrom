<?php
header('Expires: Thu, 19 Nov 1981 08:52:00 GMT'); //Date in the past
header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0'); //HTTP/1.1
header('Pragma: no-cache');
?>
<html>

<head>
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1 shrink-to-fit=no">
    <!-- for stick to top -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
    <link href="/../css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- for 4 image corosual -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
        integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="/../css/carousel.css">
    <script src="/../js/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
        integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous">
    </script>
    <!-- for continue loop -->
    <script src="/../js/jquery.backstretch.min.js"></script>
    <script src="/../js/wow.min.js"></script>
    <script src="/../js/scripts.js"></script>

    <link href="/../css/style1.css" rel="stylesheet">
    <!-- for popup -->
    <script src="/../js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" type="text/css" href="/../css/toastr.min.css">
    <script src="/../js/toastr.min.js"></script>
</head>

<body class="position-relative">
    @if (Auth::user())
        @include('partials.header')
    @endif
    @yield('content')
    @if (Auth::user())
        @include('partials.footer')
    @endif
</body>

</html>
