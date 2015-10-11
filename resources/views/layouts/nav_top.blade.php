<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">e-Maintenance</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('complaint') }}">Aduan Sistem</a></li>
                <li><a href="#">Mesej</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Laporan <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        @if(Auth::user()->level_id == 2 || Auth::user()->level_id == 1)
                            <li><a href="{{ route('members.supervisor.laporan.terkini') }}">Ringkasan Terkini</a></li>
                            <li><a href="{{ route('members.supervisor.pelbagai') }}">Pelbagai</a></li>
                        @endif
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Tetapan <span class="caret"></span></a>
                    <ul class="dropdown-menu">

                        @if(Auth::user()->level_id <= 1)
                            <li><a href="{{ route('members.admin.profile.index') }}">Pengguna</a></li>
                            <li><a href="{{ url('/members/admin/angular') }}">AngularJS</a></li>
                        @endif
                        <li><a href="{{ route('self-profile') }}">Profile Peribadi</a></li>
                        <li><a href="{{ route('password') }}">Kata Laluan</a></li>
                        <li><a href="#">Tetapan 3</a></li>
                        <li><a href="#">Tetapan 4</a></li>
                    </ul>
                </li>
                @if(Auth::user()->level_id <= 1)
                    <li><a href="{{ route('members.admin.carian') }}">Carian</a></li>
                @endif
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="{{ URL::route('logout') }}">
                        <button class="btn btn-danger">Logout <small> [ {{ Auth::user()->username }} ]</small>
                            <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>
                        </button>
                    </a>
                </li>
            </ul>
        </div><!--/.nav-collapse -->
    </div><!--/.container-fluid -->
</nav>