@extends('layouts.members')


@section('content')

    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4>Laporan Bulanan</h4>
                </div>
                <div class="panel-body">

                    <table class="table table-striped table-hover">
                        <thead>
                        <th>Bil</th>
                        <th>Pelapor</th>
                        <th>Bahagian</th>
                        @if(Auth::user()->level_id == 1)
                            <th>Technician</th>
                        @endif
                        <th>Kerosakan</th>
                        <th>Ringkasan Kerosakan</th>
                        <th>Status</th>
                        <th>Catatan</th>
                        </thead>

                        @foreach($laporans as $laporan)
                            @if($laporan->peralatan->kategori->unit == \Auth::user()->unit)
                                <tbody>
                                <td>{{ $bil++ }}</td>
                                <td>{{ $laporan->pelapor }} <br /> <small>{{ $laporan->tarikh->format('d-m-Y') }}</small></td>
                                <td>{{ $laporan->cawangan->bahagian->nama }} <br /> {{ $laporan->cawangan->nama }}</td>
                                @if(Auth::user()->level_id == 1)
                                    <td align="center">{{ $laporan->users->nama }}</td>
                                @endif
                                <td>{{ $laporan->peralatan->kategori->units->nama }}<br /><small>( {{ $laporan->peralatan->nama }} )</small></td>
                                <td>{{ $laporan->ringkasanKerosakan }} </td>
                                <td>
                                    @if(!empty($laporan->laporanstatus->nama))
                                        {{ $laporan->laporanstatus->nama }}
                                    @else
                                        {{ 'null' }}
                                    @endif
                                </td>
                                <td>
                                    @if(!empty($laporan->catatan))
                                        {{ $laporan->catatan }}
                                    @endif
                                </td>
                                </tbody>
                            @endif
                            @if(\Auth::user()->level->id == 1)
                                    <tbody>
                                    <td>{{ $bil++ }}</td>
                                    <td>{{ $laporan->pelapor }} <br /> <small>{{ $laporan->tarikh->format('d-m-Y') }}</small></td>
                                    <td>{{ $laporan->cawangan->bahagian->nama }} <br /> {{ $laporan->cawangan->nama }}</td>
                                    @if(Auth::user()->level_id == 1)
                                        <td align="center">{{ $laporan->users->nama }}</td>
                                    @endif
                                    <td>{{ $laporan->peralatan->kategori->units->nama }}<br /><small>( {{ $laporan->peralatan->nama }} )</small></td>
                                    <td>{{ $laporan->ringkasanKerosakan }} </td>
                                    <td>
                                        @if(!empty($laporan->laporanstatus->nama))
                                            {{ $laporan->laporanstatus->nama }}
                                        @else
                                            {{ 'null' }}
                                        @endif
                                    </td>
                                    <td>
                                        @if(!empty($laporan->catatan))
                                            {{ $laporan->catatan }}
                                        @endif
                                    </td>
                                    </tbody>
                            @endif
                        @endforeach
                    </table>
                    @include('display.backAndPrint')

                </div>
            </div>

        </div>
    </div>

@stop