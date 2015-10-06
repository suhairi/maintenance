<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Userstatus extends Model
{
    protected $table = 'userstatus';

    protected $fillable = ['nama'];

    public $timestamps = false;


    public function user()
    {
        return $this->belongsTo('App\User', 'id', 'status');
    }
}
