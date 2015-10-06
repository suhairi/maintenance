<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Carbon\Carbon;

use App\Laporan;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class LaporanController extends Controller
{
    public function harian()
    {
        $bil = 1;

        $laporans = Laporan::where('tarikh', 'like', Carbon::today()->format('Y-m-d') . '%')
            ->latest('tarikh')
            ->get();

        return View('members.admin.laporan.harian', compact('bil', 'laporans'));
    }

    public function carian()
    {
        $bil = 1;
        $tarikh = Carbon::parse(\Input::get('tarikh'));

        $laporans = Laporan::where('tarikh', $tarikh)
            ->latest('tarikh')
            ->get();

        return View('members.admin.laporan.carian', compact('bil', 'laporans', 'tarikh'));
    }
}
