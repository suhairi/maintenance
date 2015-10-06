@extends('layouts.members')

@section('content')

    <div class="row">
        <div class="cols-xs-4">

            @include('layouts.notifications')
            @include('errors.form_error')

            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3>Senarai Laporan Belum Agih</h3>
                </div>
                <div class="panel-body">
                    <table class="table table-condensed table-striped table-hover">
                        <thead>
                            <th>Bil. </th>
                            <th>Pelapor </th>
                            <th>Cawangan </th>
                            <th>Peralatan </th>
                            <th>Ringkasan Kerosakan </th>
                            <th>Pilihan </th>
                        </thead>

                        @foreach($aduans as $aduan)
                            @if($aduan->peralatan->kategori->unit == Auth::user()->unit)
                                <tr>
                                    <td>{{ $bil++ }}</td>
                                    <td>{{ $aduan->pelapor }} <br /> <small> pemilik : {{ $aduan->pemilik }} </small></td>
                                    <td>{{ $aduan->cawangan->bahagian->nama }}<br /><small> {{ $aduan->cawangan->nama }} </small></td>
                                    <td>{{ $aduan->peralatan->nama }} <br /> <small> No Siri : {{ $aduan->noSiri }} </small></td>
                                    <td>{{ $aduan->ringkasanKerosakan }}</td>
                                    <td align="right">
                                        {!! Form::open(['route' => ['members.supervisor.laporan.update', $aduan->id], 'method' => 'post']) !!}
                                        <div class="form-group">
                                            {!! Form::select('user', $users, null, ['class' => 'form-control', 'placeholder' => 'Penyelenggara']) !!}
                                            <br />
                                            {!! Form::submit('Agihkan', ['class' => 'btn btn-primary', 'align' => 'right']) !!}
                                        </div>
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endif
                        @endforeach

                        @if(empty($aduans))
                            <tr>
                                <td colspan="6" class="alert alert-warning">Tiada aduan yang belum diagihkan.</td>
                            </tr>
                        @endif
                    </table>
                </div>
            </div>





        </div>
    </div>




@stop