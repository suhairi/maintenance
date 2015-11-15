<?php

namespace App\Http\Controllers\Technician;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Laporan;
use App\User;
use Illuminate\Support\Facades\Auth;

class CetakController extends Controller
{
    public function index()
    {
        $bil = 1;
        $laporans = Laporan::where('user', \Auth::user()->username)
            ->where('status', 0)
            ->get();

        \Session::put('lastReport', \Route::currentRouteName());

        return View('members.technician.laporan.cetak.index', compact('bil', 'laporans'));
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

        return View('members.supervisor.laporan.cetak.terkini', compact('bil', 'users'));
    }


}
