@extends('layouts.members')

@section('content')

    <div class="row">
        <div class="md-xs-6">

            @include('display._cetak', ['value' => 'members.technician.terkini.cetak'])

            <div class="panel panel-info">

                <div class="panel-heading">
                    <h4>Senarai Laporan Bulan Ini</h4>
                </div>

                <div class="panel-body">

                    <table class="table table-striped table-hover">
                        <thead>
                        <th>Bil</th>
                        <th>Pelapor</th>
                        <th>Bahagian</th>
                        <th>Kerosakan</th>
                        <th>Ringkasan Kerosakan</th>
                        <th>Status / Catatan</th>
                        <th align="center">Pilihan</th>
                        </thead>

                        @if($laporans)
                            @foreach($laporans as $laporan)
                                <tbody>
                                <td>{{ $bil++ }}</td>
                                <td>{{ $laporan->pelapor }}</td>
                                <td>{{ $laporan->cawangan->bahagian->nama }} <br />{{ $laporan->cawangan->nama }}</td>
                                <td><small>( {{ $laporan->peralatan->kategori->units->nama }})</small><br />{{ $laporan->peralatan->nama }}</td>
                                <td><small>{{ $laporan->tarikh->format('d-m-Y')}}</small><br /><br />{{ $laporan->ringkasanKerosakan }} </td>
                                <td>{{ $laporan->laporanstatus->nama }} <br /><br />{{ $laporan->catatan }}</td>
                                <td align="center">
                                    <a href="{{ route('members.technician.edit', ['id' => $laporan->id]) }}">
                                        <button class="btn btn-primary">Kemaskini Status</button>
                                    </a>
                                </td>
                                </tbody>
                            @endforeach
                        @endif

                        @if(empty($laporans))
                            <tbody>
                            <td colspan="7">Tiada Laporan</td>
                            </tbody>
                    @endif

                </div>

            </div>

            </table>


        </div>
    </div>

@stop