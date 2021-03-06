<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modulo Admin</title>
    <link rel="stylesheet" href="{{asset("css/app.css")}}">
    <script src="{{ asset("js/app.js")}}"></script>
</head>
<body>

    <!-- navbar -->
    @include('dashboard.partials.nav-header-main')
    <!-- ./navbar -->

    <div class="container">
    
    @yield('content')
                                                                                                                             
</div><!-- ./container -->
</body>
</html>