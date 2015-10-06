@extends('layouts.members')

@section('content')

    <div class="row">
        <div class="col-xs-4">
            <h3>Maklumbalas Aduan</h3>
            <hr />

            {!! Form::open() !!}

            <div class="form-group">
                {!! Form::label('nama', 'Nama Pengadu : ') !!}
                {!! Form::text('nama', Auth::user()->getNama($message->username), ['class' => 'form-control', 'readonly' => 'true']) !!}
                {{--{!! Form::hidden('id', $message->id) !!}--}}
            </div>

            <div class="form-group">
                {!! Form::label('message', 'Butiran Aduan : ') !!}
                {!! Form::textarea('complaint', $message->complaint, ['class' => 'form-control', 'rows' => '5', 'readonly' => 'true']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('reply', 'Maklumbalas : ') !!}
                {!! Form::textarea('reply', $message->reply, ['class' => 'form-control', 'rows' => '5']) !!}
            </div>

            <div class="form-group" align="right">
                {!! Form::submit('Hantar Maklumbalas Aduan', ['class' => 'btn btn-primary']) !!}
            </div>

            {!! Form::close() !!}

        </div>
    </div>

@stop