@extends('layouts.members')

@section('content')

    <div class="row">
        <div class="col-xs-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4>Carian Laporan Harian</h4>
                </div>
                <div class="panel-body">
                    {!! Form::open(['route' => 'members.admin.laporan.harian.carian', 'method' => 'POST']) !!}

                    @if($tarikh)
                        <div class="form-group">
                            {!! Form::date('tarikh', $tarikh) !!}
                        </div>
                    @else
                        <div class="form-group">
                            {!! Form::date('tarikh', \Carbon\Carbon::today()) !!}
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

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4>Hasil Carian - <small>{{ $tarikh->format('d-m-Y') }}</small></h4>
                </div>

                <div class="panel-body">
                    @include('laporan._assigned')

                    <table class="table">
                        <tr>
                            <td align="right"><button class="btn btn-default" onclick="document.print()"><i class="glyphicon glyphicon-print"></i> Cetak </button></table></td>
                        </tr>
                </div>

            </div>

        </div>
    </div>

@stop