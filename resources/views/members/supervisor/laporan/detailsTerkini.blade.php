@extends('layouts.members2')

@section('content')

    <div class="row">
        <div class="col-xs-12">

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3>Laporan {{ $title }}</h3>
                </div>
                <panel class="panel-body">
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <td colspan="6">
                                <table class="table">
                                    <tr>
                                        <td width="200"><strong>Juruteknik / Penyenggara </strong></td>
                                        <td width="15"><strong>:</strong></td>
                                        <td>{{ ucWords(strtolower($user))  }}</td>
                                    </tr><tr>
                                        <td><strong>Bulan / Tahun</strong></td>
                                        <td><strong>:</strong></td>
                                        <td>{{ $month }}</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <th>Bil</th>
                            <th>Pelapor / Bahagian</th>
                            <th>Peralatan / No Siri / Ringkasan Kerosakan</th>
                            <th>No Jobsheet</th>
                            <th>Status</th>
                            <th>Tempoh <br />(hari)</th>
                            <th>Pilihan</th>
                        </tr>
                        </thead>
                        <tbody>

                        @if(!empty($_GET['page']))
                            <?php $bil = ((($_GET['page'] - 1) * 10) + 1); ?>
                        @endif

                        @foreach($laporans as $laporan)
                            <tr>
                                <td>{{ $bil ++  }}</td>
                                <td>
                                    {{ strtoupper(strtolower($laporan->pelapor)) }} <br />
                                    {{ $laporan->cawangan->bahagian->nama }} <br />
                                    {{ $laporan->tarikh->format('d-m-Y') }}
                                </td>
                                <td>
                                    <a href="#" title="Details">{{ $laporan->peralatan->nama }}</a> <br />
                                    > <strong>No. Siri</strong>  <br />&nbsp;&nbsp;&nbsp;{{ $laporan->noSiri }} <br />
                                    > <strong>Ringkasan Kerosakan </strong>  <br />&nbsp;&nbsp;&nbsp;{{ strtoupper($laporan->ringkasanKerosakan) }}
                                </td>
                                <td>{{ $laporan->noJobsheet }}</td>
                                <td>
                                    @if(!empty($laporan->laporanstatus->nama))
                                        {{ $laporan->laporanstatus->nama }} <br /><br />
                                        <small>Siap pada : <br />{{ $laporan->tarikhSiap->format('d-m-Y') }}</small>
                                    @endif
                                </td>
                                <td align="center">
                                    <?php $tarikh = $laporan->tarikhSiap; ?>
                                    @if(strpos($laporan->tarikhSiap, '0000-00') === false)
                                        <?php $tarikh = \Carbon\Carbon::now(); ?>
                                    @endif
                                    {{ $laporan->tarikh->diffInDays($tarikh) }}
                                </td>
                                <td>
                                    <button class="btn btn-danger">Batal</button>
                                    <a href="{{ route('members.supervisor.laporan.kemaskini', ['id' => $laporan->id]) }}">
                                        <button class="btn btn-success">Kemaskini</button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div align="center">{!! $laporans->render() !!}</div>
                    @include('display.backAndPrint')
                </panel>

            </div>

        </div>
    </div>



@stop