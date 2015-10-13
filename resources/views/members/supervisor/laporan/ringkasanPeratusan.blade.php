@extends('layouts.members')

@section('content')

<div class="row">

    <div class="col-xs-6">

        <div class="panel panel-primary">
            <div class="panel-heading"><h4>In House</h4></div>
            <div class="panel-body">
                <table class="table table-bordered">
                    <thead>
                    <tr class="alert alert-info">
                        <th colspan="5">Ringkasan Peratusan Status Laporan</th>
                    </tr>
                    <tr class="alert alert-info">
                        <th><div align="center">Bulan</div></th>
                        <th><div align="center">Bilangan Laporan</div></th>
                        <th><div align="center"><= 10 hari</div></th>
                        <th><div align="center">> 10 hari</div></th>
                        <th><div align="center">Peratus <= 10 hari</div></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        $total = 0.00;
                        $denominator = 0;
                    ?>
                    @foreach($counts1 as $count)
                        <tr >
                            <th class="alert alert-info"><div align="center">{{ date('F', mktime(0, 0, 0, $count['bulan'], 10)) }}</div></th>
                            <td><div align="center">{{ $count['total'] }}</div></td>
                            <td><div align="center">{{ $count['countLess'] }}</div></td>
                            <td><div align="center">{{ $count['countGreater'] }}</div></td>
                            <td><div align="center">{{ $count['peratus'] }} %</div></td>
                            <?php
                                if($count['total'] != 0)
                                    $denominator = $denominator + 1;
                                $total += $count['total'];
                            ?>
                        </tr>
                    @endforeach
                    <tr class="alert alert-info">
                        <th colspan="4"><div align="right">Purata&nbsp;&nbsp;&nbsp;</div></th>
                        <th><div align="center">{{ number_format($total/$denominator, 2) }} %</div></th>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>



    </div>

    <div class="col-xs-6">

        <div class="panel panel-primary">
            <div class="panel-heading"><h4>Vendor</h4></div>
            <div class="panel-body">
                <table class="table table-bordered">
                    <thead>
                    <tr class="alert alert-info">
                        <th colspan="5">Ringkasan Peratusan Status Laporan</th>
                    </tr>
                    <tr class="alert alert-info">
                        <th><div align="center">Bulan</div></th>
                        <th><div align="center">Bilangan Laporan</div></th>
                        <th><div align="center"><= 21 hari</div></th>
                        <th><div align="center">> 21 hari</div></th>
                        <th><div align="center">Peratus <= 21 hari</div></th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                            $total = 0.00;
                            $denominator = 0;
                        ?>
                        @foreach($counts2 as $count)
                            <tr>
                                <th class="alert alert-info"><div align="center">{{ date('F', mktime(0, 0, 0, $count['bulan'], 10)) }}</div></th>
                                <td><div align="center">{{ $count['total'] }}</div></td>
                                <td><div align="center">{{ $count['countLess'] }}</div></td>
                                <td><div align="center">{{ $count['countGreater'] }}</div></td>
                                <td><div align="center">{{ $count['peratus'] }} %</div></td>
                                <?php
                                    if($count['total'] != 0)
                                        $denominator = $denominator + 1;
                                    $total += $count['total'];
                                ?>
                            </tr>
                        @endforeach
                        <tr class="alert alert-info">
                            <th colspan="4"><div align="right">Purata&nbsp;&nbsp;&nbsp;</div></th>
                            <th><div align="center">{{ number_format($total/$denominator, 2) }} %</div></th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>



    </div>
</div>

@stop