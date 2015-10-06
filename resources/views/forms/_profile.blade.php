@if(Route::current()->getName() == 'members.admin.profile.index')
    <div class="form-group">
        {{--{!! Form::label('Username', 'Kata Nama : ') !!}--}}
        {!! Form::text('username', null, ['class' => 'form-control', 'placeholder' => 'Kata Nama']) !!}
    </div>
@endif

@if(Route::current()->getName() == 'members.admin.profile.edit')
    <div class="form-group">
        {{--{!! Form::label('Username', 'Kata Nama : ') !!}--}}
        {!! Form::text('username', null, ['class' => 'form-control', 'placeholder' => 'Kata Nama', 'readonly' => 'true']) !!}
    </div>
@endif

@if(Route::current()->getName() == 'members.admin.profile.index')

    <div class="form-group">
        {{--{!! Form::label('Password', 'Kata Laluan : ') !!}--}}
        {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Kata Laluan']) !!}
    </div>

    <div class="form-group">
        {{--{!! Form::label('Username', 'Sekali lagi : ') !!}--}}
        {!! Form::password('confirmation',['class' => 'form-control', 'placeholder' => 'Kata Laluan Sekali Lagi']) !!}
    </div>

@endif

<div class="form-group">
    {{--{!! Form::label('nama', 'Nama Penuh : ') !!}--}}
    {!! Form::text('nama', null, ['class' => 'form-control', 'placeholder' => 'Nama Penuh']) !!}
</div>

<div class="form-group">
    {{--{!! Form::label('jawatan', 'Jawatan : ') !!}--}}
    {!! Form::text('jawatan', null, ['class' => 'form-control', 'placeholder' => 'Jawatan']) !!}
</div>

@if(Route::current()->getName() == 'members.admin.profile.index')

    <div class="form-group">
        {{--{!! Form::label('Bahagian', 'Bahagian : ') !!}--}}
        {!! Form::select('bahagian_id', $bahagian, 0, ['class' => 'form-control', 'placeholder' => 'Bahagian', 'disabled' => 'true']) !!}
    </div>

    <div class="form-group">
        {{--{!! Form::label('cawangan', 'Cawangan : ') !!}--}}
        {!! Form::select('cawangan_id', $cawangan, null, ['class' => 'form-control', 'placeholder' => 'Cawangan']) !!}
    </div>

    <div class="form-group">
        {{--{!! Form::label('Level', 'Level Pengguna : ') !!}--}}
        {!! Form::select('level_id', $level, null, ['class' => 'form-control', 'placeholder' => 'Level']) !!}
    </div>

    <div class="form-group">
        {{--{!! Form::label('Level', 'Level Pengguna : ') !!}--}}
        {!! Form::select('unit', $unit, null, ['class' => 'form-control', 'placeholder' => 'Unit']) !!}
    </div>

@endif

@if(Route::current()->getName() == 'members.admin.profile.edit')

    <div class="form-group">
        {{--{!! Form::label('Bahagian', 'Bahagian : ') !!}--}}
        {!! Form::select('bahagian', $bahagian, $user->cawangan->bahagian->id, ['class' => 'form-control', 'placeholder' => 'Bahagian', 'disabled' => 'true']) !!}
    </div>

    <div class="form-group">
        {{--{!! Form::label('cawangan', 'Cawangan : ') !!}--}}
        {!! Form::select('cawangan_id', $cawangan, $user->cawangan_id, ['class' => 'form-control', 'placeholder' => 'Cawangan']) !!}
    </div>

    <div class="form-group">
        {{--{!! Form::label('Level', 'Level Pengguna : ') !!}--}}
        {!! Form::select('level_id', $level, $user->level_id, ['class' => 'form-control', 'placeholder' => 'Level']) !!}
    </div>

    <div class="form-group">
        {{--{!! Form::label('Level', 'Level Pengguna : ') !!}--}}
        {!! Form::select('unit', $unit, $user->unit, ['class' => 'form-control', 'placeholder' => 'Unit']) !!}
    </div>

@endif

<div class="form-group" align="right">
    {!! Form::submit($submitButton, ['class' => 'btn btn-primary']) !!}
</div>