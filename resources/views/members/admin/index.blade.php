@extends('layouts.members')

@section('content')

    <div class="row">
        <div class="col-xs-24">
            <h3>Hello, Welcome {{ Auth::user()->nama }}</h3>
    </div>
    <div class="row">
        <div class="col-xs-6">
            @include('display.selfProfile')
        </div>
    </div>



    </div>  {{--end of row--}}




    <script src="js/angular/controllers/script.js"></script>
@stop