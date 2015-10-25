<?php

namespace App\Http\Controllers\Supervisor;

use App\Cawangan;
use App\Laporanstatus;
use App\Peralatan;
use Illuminate\Support\Facades\Redirect;

use Carbon\Carbon;

use Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Laporan;
use Auth;

class LaporanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $aduans = Laporan::latest('tarikh')->unassigned()->get();
        $users  = User::assignment()->lists('nama', 'username');
        $bil = 1;

        return View('members.supervisor.index', compact('aduans', 'users', 'bil'));
    }

    public function update($id)
    {
        $validation = \Validator::make(\Input::all(), [
            'user'      => 'required'
        ]);

        if($validation->fails())
        {
            return Redirect::back()->withErrors($validation);
        } else {

            $laporan = Laporan::findOrFail($id);

            $laporan->fill(\Input::all());

            if($laporan->save())
                \Session::flash('success', 'Laporan telah dikemaskini');
            else
                \Session::flash('error', 'Laporan gagal dikemaskini');
        }

        Return Redirect::route('members.supervisor.laporan.index');
    }

    public function harian()
    {
        $bil = 1;

        $laporans = Laporan::where('tarikh', 'like', Carbon::today()->format('Y-m-d') . '%')
            ->latest('tarikh')
            ->get();

        return View('members.supervisor.laporan.harian', compact('bil', 'laporans'));
    }

    public function terkini()
    {
        $users = User::where('unit', Auth::user()->unit)
            ->where('level_id', 3)
            ->where('status', 1)
            ->get();

        if(Auth::user()->level->id == 1)
        {
            $users = User::where('status', 1)
                ->where('level_id', '>', 1)
                ->get();
        }

        $data[] = null;
        $bil = 1;

        foreach($users as $user)
        {
            //Belum Selesai
            $belumSelesai = Laporan::where('user', $user->username)
                ->where('tarikh', '>=', Carbon::now()->startOfMonth())
                ->where('status', 0)
                ->count();
            $user['belumSelesai'] = $belumSelesai;

//            dd(Carbon::now()->startOfMonth()->format('Y-m-d'));
//            dd($belumSelesai);

            //KIV
            $kiv = Laporan::where('user', $user->username)
                ->where('tarikh', '>=', Carbon::now()->startOfMonth())
                ->where('status', 3)
                ->count();
            $user['kiv'] = $kiv;

            //Selesai
            $selesai = Laporan::where('user', $user->username)
                ->where('tarikh', '>=', Carbon::now()->startOfMonth())
                ->where('status', 4)
                ->count();
            $user['selesai'] = $selesai;

            //Closing
            $closing = Laporan::where('user', $user->username)
                ->where('tarikh', '>=', Carbon::now()->startOfMonth())
                ->where('status', 1)
                ->count();
            $user['closing'] = $closing;

            //Jumlah tugasan current month
            $totalCurrentMonth = Laporan::where('user', $user->username)
                ->where('tarikh', '>=', Carbon::now()->startOfMonth())
                ->count();
            $user['totalCurrentMonth'] = $totalCurrentMonth;

            //Jumlah tugasan bulan sebelum dan belum selesai
            $totalPreviousMonth = Laporan::where('user', $user->username)
                ->where('tarikh', '<', Carbon::now()->startOfMonth())
                ->where('status', '!=', 4)
                ->count();
            $user['totalPreviousMonth'] = $totalPreviousMonth;

            //Jumlah Bulan Semasa, KIV dan Belum Selesai
            $grandTotal = Laporan::where('user', $user->username)
                ->where('status', '!=', 4)
                ->count();
            $user['grandTotal'] = $grandTotal;
        }

        return View('members.supervisor.laporan.terkini', compact('bil', 'users'));
    }

    public function detailsTerkini($username, $status)
    {
        $laporans = null;
        $title = '';

        if($status == '0')
        {
            $status = 'Belum Selesai';
            $laporans = Laporan::where('user', $username)
                ->where('tarikh', 'like', Carbon::now()->format('Y-m') . '%')
                ->where('status', 0)
                ->paginate(10);
            $title = 'Belum Selesai';

//            dd($laporans->toArray());

        } else if($status == 'totalCurrent') {
            $laporans = Laporan::where('user', $username)
                ->where('tarikh', '>=', Carbon::now()->startOfMonth())
                ->where('tarikh', 'like', Carbon::now()->format('Y-m') . '%')
                ->paginate(10);
            $title = '';

        } else if($status == 'totalBefore') {
            $laporans = Laporan::where('user', $username)
                ->where('tarikh', '<', Carbon::now()->startOfMonth())
                ->where('status', '!=', 4)
                ->paginate(10);
            $title = 'Bulan Sebelum';


        } else if($status == 'grandTotal') {
            $laporans = Laporan::where('user', $username)
                ->where('status', '!=', 4)
                ->where('status', '!=', 0)
                ->paginate(10);
            $title = 'Keseluruhan';

        } else {
            $laporans = Laporan::where('user', $username)
                ->where('tarikh', 'like', Carbon::now()->format('Y-m') . '%')
                ->where('status', $status)
                ->paginate(10);

            $status = Laporanstatus::find($status)->nama;
            $title = $status;
        }

        $user = User::where('username', $username)->first();
        $user = $user->nama;
        $month = Carbon::now()->format('m-Y');

        $bil = 1;

        return View('members.supervisor.laporan.detailsTerkini', compact('bil', 'title', 'laporans', 'user', 'status', 'month'));
    }

    public function kemaskini()
    {
        $laporan = Laporan::find(Request::get('id'));
        $cawangan = Cawangan::lists('nama', 'id');
        $peralatan = Peralatan::lists('nama', 'id');

        return View('members.supervisor.laporan.kemaskini', compact('laporan', 'cawangan', 'peralatan'));
    }

    public function update2($id)
    {
        $laporan = Laporan::findOrFail($id);

        $laporan->fill(Request::all());

        if(Request::get('status') == 4)
            $laporan->tarikhSiap = Carbon::now();

        if($laporan->save())
            \Session::flash('success', 'Laporan telah dikemaskini');
        else
            \Session::flash('error', 'Laporan gagal dikemaskini');

        return Redirect::route('members.supervisor.laporan.terkini');

    }
}













