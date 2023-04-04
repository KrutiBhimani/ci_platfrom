<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1 shrink-to-fit=no">
    <link href="/../css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="../css/style1.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/../css/toastr.min.css">
    <script src="/../js/toastr.min.js"></script>
</head>

<body>
    <div class="container-fluid">
        <div class="row height100per">
            @include('partials.carousel')
            @yield('content')
        </div>
    </div>
</body>

</html>
