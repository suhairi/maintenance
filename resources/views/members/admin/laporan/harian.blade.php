@extends('layouts.members')

@section('content')

    <div class="row">
        <div class="col-xs-4">
            @include('display.carianHarian')
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            @include('display.harian')
        </div>
    </div>

@stop