@if(Session::has('error'))

    <div class="alert alert-danger">
        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
        {{ Session::get('error') }}
    </div>
@endif

@if(Session::has('success'))

    <div class="alert alert-success">
        <span class="glyphicon glyphicon glyphicon-ok" aria-hidden="true"></span>
        {{ Session::get('success') }}
    </div>
@endif