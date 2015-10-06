<?php

namespace App\Http\Controllers\Supervisor;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use Carbon\Carbon;

use App\Http\Requests;
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

        $data[] = null;
        $bil = 1;


        foreach($users as $user)
        {
            //Belum Selesai
            $belumSelesai = Laporan::where('user', $user->username)
                ->where('tarikh', '>=', Carbon::now()->startOfMonth())
                ->where('status', '')
                ->where('status', '!=', 4)
                ->count();
            $user['belumSelesai'] = $belumSelesai;

//            dd(Carbon::now()->startOfMonth());

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
//            dd(Carbon::now()->startOfMonth());

            //Jumlah tugasan bulan sebelum dan belum selesai
            $totalPreviousMonth = Laporan::where('user', $user->username)
                ->where('tarikh', '<', Carbon::now()->startOfMonth())
                ->where('status', '!=', 4)
                ->count();
            $user['totalPreviousMonth'] = $totalPreviousMonth;

            //Jumlah Bulan Semasa, KIV dan Belum Selesai
            $grandTotal = Laporan::where('user', $user->username)
                ->where('status', '!=', 4)
                ->where('status', '!=', 0)
                ->count();
            $user['grandTotal'] = $grandTotal;
//            var_dump($user->toArray());
        }

//        dd($users->toArray());

        return View('members.supervisor.laporan.terkini', compact('bil', 'users'));
    }

    public function detailsTerkini($username, $status)
    {
        $laporans = null;

        if($status == '0')
        {
            $status = 'Belum Selesai';
            $laporans = Laporan::where('user', $username)
                ->where('tarikhSiap', 'like', '0000-00-00%')
                ->where('tarikh', 'like', Carbon::now()->format('Y-m') . '%')
                ->where('status', '!=', 4)
                ->where('status', '')
//                ->earliest()
                ->get();

        } else if($status == 'totalCurrent') {
            $laporans = Laporan::where('user', $username)
                ->where('tarikhSiap', 'like', '0000-00-00%')
                ->where('tarikh', 'like', Carbon::now()->format('Y-m') . '%')
                ->get();

        } else if($status == 'totalBefore') {
            $laporans = Laporan::where('user', $username)
                ->where('tarikh', '<', Carbon::now()->startOfMonth())
                ->where('status', '!=', 4)
                ->get();

        } else if($status == 'grandTotal') {
            $laporans = Laporan::where('user', $username)
                ->where('status', '!=', 4)
                ->where('status', '!=', 0)
                ->get();
        } else {
            $laporans = Laporan::where('user', $username)
                ->where('tarikhSiap', 'like', '0000-00-00%')
                ->where('tarikh', 'like', Carbon::now()->format('Y-m') . '%')
                ->where('status', $status)
                ->get();

        }

//        dd($laporans);
        $user = User::where('username', $username)->first();
        $user = $user->nama;
        $month = Carbon::now()->format('m-Y');

        $bil = 1;

        return View('members.supervisor.laporan.detailsTerkini', compact('bil', 'laporans', 'user', 'status', 'month'));
    }
}













