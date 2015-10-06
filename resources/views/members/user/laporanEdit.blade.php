@extends('layouts.members')

@section('content')

    <div class="row">
        <div class="col-xs-4">

            @include('errors.form_error')

            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3>Kemaskini Aduan</h3>
                </div>
                <div class="panel-body">
                    {!! Form::model($aduan, ['route' => ['members.user.laporan.update', $aduan->id], 'method' => 'PATCH']) !!}
                    @include('forms._laporan', ['submitButton' => 'Kemaskini Aduan'])
                    {!! Form::close() !!}
                </div>
            </div>

        </div>
    </div>

@stop