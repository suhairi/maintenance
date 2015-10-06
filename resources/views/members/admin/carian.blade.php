@extends('layouts.members')

@section('content')

<div class="row">
    <div class="col-xs-8">

        <div class="panel panel-primary">
            <div class="panel-heading"><h3>Carian</h3></div>

            <div class="panel-body">

                {!! Form::open(['route' => 'members.admin.hasilCarian', 'method' => 'POST']) !!}
                    <div class="form-group">
                        <label for="Cawangan/PPK">Cawangan / PPK</label>
                        {!! Form::select('cawangan_id', $cawangan, null, ['class' => 'form-control', 'placeholder' => 'Cawangan']) !!}
                    </div>
                    <div class="form-group">
                        <label for="tarikh">Bulan / Tahun</label>
                        {!! Form::input('date', 'tarikh', $tarikh, ['class' => 'form-control', 'placeholder' => 'Tarikh']) !!}
                    </div>
                    <div class="form-group">
                        <label for="tarikh">Status Laporan</label>
                        {!! Form::select('status', $laporanstatus, null, ['class' => 'form-control', 'placeholder' => 'Status']) !!}
                    </div>

                    <div class="form-group" align="right">
                        {!! Form::submit('Cari', ['class' => 'btn btn-primary']) !!}
                    </div>
                {!! Form::close() !!}

            </div>
        </div>

    </div>
</div>

@stop