<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'user';

    protected $primaryKey = 'username';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['username', 'password', 'nama', 'jawatan',
        'cawangan_id', 'level_id', 'status', 'unit', 'remember_token'];

    protected $guarded = ['username', 'password'];

    protected $hidden = ['password', 'remember_token'];

    public $timestamps = false;

    public function cawangan()
    {
        return $this->hasOne('App\Cawangan', 'id', 'cawangan_id');
    }

    public function level()
    {
        return $this->hasOne('App\Level', 'id', 'level_id');
    }

    public function aduan()
    {
        return $this->hasMany('App\Aduan', 'id', 'username');
    }

    public function userstatus()
    {
        return $this->hasOne('App\Userstatus', 'id', 'status');
    }

    public function units()
    {
        return $this->hasOne('App\Unit', 'id', 'unit');
    }

    public function scopeAssignment($query)
    {
        $query->where('unit', \Auth::user()->unit)->where('status', '1')->where('level_id', 3);
    }

    public function getNama($username)
    {
        $user = User::where('username', $username)->first();

        return $user->nama;
    }
}
