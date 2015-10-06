<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cawangan extends Model
{
    protected $table = 'cawangan';

    protected $fillable = ['nama', 'bahagian_id'];

    public $timestamps = false;

    public function bahagian() {
        return $this->belongsTo('App\Bahagian', 'bahagian_id', 'id');
    }
}
