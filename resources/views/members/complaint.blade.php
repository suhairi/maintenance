@extends('layouts.members')

@section('content')

    <div class="row">
        <div class="col-xs-8">

            @include('errors.form_error')
            @include('layouts.notifications')

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3>Inbox</h3>
                </div>
                <div class="panel-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <th>Bil</th>
                            @if(Auth::user()->level_id == 1)
                                <th>Pengguna</th>
                            @endif
                            <th>Butiran Aduan</th>
                            <th>Maklumbalas</th>
                            @if(Auth::user()->level_id == 1)
                                <th>Pilihan</th>
                            @endif
                        </thead>

                        @foreach($messages as $message)
                            <tbody>
                                <td>{{ $bil++ }}</td>
                                @if(Auth::user()->level_id == 1)
                                    <td>{{ Auth::user()->getNama($message->username)  }}</td>
                                @endif
                                <td>{{ $message->complaint }}</td>
                                <td>{{ $message->reply }}</td>
                                @if(Auth::user()->level_id == 1)
                                    <td><a href="{{ route('complaint.edit', ['id' => $message->id]) }}"> <button class="btn btn-primary">Kemaskini</button> </a></td>
                                @endif
                            </tbody>
                        @endforeach
                    </table>
                </div>
            </div>

        </div>

        <div class="col-xs-4">
            &nbsp;
        </div>

        @if(Auth::user()->level_id > 1)
            <div class="col-xs-4">

                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3>Aduan Sistem e-Maintenance</h3>
                    </div>
                    <div class="panel-body">
                        {!! Form::open() !!}
                        <div class="form-group">
                            {!! Form::label('nama', 'Nama Pengadu : ') !!}
                            {!! Form::text('username', Auth::user()->nama, ['class' => 'form-control', 'readonly' => 'true']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('message', 'Butiran Aduan : ') !!}
                            {!! Form::textarea('complaint', null, ['class' => 'form-control', 'rows' => '5']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::submit('Hantar Aduan', ['class' => 'btn btn-primary']) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>

            </div>
        @endif
    </div>
@stop