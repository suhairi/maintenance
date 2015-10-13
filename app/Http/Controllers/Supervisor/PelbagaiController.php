<?php

namespace App\Http\Controllers\Supervisor;

//use Illuminate\Http\Request;

use App\Bahagian;
use App\Cawangan;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Kategori;
use App\Laporan;
use App\Peralatan;
use App\Unit;
use App\User;
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
        $laporans = Laporan::where('tarikh', 'like', Request::get('tarikh') . '%')
            ->get();

//        dd($laporans->toArray());
//
        return View('members.supervisor.laporan.harian', compact('bil', 'laporans'));
    }

    public function bulanan()
    {
        $tahun = Request::get('year');

         if(Request::get('month') < 10)
             $bulan = '0' . Request::get('month');

        $tarikh = $tahun . '-' . $bulan;

        $bil = 1;
        $laporans = Laporan::where('tarikh', 'like', $tarikh .'%')
            ->paginate(10);

//        dd($laporans);
        return View('members.supervisor.laporan.bulanan', compact('bil', 'laporans'));

    }

    public function bulananPenempatan()
    {
        $dateFrom = Request::get('yearFrom') . '-0' . Request::get('monthFrom') . '-01';
        $dateTo = Request::get('yearTo') . '-' . Request::get('monthTo') . '-31';

        $counts = [];
        $bil = 1;

        $units = Unit::find(\Auth::user()->unit);

        $kategoris = Kategori::where('unit', \Auth::user()->unit)
            ->where('status', 'active')
            ->get();

        $rowspan = [];
        $flag = true;
        foreach($kategoris as $kategori)
        {
            $peralatans = Peralatan::where('kategori_id', $kategori->id)
                ->get();

            foreach($peralatans as $peralatan)
            {
                $count = Laporan::where('tarikh', '>=', $dateFrom)
                    ->where('tarikh', '<=', $dateTo)
                    ->where('peralatan_id', $peralatan->id)
                    ->count();

                array_push($counts, ['kategori' => $kategori->nama, 'peralatan' => $peralatan->nama, 'count' => $count]);


            }
        }

        $bil = 1;
        $jumlah = 0;
        foreach($counts as $count)
        {
            $jumlah += $count['count'];
        }

        return View('members.supervisor.laporan.bulananPenempatan', compact('bil', 'counts', 'units', 'kategoris', 'jumlah'));
    }

    public function tahunanPpk()
    {
        $bil = 1;
        $counts = Array();

        $wilayahs = Bahagian::where('nama', 'like', 'wilayah%')
            ->get();

        foreach($wilayahs as $wilayah)
        {
            $cawangans = Cawangan::where('bahagian_id', $wilayah->id)
                ->where('nama', '!=', 'Wilayah')
                ->get();

            foreach($cawangans as $cawangan)
            {
                $laporans = Laporan::where('cawangan_id', $cawangan->id)
                    ->where('tarikh', 'like', Request::get('year') . '%')
                    ->count();

                $data = ['ppk' => $cawangan->nama, 'bilangan' => $laporans];
                array_push($counts, $data);
            }
        }

        $jumlah = 0;
        foreach($counts as $count)
        {
            $jumlah += $count['bilangan'];
        }

        return View('members.supervisor.laporan.tahunanPpk', compact('bil', 'counts', 'jumlah'));
    }

    public function tahunanXPpk()
    {
        $bil = 1;
        $counts = Array();

        $wilayahs = Bahagian::where('nama', 'not like', 'wilayah%')
            ->get();

        foreach($wilayahs as $wilayah)
        {
            $cawangans = Cawangan::where('bahagian_id', $wilayah->id)
                ->where('nama', '!=', 'Wilayah')
                ->get();

            foreach($cawangans as $cawangan)
            {
                $laporans = Laporan::where('cawangan_id', $cawangan->id)
                    ->where('tarikh', 'like', Request::get('year') . '%')
                    ->count();

                $data = ['ppk' => $cawangan->nama, 'bilangan' => $laporans];
                array_push($counts, $data);
            }
        }

        $jumlah = 0;
        foreach($counts as $count)
        {
            $jumlah += $count['bilangan'];
        }

//        dd($counts);
        return View('members.supervisor.laporan.tahunanXPpk', compact('bil', 'counts', 'jumlah'));
    }

    public function ringkasanPeratusan()
    {
        $tahun = Request::get('year');
        $counts1 = [];
        $counts2 = [];

        for($i=1; $i<=12; $i++)
        {
            if($i<10)
                $bulan = '0' . $i;
            else
                $bulan = $i;

            $tarikh = $tahun . '-' . $bulan;

            // In house
            $users = User::where('jawatan', 'not like', '%vendor%')
                ->where('status', 1)
                ->get();

            $countLess = 0;
            $countGreater = 0;
            $total = 0;
            foreach($users as $user)
            {
                $laporans = Laporan::where('tarikh', 'like', $tarikh.'%')
                    ->where('user', $user->username)
                    ->get();

                foreach($laporans as $laporan)
                {
                    if($laporan->tarikh->diff($laporan->tarikhSiap)->days < 10)
                        $countLess++;
                    else
                        $countGreater++;
                }

                $total = $countLess + $countGreater;
            }

            if($total != 0 || $countLess != 0)
                $peratus = number_format((($countLess / $total) * 100), 2);
            else
                $peratus = '0.00';

            array_push($counts1, ['bulan' => $i, 'countLess' => $countLess,
                'countGreater' => $countGreater, 'total' => $total,
                'peratus' => $peratus
            ]);

            // Vendor

            $users = User::where('jawatan', 'like', '%vendor%')
                ->where('status', 1)
                ->get();

            $countLess = 0;
            $countGreater = 0;
            $total = 0;
            foreach($users as $user)
            {
                $laporans = Laporan::where('tarikh', 'like', $tarikh.'%')
                    ->where('user', $user->username)
                    ->get();

                foreach($laporans as $laporan)
                {
                    if($laporan->tarikh->diff($laporan->tarikhSiap)->days <= 21)
                        $countLess++;
                    else
                        $countGreater++;
                }

                $total = $countLess + $countGreater;
            }

            if($total != 0 || $countLess != 0)
                $peratus = number_format((($countLess / $total) * 100), 2);
            else
                $peratus = '0.00';

            array_push($counts2, ['bulan' => $i, 'countLess' => $countLess,
                'countGreater' => $countGreater, 'total' => $total,
                'peratus' => $peratus
            ]);
        }

        return View('members.supervisor.laporan.ringkasanPeratusan', compact('bil', 'counts1', 'counts2'));
    }


}
