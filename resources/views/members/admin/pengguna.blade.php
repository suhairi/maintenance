@extends('layouts.members')

@section('content')

    <div class="row">
        <div class="col-xs-4">

            <div class="panel panel-info">
                <h3>Kemaskini Pengguna</h3>

                <div class="panel-body">

                    {!! Form::model($user, ['route' => ['members.admin.profile.update', $user->username], 'method' => 'PATCH']) !!}
                    @include('forms._profile', ['submitButton' => 'Kemaskini Pengguna'])
                    {!! Form::close() !!}

                </div>
            </div>

        </div>
    </div>

@stop