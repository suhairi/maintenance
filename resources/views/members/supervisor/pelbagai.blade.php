@extends('layouts.members')


@section('content')

    <div class="container">
        <div class="row">

            <div class="col-xs-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h5>Laporan Harian</h5>
                    </div>
                    <div class="panel-body">
                        {!! Form::open(['route' => 'members.supervisor.laporan.harian', 'method' => 'POST']) !!}

                        <label for="harian">Tarikh</label>
                        <div class="form-group">
                            {!! Form::date('tarikh', \Carbon\Carbon::today()) !!}
                        </div>


                        <div class="form-group" align="right">
                            {!! Form::submit('Cari', ['class' => 'btn btn-primary']) !!}
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
                        {!! Form::open(['route' => 'members.supervisor.laporan.bulanan', 'method' => 'POST']) !!}

                        <label for="bulanan">Tarikh</label>
                        <div class="form-group">
                            {!! Form::selectMonth('month', date('m')) !!}
                            {!! Form::selectRange('year', 2010, date('Y'), date('Y')) !!}
                        </div>


                        <div class="form-group" align="right">
                            {!! Form::submit('Cari', ['class' => 'btn btn-primary']) !!}
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
                            {!! Form::selectMonth('month', date('m')) !!}
                            {!! Form::selectRange('year', 2010, date('Y'), date('Y')) !!}
                        </div>
                        <label for="penempatan">Penempatan</label>
                        <div class="form-group">
                            {!! Form::select('penempatan', $cawangans, null, ['class' => 'form-control', 'placeholder' => 'Penempatan', 'required' => 'true']) !!}
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

            <div class="col-xs-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h5>Laporan Tahunan mengikut PPK</h5>
                    </div>
                    <div class="panel-body">
                        <form action="">
                            <label for="tarikh1">Tarikh</label>
                            <div class="form-group">
                                <input class="form-control" type="date"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-xs-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h5>Laporan Tahunan dan Selain PPK</h5>
                    </div>
                    <div class="panel-body">
                        <form action="">
                            <label for="tarikh1">Tarikh</label>
                            <div class="form-group">
                                <input class="form-control" type="date"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-xs-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h5>Laporan Julat Bulanan mengikut PPK</h5>
                    </div>
                    <div class="panel-body">
                        <form action="">
                            <label for="tarikh1">Dari</label>
                            <div class="form-group">
                                <input class="form-control" type="date"/>
                            </div>
                            <label for="tarikh1">Sehingga</label>
                            <div class="form-group">
                                <input class="form-control" type="date"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-xs-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h5>Laporan Julat Tahunan dan PPK</h5>
                    </div>
                    <div class="panel-body">
                        <form action="">
                            <label for="tarikh1">Dari</label>
                            <div class="form-group">
                                <input class="form-control" type="date"/>
                            </div>
                            <label for="tarikh1">Sehingga</label>
                            <div class="form-group">
                                <input class="form-control" type="date"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-xs-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h5>Laporan Bulanan mengikut Penempatan</h5>
                    </div>
                    <div class="panel-body">
                        <form action="">
                            <label for="tarikh1">Tarikh</label>
                            <div class="form-group">
                                <input class="form-control" type="date"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-xs-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h5>Ringkasan Peratusan Status Laporan</h5>
                    </div>
                    <div class="panel-body">
                        <form action="">
                            <label for="tarikh1">Tarikh</label>
                            <div class="form-group">
                                <input class="form-control" type="date"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


        </div>

    </div>
@stop