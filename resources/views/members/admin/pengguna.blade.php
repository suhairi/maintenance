@extends('layouts.members')

@section('content')

    <div class="row">
        <div class="col-xs-4">

            <div class="panel panel-primary">
                <div class="panel-heading"><h4>Kemaskini Pengguna</h4></div>
                <div class="panel-body">

                    {!! Form::model($user, ['route' => ['members.admin.profile.update', $user->username], 'method' => 'PATCH']) !!}
                        @include('forms._profile', ['submitButton' => 'Kemaskini Pengguna'])
                    {!! Form::close() !!}

                </div>
            </div>

        </div>
    </div>

@stop