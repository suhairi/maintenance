@extends('layouts.members')

@section('content')

    <div class="row">
        <div class="md-xs-6">

            <div class="panel panel-info">

                <div class="panel-heading">
                    <h4>Senarai Laporan Baru</h4>
                </div>

                <div class="panel-body">

                    <table class="table table-striped table-hover">
                        <thead>
                            <th>Bil</th>
                            <th>Pelapor</th>
                            <th>Bahagian</th>
                            <th>Kerosakan</th>
                            <th>Ringkasan Kerosakan</th>
                            <th align="center">Pilihan</th>
                        </thead>

                        @if($laporans)
                            @foreach($laporans as $laporan)
                                <tbody>
                                <td>{{ $bil++ }}</td>
                                <td>{{ $laporan->pelapor }}</td>
                                <td>{{ $laporan->cawangan->bahagian->nama }} <br />{{ $laporan->cawangan->nama }}</td>
                                <td><small>( {{ $laporan->peralatan->kategori->units->nama }})</small><br />{{ $laporan->peralatan->nama }}</td>
                                <td>{{ $laporan->ringkasanKerosakan }} </td>
                                <td align="center">[ <a href="{{ route('members.technician.edit', ['id' => $laporan->id]) }}"> Kemaskini Status</a> ]</td>
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