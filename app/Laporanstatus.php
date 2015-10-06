<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laporanstatus extends Model
{
    protected $table = 'laporanstatus';

    protected $fillable = ['nama'];

    public $timestamps = false;


}
