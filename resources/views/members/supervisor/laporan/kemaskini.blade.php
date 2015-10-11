@extends('layouts.members')

@section('content')

    <div class="row">
        <div class="col-xs-6">

            <div class="panel panel-primary">
                <div class="panel-heading"><h4>Kemaskini Laporan</h4></div>
                <div class="panel-body">

                    {!! Form::model($laporan, ['route' => ['members.supervisor.laporan.update2', $laporan->id], 'method' => 'POST']) !!}
                    <div class="form-group">
                        {!! Form::input('date', 'tarikh', $laporan->tarikh->format('Y-m-d'), ['class' => 'form-control', 'placeholder' => 'Tarikh', 'readonly' => 'true']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::text('user', null, ['class' => 'form-control', 'placeholder' => 'Nama', 'readonly' => 'true']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('pelapor', 'Pelapor') !!}
                        {!! Form::text('pelapor', null, ['class' => 'form-control', 'placeholder' => 'Pelapor']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('pemilik', 'Pemilik') !!}
                        {!! Form::text('pemilik', null, ['class' => 'form-control', 'placeholder' => 'Pemilik']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::select('cawangan_id', $cawangan, null, ['class' => 'form-control', 'placeholder' => 'Cawangan']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::select('peralatan_id', $peralatan, null, ['class' => 'form-control', 'placeholder' => 'Peralatan / Kerosakan']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('nosiri', 'No Siri Peralatan') !!}
                        {!! Form::text('noSiri', null, ['class' => 'form-control', 'placeholder' => 'No Siri']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::textarea('ringkasanKerosakan', null, ['class' => 'form-control', 'placeholder' => 'Ringkasan Kerosakan', 'rows' => '4']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('status', 'Status Pelaksanaan') !!}
                        {!! Form::select('status', ['1' => 'Closing', '2' => 'Dalam Pelaksanaan', '3' => 'KIV', '4' => 'Selesai'], null, ['class' => 'form-control', 'required' => 'true', 'placeholder' => 'Status Pelaksanaan']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('nojobsheet', 'No Jobsheet') !!}
                        {!! Form::text('noJobsheet', null, ['class' => 'form-control', 'required' => 'true', 'placeholder' => 'Status Pelaksanaan']) !!}
                    </div>


                    <div class="form-group">
                        {!! Form::label('catatan', 'Catatan Pelaksanaan') !!}
                        {!! Form::textarea('catatan', null, ['class' => 'form-control', 'rows' => 3, 'required' => 'true']) !!}
                    </div>

                    <div class="form-group" align="right">
                        {!! Form::submit('Kemaskini', ['class' => 'btn btn-primary']) !!}
                    </div>


                </div>
            </div>
        </div>
    </div>

@stop