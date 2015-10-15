<div class="panel panel-primary">
    <div class="panel-heading">
        <h1>Profil Peribadi</h1>
    </div>
    <div class="panel-body">
        <table class="table">
            <tr>
                <th>Nama</th>
                <td>{{ Auth::user()->nama }}</td>
            </tr>
            <tr>
                <th>Bahagian / Cawangan</th>
                <td>{{ Auth::user()->cawangan->bahagian->nama }} / {{ Auth::user()->cawangan->nama }}</td>
            </tr>
            <tr>
                <th>Jawatan</th>
                <td>{{ Auth::user()->nama }}</td>
            </tr>
            <tr>
                <th>Level Pengguna</th>
                <td>{{ Auth::user()->level->nama }} <br /> {{ Auth::user()->units->nama }}</td>
            </tr>
            <tr>
                <th>Status</th>
                <td>{{ Auth::user()->userstatus->nama }}</td>
            </tr>

        </table>
    </div>
</div>