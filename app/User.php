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
    protected $table = 'users';
    protected $fillable = ['email', 'password', 'realname', 'dep_id', 'authority'];
    protected $hidden = ['password', 'remember_token'];

    //一个员工对应多个录入的信息
    public function userinfos()
    {
        return $this->hasMany('App\Userinfo', 'addman_id', 'id');
    }

    //一个员工对应多个录入的记录
    public function addman()
    {
        return $this->hasMany('App\Dolist', 'addman_id', 'id');
    }


    //一个员工属于一个部门
    public function dep()
    {
        return $this->belongsTo('App\Department', 'dep_id', 'id');
    }
}
