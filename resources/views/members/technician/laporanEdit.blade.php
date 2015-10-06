@extends('layouts.members')

@section('content')

    <div class="row">
        <div class="col-xs-4">

            @include('errors.form_error')
            @include('layouts.notifications')

            <div class="panel panel-info">

                <div class="panel-heading">
                    <h3>Kemaskini Status Laporan - <small>({{ $laporan->user }})</small></h3>
                </div>

                <div class="panel-body">

                    {!! Form::model($laporan, ['route' => ['members.technician.update', $laporan->id], 'method' => 'POST']) !!}
                    <div class="form-group">
                        {{--{!! Form::label('pelapor', 'Tarikh ') !!}--}}
                        {!! Form::text('tarikh', null, ['class' => 'form-control', 'readonly' => 'true']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('pelapor', 'Pelapor ') !!}
                        {!! Form::text('pelapor', null, ['class' => 'form-control', 'readonly' => 'true']) !!}
                    </div>

                    <div class="form-group">
                        {{--{!! Form::label('cawangan', 'Cawangan ') !!}--}}
                        {!! Form::select('cawangan_id', [$laporan->cawangan_id => $laporan->cawangan->nama], null, ['class' => 'form-control', 'readonly' => 'true']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('peralatan', 'Kerosakan ') !!}
                        {!! Form::select('peralatan_id', [$laporan->peralatan_id => $laporan->peralatan->nama], null, ['class' => 'form-control', 'readonly' => 'true']) !!}
                    </div>

                    <div class="form-group">
                        {{--{!! Form::label('noSiri', 'No Siri ') !!}--}}
                        {!! Form::text('noSiri', null, ['class' => 'form-control', 'readonly' => 'true']) !!}
                    </div>

                    <div class="form-group">
                        {{--{!! Form::label('ringkasan', 'Ringkasan Kerosakan') !!}--}}
                        {!! Form::textarea('ringkasanKerosakan', null, ['class' => 'form-control', 'rows' => 4, 'readonly' => 'true']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('noJobsheet', 'No Jobsheet ') !!}
                        {!! Form::text('noJobsheet', null, ['class' => 'form-control', 'required' => 'true']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('status', 'Status Pelaksanaan') !!}
                        {!! Form::select('status', ['1' => 'Closing', '2' => 'Dalam Pelaksanaan', '3' => 'KIV', '4' => 'Selesai'], null, ['class' => 'form-control', 'required' => 'true', 'placeholder' => 'Status Pelaksanaan']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('catatan', 'Catatan Pelaksanaan') !!}
                        {!! Form::textarea('catatan', null, ['class' => 'form-control', 'rows' => 3, 'required' => 'true']) !!}
                    </div>

                    <div class="form-group" align="right">
                        {!! Form::submit('Kemaskini Laporan', ['class' => 'btn btn-primary']) !!}
                    </div>
                    {!! Form::close() !!}

                </div>

            </div>


        </div>
    </div>

@stop