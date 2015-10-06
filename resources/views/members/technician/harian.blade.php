@extends('layouts.members')

@section('content')

    <div class="row">
        <div class="col-xs-4">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h4>Carian</h4>
                </div>
                <div class="panel-body">
                    {!! Form::open(['route' => 'members.technician.laporan.harian.carian', 'method' => 'POST']) !!}

                    <div class="form-group">
                        {!! Form::date('tarikh', \Carbon\Carbon::tomorrow()) !!}
                    </div>


                    <div class="form-group" align="right">
                        {!! Form::submit('Cari', ['class' => 'btn btn-primary']) !!}
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">

            <div class="panel panel-info">
                <div class="panel-heading">
                    <h4>Senarai Laporan Baru</h4>
                </div>

                <div class="panel-body">
                    @include('laporan._assigned')
                </div>

            </div>

        </div>
    </div>

@stop