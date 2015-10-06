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
    <th align="center">Pilihan</th>
    </thead>

    @if($laporans)
        @foreach($laporans as $laporan)
            @if($laporan->peralatan->kategori->unit == \Auth::user()->unit)
                <tbody>
                    <td>{{ $bil++ }}</td>
                    <td>{{ $laporan->pelapor }}</td>
                    <td>{{ $laporan->cawangan->bahagian->nama }} <br /> {{ $laporan->cawangan->nama }}</td>
                    @if(Auth::user()->level_id == 1)
                        <td align="center">{{ $laporan->users->nama }}</td>
                    @endif
                    <td>{{ $laporan->peralatan->kategori->units->nama }}<br /><small>( {{ $laporan->peralatan->nama }})</small></td>
                    <td>{{ $laporan->ringkasanKerosakan }} </td>
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
                    <td align="center">[ <a href="{{ route('members.technician.edit', ['id' => $laporan->id]) }}"> Kemaskini Status</a> ]</td>
                </tbody>
            @endif
        @endforeach
    @endif

    <?php //print_r($laporans); ?>

    @if(empty($laporans->toArray()))
        <tbody>
            <tr>
                <td colspan="9" class="alert alert-danger" padding="1"><b>Tiada Laporan</b></td>
            </tr>
        </tbody>
    @endif
</table>