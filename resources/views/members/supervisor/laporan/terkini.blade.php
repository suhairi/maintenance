@extends('layouts.members2')

@section('content')

    <div class="row">

        <div class="col-xs-12">

            <div class="panel panel-primary printable" id="printable">
                <div class="panel-heading">
                    <h4>Ringkasan Laporan Terkini</h4>
                </div>
                <div class="panel-body">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr align="center" valign="middle">
                                <th>Bil</th>
                                <th width="200">Nama</th>
                                <th><div align="center">Tugasan Belum Selesai</div></th>
                                <th><div align="center">Tugasan KIV</div></th>
                                <th><div align="center">Tugasan Selesai</div></th>
                                <th><div align="center">Tugasan Closing</div></th>
                                <th><div align="center">Jumlah Tugasan Bulanan <?= date('M-Y'); ?> <br />Keseluruhan</div></th>
                                <th><div align="center">Jumlah Tugasan <br />Bulan Sebelum dan Belum Selesai</div></th>
                                <th><div align="center">Jumlah Tugasan Keseluruhan <br />Belum Selesai/KIV</div></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $bil++ }}</td>
                                    <td>{{ strtoupper(strtolower($user->nama)) }}</td>
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
                </div>
            </div>
            <table class="table hidden-print">
                <tr>
                    <td align="right"><button id="print" onclick="printContent('printable')" class="btn btn-default"><i class="glyphicon glyphicon-print"></i> Cetak</button></td>
                </tr>
            </table>

        </div>

        {{--<div class="col-xs-4 hidden-print">--}}
            {{--<div class="panel panel-primary">--}}
                {{--<div class="panel-heading">--}}
                    {{--<h4>Carta</h4>--}}
                {{--</div>--}}
                {{--<div class="panel-body">--}}
                    {{--<div id="container" style="width:100%; height:400px;"></div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}

    </div>


    <script language="javascript">

        //Charts
        $(document).ready(function () {
            $('#container').highcharts({
                chart: {
                    type: 'bar'
                },
                title: {
                    text: 'Tugasan'
                },
                xAxis: {
                    categories: ['Belum Selesai', 'KIV', 'Selesai', 'Closing']
                },
                yAxis: {
                    title: {
                        text: 'Bilangan Tugasan'
                    }
                },
                credits: {
                    text: '<a href="http://www.mada.gov.my> MADA </a>',
                    enabled: true
                },
                series: [{
                    name: 'Akmal',
                    data: [1, 0, 4, 4]
                }, {
                    name: 'Marziani',
                    data: [5, 7, 3, 6]
                },
                {
                    name: 'Rohana',
                    data: [6, 8, 9, 4]
                },
                {
                    name: 'Suhairi',
                    data: [0, 5, 3, 5]
                }]
            });
        });

        //Print Function
        function printContent(el){
//            var DocumentContainer = document.getElementById(el);
//            var WindowObject = window.open('', 'PrintWindow', 'width=900,height=900,top=150,left=50,toolbars=no,scrollbars=yes,status=no,resizable=yes');
//            WindowObject.document.writeln(DocumentContainer.innerHTML);
//            WindowObject.document.close();
//            WindowObject.focus();
//            WindowObject.print();
//            WindowObject.close();

            w = window.open(null, 'Print_Page', 'scrollbars=yes');
            var myStyle = '<link rel="stylesheet" href="http://maintenance2.dev/css/bootstrap.css" media="all" />';
            w.document.write(myStyle + jQuery('#printable').html());
            w.document.close();
            w.print();
        }



    </script>

@stop