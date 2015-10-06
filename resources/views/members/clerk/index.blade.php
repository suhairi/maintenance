@extends('layouts.members')

@section('content')

    <!-- Main component for a primary marketing message or call to action -->
    <div class="jumbotron">
        <h1>Sistem Maintenance</h1>
        <p>Sistem e-Maintenance berwajah baru!!</p>
        <p>
            <a class="btn btn-lg btn-primary" href="#" role="button">{{ Auth::user()->level->nama }} &raquo;</a>
        </p>
    </div>
    <div class="row">
        <div class="col-xs-6">
            @include('display.selfProfile')
        </div>
    </div>


@stop