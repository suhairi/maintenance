<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    protected $table = 'laporan';

    protected $fillable = ['tarikh', 'nama', 'pelapor', 'cawangan_id', 'peralatan_id', 'noSiri',
        'pemilik', 'ringkasanKerosakan', 'user', 'tarikhSiap', 'noJobsheet', 'status',
        'catatan', 'created_at', 'updated_at'];

    protected $dates = ['tarikh', 'tarikhSiap'];

    public function cawangan() {
        return $this->belongsTo('App\Cawangan');
    }

    public function peralatan() {
        return $this->hasOne('App\Peralatan', 'id', 'peralatan_id');
    }

    public function users() {
        return $this->hasOne('App\User', 'username', 'user');
    }

    public function laporanstatus()
    {
        return $this->hasOne('App\Laporanstatus', 'id', 'status');
    }

    public function scopeToday($query)
    {
        $query->where('tarikh', \Carbon\Carbon::today());
    }

    public function scopeUnassigned($query)
    {
        //use by supervisor
        $query->where('user', null);
    }

    public function scopeAssigned($query)
    {
        // will be use by the technician
        $query->where('user', \Auth::user()->username);
    }
}
