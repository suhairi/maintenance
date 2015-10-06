
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" href="images/favicon.ico">

<title>e-Maintenance - {{ Auth::user()->level->nama }}</title>

<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/navbar-static-top.css') }}" rel="stylesheet">

<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src= "{{ asset('js/angular.min.js') }}"></script>

<script src="{{ asset('js/ie-emulation-modes-warning.js') }}"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
<script src="{{ asset('js/html5shiv.min.js') }}"></script>
<script src="{{ asset('js/respond.min.js') }}"></script>
<![endif]-->
</head>

<body ng-app="myApp" ng-controller="controller">

@include('layouts.nav_top')

<div class="container">
@yield('content')
</div>


<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/ie10-viewport-bug-workaround.js') }}"></script>
</body>
</html>
