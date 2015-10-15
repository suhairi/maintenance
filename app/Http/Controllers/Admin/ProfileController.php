<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PenggunaStoreRequest;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Bahagian;
use App\Cawangan;
use App\Level;
use App\Unit;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        // List of Pengguna Sistem
        $bil = 1;

        $users = User::orderBy('status', 'desc')
            ->orderBy('level_id', 'asc')->get();

        $bahagian   = Bahagian::lists('nama', 'id');
        $cawangan   = Cawangan::lists('nama', 'id');
        $level      = Level::lists('nama', 'id');
        $unit       = Unit::lists('nama', 'id');

        return View('members.profile', compact('bil', 'users', 'bahagian', 'cawangan', 'level', 'unit'));
    }

    public function store(PenggunaStoreRequest $request)
    {
        $user = new User;

        $data = [
            'username'      => $request->username,
            'password'      => Hash::make($request->password),
            'nama'          => $request->nama,
            'jawatan'       => $request->jawatan,
            'cawangan_id'   => $request->cawangan_id,
            'level_id'      => $request->level_id,
            'unit'          => $request->unit,
            'status'        => 1

        ];

        if($user->create($data))
            \Session::flash('success', 'Pengguna berjaya didaftar');
        else
            \Session::flash('error', 'Pengguna gagal didaftar');

        Return Redirect::route('members.admin.profile.index');

    }

    public function edit($id)
    {
        $user       = User::findOrFail($id);
        $bahagian   = Bahagian::lists('nama', 'id');
        $cawangan   = Cawangan::lists('nama', 'id');
        $level      = Level::lists('nama', 'id');
        $unit       = Unit::lists('nama', 'id');

        return View('members.admin.pengguna', compact('user', 'bahagian', 'cawangan', 'level', 'unit'));
    }

    public function update(PenggunaStoreRequest $request, $id)
    {

        $user = User::findOrFail($id);

        $user->fill(\Input::all());

        if($user->save())
            \Session::flash('success', 'Pengguna telah dikemaskini');
        else
            \Session::flash('error', 'Pengguna gagal dikemaskini');

        return Redirect::route('members.admin.profile.index');
    }

    public function destroy($username)
    {
        $user = User::where('username', $username)->first();

        if($user->delete())
            \Session::flash('success', 'Pengguna ' . $username . ' telah dihapus.');
        else
            \Session::flash('error', 'Pengguna ' . $username . ' gagal dihapus.');

        return \Redirect::route('members.admin.profile.index');

    }

    public function activate()
    {
        $user = User::findOrFail(\Input::get('id'));
        $user->fill(\Input::all());

        if($user->save())
            \Session::flash('success', 'Status pengguna telah dikemaskini');
        else
            \Session::flash('error', 'Status pengguna gagal dikemaskini');

        return \Redirect::route('members.admin.profile.index');
    }

    public function getUsers()
    {
        $users = User::get();
        $users = $users->toArray();

        return \Response::json($users);
    }
}
