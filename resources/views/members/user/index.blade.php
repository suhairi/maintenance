@extends('layouts.members')

@section('content')

    <div class="row">



        <div class="col-xs-4">
            @include('layouts.notifications')
            @include('errors.form_error')

            <div class="panel panel-info">
                <div class="panel-heading">
                    <h4>Rekod Aduan Baru</h4>
                </div>

                <div class="panel-body">
                    {!! Form::open() !!}
                        @include('forms._laporan', ['submitButton' => 'Rekod Aduan'])
                    {!! Form::close() !!}
                </div>
            </div>
        </div>

        <div class="col-xs-8">

            <div class="panel panel-info">
                <div class="panel-heading">
                    <h4>Senarai Aduan Hari Ini</h4>
                </div>
                <div class="panel-body">
                    <table class="table table-condensed table-striped table-hover">
                        <tr>
                            <th>Bil. </th>
                            <th>Pelapor </th>
                            <th>Cawangan </th>
                            <th>Peralatan </th>
                            <th>Ringkasan Kerosakan </th>
                            <th>Pilihan </th>

                        </tr>

                        @foreach($aduans as $aduan)
                            <tr>
                                <td>{{ $bil++ }}</td>
                                <td>{{ $aduan->pelapor }} <br /> <small> pemilik : {{ $aduan->pemilik }}</small></td>
                                <td>{{ $aduan->cawangan->bahagian->nama }}<br /><small>  {{ $aduan->cawangan->nama }}</small></td>
                                <td>{{ $aduan->peralatan->nama }} <br /> <small> No Siri : {{ $aduan->noSiri }}</small></td>
                                <td>{{ $aduan->ringkasanKerosakan }}</td>
                                <td>
                                    <a href="{{ route('members.user.laporan.edit', [$aduan->id]) }}">
                                        <button class="btn btn-info btn-sm"><i class='glyphicon glyphicon-edit'></i> Edit</button>
                                    </a>
                                    {!! Form::open(['route' => ['members.user.laporan.destroy', $aduan->id], 'method' => 'delete']) !!}
                                        <button class="btn btn-danger btn-sm"><i class='glyphicon glyphicon-trash'></i> Padam</button>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>

        </div>
    </div>


@stop