@extends('layouts.members')


@section('content')

    <div class="row">
        <div class="col-xs-8">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4>Laporan Bulanan dan Penempatan</h4>
                </div>
                <div class="panel-body">

                    <table class="table table-striped table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>Bil</th>
                                <th>Kategori Kerosakan</th>
                                <th>Kerosakan</th>
                                <th>Bilangan</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $next = 0; ?>
                        @if(count($kategoris) > 0)
                            @foreach($kategoris as $kategori)
                                <?php $next++; ?>
                                @foreach($counts as $count)

                                    @if($count['kategori'] == $kategori->nama)
                                        <tr>
                                            @if($bil == $next)
                                                <td>{{ $bil++ }}</td>
                                                <td>{{ $kategori->nama }}</td>
                                                <td>{{ $count['peralatan'] }}</td>
                                                <td align="center">{{ $count['count'] }}</td>
                                            @else
                                                <td>&nbsp;</td>
                                                <td>{{ $kategori->name }}</td>
                                                <td>{{ $count['peralatan'] }}</td>
                                                <td align="center">{{ $count['count'] }}</td>
                                            @endif
                                        </tr>
                                    @endif

                                @endforeach
                            @endforeach
                            <tr>
                                <td colspan="3" align="right"><strong>JUMLAH</strong></td>
                                <td align="center"><strong>{{ $jumlah }}</strong></td>
                            </tr>
                        @else
                            <tr>
                                <td colspan="9" class="alert alert-danger" padding="1"><b>Tiada Laporan</b></td>
                            </tr>
                        @endif

                        </tbody>
                    </table>
                    @include('display.backAndPrint')

                </div>
            </div>

        </div>
    </div>

@stop