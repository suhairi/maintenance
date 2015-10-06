<?php

namespace App\Http\Controllers\Supervisor;

//use Illuminate\Http\Request;

use App\Cawangan;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Kategori;
use App\Laporan;
use App\Peralatan;
use App\Unit;
use Request;

class PelbagaiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $cawangans = Cawangan::lists('nama', 'id');

        return View('members.supervisor.pelbagai', compact('cawangans'));
    }

    public function harian()
    {
        $bil = 1;
        $laporans = Laporan::where('tarikh', Request::get('tarikh'))
            ->get();

        return View('members.supervisor.laporan.harian', compact('bil', 'laporans'));
    }

    public function bulanan()
    {

        $tarikh = Request::get('year') . '-' . Request::get('month');

        $bil = 1;
        $laporans = Laporan::where('tarikh', 'like', $tarikh .'%')
            ->get();

        return View('members.supervisor.laporan.bulanan', compact('bil', 'laporans'));

    }

    public function bulananPenempatan()
    {
        $tarikh = Request::get('year') . '-' . Request::get('month');
        $count = Array();

        $bil = 1;

        $units = Unit::where('nama', \Auth::user()->units->nama);

        foreach($units as $unit)
        {
            $categories = Kategori::where('id', $unit->unit)
                ->where('status', 'active')
                ->get();

            foreach($categories as $category)
            {
                $peralatans = Peralatan::where('kategori_id', $category->id)
                    ->get();

                foreach($peralatans as $peralatan)
                {
                    $laporans = Laporan::where('peralatan_id', $peralatan->id)
                        ->count();

                    dd($laporans);
                }
            }
        }

        return View('members.supervisor.laporan.bulananPenempatan', compact('bil', 'laporans'));

    }


}
