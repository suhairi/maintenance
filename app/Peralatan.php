<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peralatan extends Model
{
    protected $table = 'peralatan';

    protected $fillable = ['nama', 'kategori_id'];

    public $timestamps = false;

    public function laporan() {
        return $this->hasMany('App\Laporan');
    }

    public function kategori() {
        return $this->hasOne('App\Kategori', 'id', 'kategori_id');
    }
}
