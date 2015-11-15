<?php

namespace App\Http\Controllers\Technician;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Laporan;

class CetakController extends Controller
{
     public function index()
     {
         $bil = 1;
         $laporans = Laporan::where('user', \Auth::user()->username)
             ->where('status', '')
             ->orWhere('status', 0)
             ->get();

         \Session::put('lastReport', \Route::currentRouteName());

         return View('members.technician.laporan.cetak.index', compact('bil', 'laporans'));
     }
}
