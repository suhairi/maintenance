@extends('layouts.members')

@section('content')

    <div class="row fa-lightbulb-o">
        <div class="col-xs-8">

            @include('layouts.notifications')

            <div class="panel panel-primary">
                <div class="panel-heading"><h3>Senarai Pengguna</h3></div>
                <div class="panel-body">

                    <table class="table table-striped table-hover">
                        <thead>
                            <th>Bil</th>
                            <th align="center">Nama Penuh</th>
                            <th align="center">Cawangan</th>
                            <th align="center">Level Pengguna</th>
                            <th align="center">Status</th>
                            <th align="center">Pilihan</th>
                        </thead>

                        @foreach($users as $user)

                            <tr>
                                <td>{{ $bil++ }}</td>
                                <td align="center">{{ strtoupper(strtolower($user->nama)) }}<br /><small><small>( username : {{ $user->username }} )</small></small></td>
                                <td>{{ $user->cawangan->nama }}</td>
                                <td align="center">{{ $user->level->nama }} <br /> <small><small>{{ $user->units->nama }}</small></small></td>
                                <td align="center">
                                    <?php
                                    if($user->status == 1)
                                    {
                                    ?>
                                    <a href="{{ route('profileActivate', ['id' => $user->username, 'status' => '0']) }}">
                                        <button class="btn btn-success btn-sm"><i class="glyphicon glyphicon-ok-circle"></i> AKTIF</button>
                                    </a>
                                    <?php
                                    } else {
                                    ?>
                                    <a href="{{ route('profileActivate', ['id' => $user->username, 'status' => '1']) }}">
                                        <button class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-ban-circle"></i> TIDAK AKTIF</button>
                                    </a>
                                    <?php
                                    }
                                    ?>
                                </td>

                                <td align="center">
                                    <a href="{{ route('members.admin.profile.edit', [$user->username]) }}">
                                        <button class="btn btn-info btn-sm"><i class='glyphicon glyphicon-edit'></i> Edit</button>
                                    </a>
                                    {!! Form::open(['route' => ['members.admin.profile.destroy', $user->username], 'method' => 'delete']) !!}
                                    <button class="btn btn-danger btn-sm"><i class='glyphicon glyphicon-trash'></i> Padam</button>
                                    {!! Form::close() !!}
                                </td>
                            </tr>

                        @endforeach

                    </table>

                </div>
            </div>

        </div>

        <div class="col-xs-4">

            @include('errors.form_error')

            <div class="panel panel-primary">
                <div class="panel-heading"><h3>Daftar Pengguna</h3></div>

                <div class="panel-body">
                    {!! Form::open() !!}
                    @include('forms._profile', ['submitButton' => 'Daftar Pengguna'])
                    {!! Form::close() !!}
                </div>
            </div>

            <hr />





        </div>


    </div> {{-- end of div.row --}}

@stop