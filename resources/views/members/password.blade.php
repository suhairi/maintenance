@extends('layouts.members')

@section('content')

    <div class="row">
        <div class="col-xs-4">

            @include('errors.form_error')
            @include('layouts.notifications')

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3>Tukar Kata Laluan</h3>
                </div>
                <div class="panel-body">
                    {!! Form::open() !!}
                    <div class="form-group">
                        {!! Form::label('old', 'Kata Laluan Lama : ') !!}
                        {!! Form::text('old', null, ['class' => 'form-control', 'placeholder' => 'Kata Laluan Lama']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('new', 'Kata Laluan Baru : ') !!}
                        {!! Form::password('new', ['class' => 'form-control', 'placeholder' => 'Kata Laluan Baru']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('confirmation', 'Sekali lagi : ') !!}
                        {!! Form::password('confirmation',['class' => 'form-control', 'placeholder' => 'Sekali lagi']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::submit('Tukar kata laluan', ['class' => 'btn btn-primary']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>

            </div>





        </div>

    </div> {{-- end of row --}}

@stop