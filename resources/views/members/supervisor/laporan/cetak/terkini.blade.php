@extends('layouts.members_cetak')

@section('content')
<style>
    @media print {
        .noprint {display:none !important;}
        a:link:after, a:visited:after {
            display: none;
            content: "";
        }
    }
</style>

    <table class="table table-hover table-striped">
        <thead>
        <tr align="center" valign="middle">
            <th>Bil</th>
            <th width="200">Nama</th>
            <th><div align="center">Tugasan Belum Selesai</div></th>
            <th><div align="center">Tugasan KIV</div></th>
            <th><div align="center">Tugasan Closing</div></th>
            <th><div align="center">Tugasan Selesai</div></th>
            <th><div align="center">Jumlah Tugasan Bulanan <?= date('M-Y'); ?> <br />Keseluruhan</div></th>
            <th><div align="center">Jumlah Tugasan <br />Bulan Sebelum dan Belum Selesai</div></th>
            <th><div align="center">Jumlah Tugasan Keseluruhan <br />Belum Selesai/KIV</div></th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $bil++ }}</td>
                <td>
                    {{ strtoupper(strtolower($user->nama)) }}
                    @if(Auth::user()->level->id == 1)
                        <br />
                        <small>{{ $user->level->nama }}</small>
                    @endif

                </td>
                <td align="center">

                    @if($user->belumSelesai == 0)
                        {{ $user->belumSelesai }}
                    @else
                        <a href="{{ route('members.supervisor.laporan.detailsTerkini',
                                    ['username' => $user->username, 'status' => 0]) }}">
                            {{ $user->belumSelesai }}
                        </a>
                    @endif

                </td>
                <td align="center">
                    @if($user->kiv == 0)
                        {{ $user->kiv }}
                    @else
                        <a href="{{ route('members.supervisor.laporan.detailsTerkini',
                                    ['username' => $user->username, 'status' => 3]) }}">
                            {{ $user->kiv }}
                        </a>
                    @endif
                </td>
                <td align="center">
                    @if($user->closing == 0)
                        {{ $user->closing }}
                    @else
                        <a href="{{ route('members.supervisor.laporan.detailsTerkini',
                                    ['username' => $user->username, 'status' => 1]) }}">
                            {{ $user->closing }}
                        </a>
                    @endif
                </td>
                <td align="center">
                    @if($user->selesai == 0)
                        {{ $user->selesai }}
                    @else
                        <a href="{{ route('members.supervisor.laporan.detailsTerkini',
                                    ['username' => $user->username, 'status' => 4]) }}">
                            {{ $user->selesai }}
                        </a>
                    @endif
                </td>
                <td align="center">
                    @if($user->totalCurrentMonth == 0)
                        {{ $user->totalCurrentMonth }}
                    @else
                        <a href="{{ route('members.supervisor.laporan.detailsTerkini',
                                        ['username' => $user->username, 'status' => "totalCurrent"]) }}">
                            {{ $user->totalCurrentMonth }}
                        </a>
                    @endif

                </td>
                <td align="center">
                    @if($user->totalPreviousMonth == 0)
                        {{ $user->totalPreviousMonth }}
                    @else
                        <a href="{{ route('members.supervisor.laporan.detailsTerkini',
                                        ['username' => $user->username, 'status' => "totalBefore"]) }}">
                            {{ $user->totalPreviousMonth }}
                        </a>
                    @endif

                </td>
                <td align="center">
                    @if($user->grandTotal == 0)
                        {{ $user->grandTotal }}
                    @else
                        <a href="{{ route('members.supervisor.laporan.detailsTerkini',
                                        ['username' => $user->username, 'status' => "grandTotal"]) }}">
                            {{ $user->grandTotal }}</a>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    @include('scripts.print')


@stop