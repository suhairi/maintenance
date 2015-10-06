<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\LaporanRequest;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Bahagian;
use App\Cawangan;
use App\Peralatan;
use App\Laporan;

use Carbon\Carbon;

class LaporanController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $cawangan   = Cawangan::lists('nama', 'id');
        $peralatan  = Peralatan::orderBy('nama', 'asc')->lists('nama', 'id');

        $aduans = Laporan::latest('tarikh')->today()->get();
        $bil = 1;

        return View('members.user.index', compact('cawangan', 'peralatan', 'aduans', 'bil'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(LaporanRequest $request)
    {
        $laporan = new Laporan;

        $request->tarikhSiap = Carbon::now();

//        dd($request->all());

        if($laporan->create($request->all()))
            \Session::flash('success', 'Aduan berjaya didaftar');
        else
            \Session::flash('error', 'Aduan gagal didaftar');

        Return Redirect::route('members.user.laporan.index');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $aduan          = Laporan::findOrFail($id);
        $cawangan       = Cawangan::lists('nama', 'id');
        $peralatan      = Peralatan::orderBy('nama', 'asc')->lists('nama', 'id');

        return View('members.user.laporanEdit', compact('aduan', 'cawangan', 'peralatan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(LaporanRequest $request, $id)
    {
        $aduan = Laporan::findOrFail($id);

        $aduan->fill(\Input::all());

        if($aduan->save())
            \Session::flash('success', 'Aduan berjaya dikemaskini');
        else
            \Session::flash('error', 'Aduan gagal dikemaskini');

        return Redirect::route('members.user.laporan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $laporan = Laporan::findOrFail($id);

        if($laporan->delete())
            \Session::flash('success', 'Laporan berjaya dihapus');
        else
            \Session::flash('error', 'Laporan gagal dihapus');

        return Redirect::route('members.user.laporan.index');
    }
}
