<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'tags';
    protected $fillable = ['name'];

    public function userinfos()
    {
        return $this->belongsToMany('App\Userinfo','info_tag')->withTimestamps();;
    }
}
