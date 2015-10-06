<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bahagian extends Model
{
    protected $table = 'bahagian';

    protected $fillable = ['nama'];

    public $timestamps = false;


    public function user() {
        return $this->hasMany('App\User');
    }

    public function cawangan()
    {
        return $this->hasMany('App\Cawangan');
    }
}
