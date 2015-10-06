<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aduan extends Model
{
    protected $table = 'aduan';

    protected $fillable = ['username', 'complaint', 'reply', 'replied', 'created_at', 'updated_at'];
}
