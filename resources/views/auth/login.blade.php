@extends('layouts.login')


@section('content')



    <div class="panel panel-success">
        <div class="panel-heading" align="center"><h1>e-Maintenance</h1></div>
        <div class="panel-body">

            @if(Session::has('error'))
                <p class="alert alert-danger">{{ Session::get('error') }}</p>
            @endif

            @if(Session::has('success'))
                <p class="alert alert-success">{{ Session::get('success') }}</p>
            @endif


            <form class="form-signin" method="POST" action=" {{ URL::route('post-login') }}">
                <h2 class="form-signin-heading">Log Masuk</h2>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <label for="inputEmail" class="sr-only">Kata Nama</label>
                <input type="text" name="username" id="inputEmail" value="{{ old('username') }}" class="form-control" placeholder="Kata Nama" required autofocus>
                <label for="inputPassword" class="sr-only">Kata Laluan</label>
                <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Kata Laluan" required>
                <button class="btn btn-lg btn-success btn-block" type="submit">Log Masuk</button>
            </form>

        </div>
    </div>


@stop