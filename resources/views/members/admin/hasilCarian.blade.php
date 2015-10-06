@extends('layouts.members')

@section('content')

<div class="row">
    <div class="col-xs-12">

        <div class="panel panel-primary">
            <div class="panel-heading"><h3>Hasil Carian</h3></div>
            <div class="panel-body">

                <table class="table table-condensed table-hover">
                    <thead>
                        <th>Bil</th>
                        <th>Pelapor</th>
                        <th>Bahagian</th>
                        @if(Auth::user()->level_id <= 1)
                            <th>Technician</th>
                        @endif
                        <th>Kerosakan</th>
                        <th>Ringkasan Kerosakan</th>
                        <th>Status</th>
                        <th>Catatan</th>
                        <th align="center">Pilihan</th>
                    </thead>

                @foreach($laporans as $laporan)
                        <tr>
                            <td>{{ $bil++ }}</td>
                            <td>{{ $laporan->pelapor }}</td>
                            <td>{{ $laporan->cawangan->bahagian->nama }} <br /> {{ $laporan->cawangan->nama }}</td>
                            @if(Auth::user()->level_id <= 1)
                                <td align="center">{{ $laporan->user }}</td>
                            @endif
                            <td>{{ $laporan->peralatan->kategori->units->nama }}<br /><small>( {{ $laporan->peralatan->nama }})</small></td>
                            <td>{{ $laporan->tarikh->format('d-m-Y') }} <br />{{ $laporan->ringkasanKerosakan }} </td>
                            <td>
                                @if(!empty($laporan->laporanstatus->nama))
                                    {{ $laporan->laporanstatus->nama }}
                                @endif
                            </td>
                            <td>
                                @if(!empty($laporan->catatan))
                                    {{ $laporan->catatan }}
                                @endif
                            </td>
                            <td align="center">[ <a href="{{ route('members.technician.edit', ['id' => $laporan->id]) }}"> Kemaskini</a> ]</td>
                        </tr>
                @endforeach
                </table>
                <div align="center">{!! $laporans->render() !!}</div>
            </div>
        </div>
    </div>
</div>

@stop