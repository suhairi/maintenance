<html lang="en" ng-app="myApp">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="images/favicon.ico">

    <title>e-Maintenance - {{ Auth::user()->level->nama }}</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('css/navbar-static-top.css') }}" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><![endif]-->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/angular.min.js') }}"></script>
    <script src="{{ asset('js/ie-emulation-modes-warning.js') }}"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="{{ asset('js/html5shiv.min.js') }}"></script>
    <script src="{{ asset('js/respond.min.js') }}"></script>
    <![endif]-->
</head>

<body ng-controller="myCtrl">

@include('layouts.nav_top')

<div class="container">
    @include('notify.notifications')
    @yield('content')
</div>

<!-- Bootstrap core JavaScript
================================================== -->

{{--<script src="{{ asset('js/bootstrap.min.js') }}"></script>--}}
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/ie10-viewport-bug-workaround.js') }}"></script>

</body>
</html>
