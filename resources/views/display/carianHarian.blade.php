<div class="panel panel-primary">
    <div class="panel-heading">
        <h4>Carian</h4>
    </div>
    <div class="panel-body">
        {!! Form::open(['route' => 'members.admin.laporan.harian.carian', 'method' => 'POST']) !!}

        <div class="form-group">
            {!! Form::date('tarikh', \Carbon\Carbon::today()) !!}
        </div>


        <div class="form-group" align="right">
            {!! Form::submit('Cari', ['class' => 'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}
    </div>
</div>