<?php

namespace App\Http\Controllers\Technician;

use Illuminate\Http\Request;

use Carbon\Carbon;

use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use App\Http\Controllers\Controller;
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
        $bil = 1;
        $laporans = Laporan::where('user', Auth::user()->username)
            ->where('status', '')
            ->get();

        \Session::put('lastReport', \Route::currentRouteName());

        return View('members.technician.index', compact('bil', 'laporans'));
    }

    public function edit($id)
    {
        $laporan = Laporan::findOrFail($id);

        return View('members.technician.laporanEdit', compact('laporan'));
    }

    public function update($id)
    {
        $laporan = Laporan::findOrFail($id);


        $laporan->fill(\Input::all());

        if($laporan->save())
            \Session::flash('success', 'Kemaskini Laporan berjaya');
        else
            \Session::flash('fail', 'Kemaskini Laporan gagal');

        return Redirect::route(\Session::get('lastReport'));
    }

    public function harian()
    {
        $bil = 1;
        $laporans = Laporan::latest('tarikh')
            ->assigned()
            ->today()
            ->get();

        \Session::put('lastReport', \Route::currentRouteName());

        return View('members.technician.harian', compact('bil', 'laporans'));
    }

    public function carian()
    {
        $tarikh = Carbon::parse(\Input::get('tarikh'));

        $bil = 1;
        $laporans = Laporan::latest('tarikh')
            ->where('tarikh', 'like', $tarikh . '%')
            ->where('user', Auth::user()->username)
            ->latest('tarikh')
            ->get();

//        dd($laporans);

        return View('members.technician.carian', compact('bil', 'laporans', 'tarikh'));
    }
}
