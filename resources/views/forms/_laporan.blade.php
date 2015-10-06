<div class="form-group">
    {!! Form::input('date', 'tarikh', date('Y-m-d'), ['class' => 'form-control', 'placeholder' => 'Tarikh', 'readonly' => 'true']) !!}
</div>

<div class="form-group">
    {!! Form::text('nama', Auth::user()->nama, ['class' => 'form-control', 'placeholder' => 'Nama', 'readonly' => 'true']) !!}
</div>

<div class="form-group">
    {!! Form::text('pelapor', null, ['class' => 'form-control', 'placeholder' => 'Pelapor']) !!}
</div>

<div class="form-group">
    {!! Form::text('pemilik', null, ['class' => 'form-control', 'placeholder' => 'Pemilik']) !!}
</div>

<div class="form-group">
    {!! Form::select('cawangan_id', $cawangan, null, ['class' => 'form-control', 'placeholder' => 'Cawangan']) !!}
</div>

<div class="form-group">
    {!! Form::select('peralatan_id', $peralatan, null, ['class' => 'form-control', 'placeholder' => 'Peralatan / Kerosakan']) !!}
</div>

<div class="form-group">
    {!! Form::text('noSiri', null, ['class' => 'form-control', 'placeholder' => 'No Siri']) !!}
</div>

<div class="form-group">
    {!! Form::textarea('ringkasanKerosakan', null, ['class' => 'form-control', 'placeholder' => 'Ringkasan Kerosakan', 'rows' => '4']) !!}
</div>

<div class="form-group" align="right">
    {!! Form::submit($submitButton, ['class' => 'btn btn-primary']) !!}
</div>






