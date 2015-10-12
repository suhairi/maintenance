@extends('layouts.members')


@section('content')

    <div class="container">

        {{--  Row 1  --}}
{{--##################################################--}}

        <div class="row">
            <div class="panel panel-primary">

                <div class="panel panel-heading"><h4>Harian</h4></div>

                <div class="panel-body">

                    <div class="col-xs-4">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h5>Laporan Harian</h5>
                            </div>
                            <div class="panel-body">
                                {!! Form::open(['route' => 'members.supervisor.laporan.harian', 'method' => 'POST']) !!}

                                <label for="harian">Tarikh</label>
                                <div class="form-group">
                                    {!! Form::date('tarikh', \Carbon\Carbon::today(), ['class' => 'form-control']) !!}
                                </div>


                                <div class="form-group" align="right">
                                    {!! Form::submit('Jana Laporan', ['class' => 'btn btn-primary']) !!}
                                </div>

                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>

        {{--  Row 2  --}}
{{--##################################################--}}
        <div class="row">

            <div class="panel panel-primary">

                <div class="panel panel-heading"><h4>Bulanan</h4></div>

                <div class="panel-body">

                    <div class="col-xs-4">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h5>Laporan Bulanan</h5>
                            </div>
                            <div class="panel-body">
                                {!! Form::open(['route' => 'members.supervisor.laporan.bulanan', 'method' => 'POST']) !!}

                                <label for="bulanan">Tarikh</label>
                                <div class="form-group">
                                    {!! Form::selectMonth('month', date('m'), ['class' => 'form-control']) !!}
                                    {!! Form::selectRange('year', 2010, date('Y'), date('Y'), ['class' => 'form-control']) !!}
                                </div>


                                <div class="form-group" align="right">
                                    {!! Form::submit('Jana Laporan', ['class' => 'btn btn-primary']) !!}
                                </div>

                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-4">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h5>Laporan Bulanan</h5>
                            </div>
                            <div class="panel-body">
                                {!! Form::open(['route' => 'members.supervisor.laporan.bulananPenempatan', 'method' => 'POST']) !!}

                                <label for="bulanan">Tarikh</label>
                                <div class="form-group">
                                    {!! Form::selectMonth('month', date('m'), ['class' => 'form-control']) !!}
                                    {!! Form::selectRange('year', 2010, date('Y'), date('Y'), ['class' => 'form-control']) !!}
                                </div>
                                <label for="penempatan">Penempatan</label>
                                <div class="form-group">
                                    {!! Form::select('penempatan', $cawangans, null, ['class' => 'form-control', 'placeholder' => 'Penempatan', 'required' => 'true']) !!}
                                </div>


                                <div class="form-group" align="right">
                                    {!! Form::submit('Jana Laporan', ['class' => 'btn btn-primary']) !!}
                                </div>

                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-4">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h5>Laporan Julat Bulanan mengikut PPK</h5>
                                </div>
                                <div class="panel-body">
                                    {!! Form::open(['route' => 'members.supervisor.laporan.bulananPenempatan', 'method' => 'POST']) !!}

                                    <label for="bulanan">Dari</label>
                                    <div class="form-group">
                                        {!! Form::selectMonth('monthFrom', date('m') - 1, ['class' => 'form-control']) !!}
                                        {!! Form::selectRange('yearFrom', 2010, date('Y'), date('Y'), ['class' => 'form-control']) !!}
                                    </div>
                                    <label for="penempatan">Sehingga</label>
                                    <div class="form-group">
                                        {!! Form::selectMonth('monthTo', date('m'), ['class' => 'form-control']) !!}
                                        {!! Form::selectRange('yearTo', 2010, date('Y'), date('Y'), ['class' => 'form-control']) !!}
                                    </div>
                                    <div class="form-group" align="right">
                                        {!! Form::submit('Jana Laporan', ['class' => 'btn btn-primary']) !!}
                                    </div>

                                    {!! Form::close() !!}
                                </div>
                            </div>
                </div>

                </div>
            </div>


        </div>

        {{--  Row 3  --}}
{{--##################################################--}}
        <div class="row">

            <div class="panel panel-primary">

                <div class="panel panel-heading"><h4>Tahunan</h4></div>

                <div class="panel-body">

                    <div class="col-xs-4">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h5>Laporan Julat Tahunan dan PPK</h5>
                            </div>
                            <div class="panel-body">
                                {!! Form::open(['route' => 'members.supervisor.laporan.tahunanPpk', 'method' => 'POST']) !!}

                                <label for="bulanan">Tarikh</label>
                                <div class="form-group">
                                    {!! Form::selectRange('year', 2010, date('Y'), date('Y'), ['class' => 'form-control']) !!}
                                </div>
                                <div class="form-group" align="right">
                                    {!! Form::submit('Jana Laporan', ['class' => 'btn btn-primary']) !!}
                                </div>

                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-4">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h5>Laporan Tahunan mengikut PPK</h5>
                            </div>
                            <div class="panel-body">
                                <div class="panel-body">
                                    {!! Form::open(['route' => 'members.supervisor.laporan.tahunanPpk', 'method' => 'POST']) !!}

                                    <label for="bulanan">Tarikh</label>
                                    <div class="form-group">
                                        {!! Form::selectRange('year', 2010, date('Y'), date('Y'), ['class' => 'form-control']) !!}
                                    </div>
                                    <div class="form-group" align="right">
                                        {!! Form::submit('Jana Laporan', ['class' => 'btn btn-primary']) !!}
                                    </div>

                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-4">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h5>Laporan Tahunan dan Selain PPK</h5>
                            </div>
                            <div class="panel-body">
                                {!! Form::open(['route' => 'members.supervisor.laporan.tahunanXPpk', 'method' => 'POST']) !!}

                                <label for="bulanan">Tarikh</label>
                                <div class="form-group">
                                    {!! Form::selectRange('year', 2010, date('Y'), date('Y'), ['class' => 'form-control']) !!}
                                </div>
                                <div class="form-group" align="right">
                                    {!! Form::submit('Jana Laporan', ['class' => 'btn btn-primary']) !!}
                                </div>

                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>



                    <div class="col-xs-4">
                        {{--<div class="panel panel-primary">--}}
                        {{--<div class="panel-heading">--}}
                        {{--<h5>Laporan Bulanan mengikut Penempatan</h5>--}}
                        {{--</div>--}}
                        {{--<div class="panel-body">--}}
                        {{--<form action="">--}}
                        {{--<label for="tarikh1">Tarikh</label>--}}
                        {{--<div class="form-group">--}}
                        {{--<input class="form-control" type="date"/>--}}
                        {{--</div>--}}
                        {{--</form>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                    </div>
                </div>
            </div>

        </div>

        {{--  Row 4  --}}
{{--##################################################--}}

        <div class="row">

            <div class="panel panel-primary">

                <div class="panel panel-heading"><h4>Ringkasan</h4></div>

                <div class="panel-body">

                    <div class="col-xs-4">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h5>Ringkasan Peratusan Status Laporan</h5>
                            </div>
                            <div class="panel-body">
                                {!! Form::open(['route' => 'members.supervisor.laporan.ringkasanPeratusan', 'method' => 'POST']) !!}

                                <label for="bulanan">Tarikh</label>
                                <div class="form-group">
                                    {!! Form::selectRange('year', 2010, date('Y'), date('Y'), ['class' => 'form-control']) !!}
                                </div>
                                <div class="form-group" align="right">
                                    {!! Form::submit('Jana Laporan', ['class' => 'btn btn-primary']) !!}
                                </div>

                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
@stop