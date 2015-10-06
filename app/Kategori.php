<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategori';

    protected $fillable = ['nama', 'status', 'unit'];

    public $timestamps = false;

    public function peralatan() {
        return $this->belongsTo('App\Peralatan');
    }

    public function units()
    {
        return $this->hasOne('App\Unit', 'id', 'unit');
    }
}
