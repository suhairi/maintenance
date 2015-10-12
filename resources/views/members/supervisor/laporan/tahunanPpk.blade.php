@extends('layouts.members2')


@section('content')

    <div class="row">
        <div class="col-xs-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4>Laporan Bulanan dan Penempatan</h4>
                </div>
                <div class="panel-body">

                    <table class="table table-striped table-hover table-bordered">
                        <thead>
                        <tr>
                            <th class="alert-info">PPK</th>
                            <th class="alert-info">Bilangan</th>
                        </tr>
                        </thead>
                        <tbody>

                            @foreach($counts as $count)
                               @if(strpos($count['ppk'], ''.$bil) !== false)
                                    <tr>
                                        <td colspan="2" class="alert-info"><strong>Wilayah {{ $bil++ }}</strong></td>
                                    </tr>
                               @endif
                                   <tr>
                                        <td>{{ $count['ppk'] }}</td>
                                        <td align="center">{{ $count['bilangan'] }}</td>
                                   </tr>
                            @endforeach
                            <tr>
                                <td align="right"><strong>JUMLAH</strong></td>
                                <td align="center"><strong>{{ $jumlah }}</strong></td>
                            </tr>


                        </tbody>
                    </table>
                    @include('display.backAndPrint')

                </div>
            </div>

        </div>


        {{--<div class="col-xs-6">--}}
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
        $(function () {
            $('#container').highcharts({
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'column'
                },
                title: {
                    text: 'Carta'
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{series.data[y]:.1f}%</b>'
                },
                plotOptions: {
                    column: {
                        dataLabels: {
                            enabled: true
                        }
                    }
                },
                xAxis: {
                    categories: [
                        'Wilayah 1',
                        'Wilayah 2',
                        'Wilayah 3',
                        'Wilayah 4'
                    ],
                    crosshair: true
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Bilangan Aduan'
                    }
                },
                series: [{
                    name: "Brands",
                    colorByPoint: true,
                    data: [{
                        name: "Wilayah 1",
                        y: 20.33
                    }, {
                        name: "Wilayah 2",
                        y: 24.03,
                        sliced: true,
                        selected: true
                    }, {
                        name: "Wilayah 3",
                        y: 33.87
                    }, {
                        name: "Wilayah 4",
                        y: 21.77
                    }]
                }]
            });
        });

    </script>







@stop