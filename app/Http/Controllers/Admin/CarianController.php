<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

use App\Laporan;
use App\Bahagian;
use App\Cawangan;
use App\Laporanstatus;
use Illuminate\Support\Facades\Session;


class CarianController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function carian()
    {
        $cawangan       = Cawangan::lists('nama', 'id');
        $laporanstatus  = Laporanstatus::lists('nama', 'id');
        $tarikh         = \Carbon\Carbon::now()->format('Y-m');

        return View('members.admin.carian', compact('cawangan', 'laporanstatus', 'tarikh'));
    }

    public function hasilCarian()
    {
        $bil = 1;

        if(Session::has('tarikh')) {
            $tarikh = Session::get('tarikh');
        } else {
            Session::put('tarikh', \Carbon\Carbon::parse(Input::get('tarikh'))->format('Y-m'));
            $tarikh = Session::get('tarikh');
        }


//        dd($tarikh);

        $laporans = Laporan::where('cawangan_id', Input::get('cawangan_id'))
            ->where('tarikh', 'like', $tarikh . '%')
            ->where('status', Input::get('status'))
            ->paginate(10);

        return View('members.admin.hasilCarian', compact('bil', 'laporans'));
    }
}
