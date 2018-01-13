<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{URL::TO('/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{URL::TO('/css/font-awesome.css')}}">
    <link rel="stylesheet" href="{{URL::TO('/css/master.css')}}">
</head>
<body>
    @include('partials.nav')
    <br>
    @yield('content')
    <br>
    @include('partials.footer')

    {{--Script--}}
    <script src="{{URL::TO('/js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{URL::TO('/js/bootstrap.js')}}"></script>
    @yield('script')
</body>
</html>