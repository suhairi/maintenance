@extends('layouts.members')

@section('content')

    <div class="row">
        <div class="col-xs-4">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h4>Carian Laporan Harian</h4>
                </div>
                <div class="panel-body">
                    {!! Form::open(['route' => 'members.technician.laporan.harian.carian', 'method' => 'POST']) !!}

                    @if($tarikh)
                        <div class="form-group">
                            {!! Form::date('tarikh', $tarikh) !!}
                        </div>
                    @else
                        <div class="form-group">
                            {!! Form::date('tarikh', \Carbon\Carbon::tomorrow()) !!}
                        </div>
                    @endif

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
                    <h4>Hasil Carian - <small>{{ $tarikh->format('d-m-Y') }}</small></h4>
                </div>

                <div class="panel-body">
                    @include('laporan._assigned')
                </div>

            </div>

        </div>
    </div>

@stop