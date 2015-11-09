<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = 'departments';

    //一个部门对应多个员工账号
    public function users()
    {
        return $this->hasMany('App\User','dep_id','id');
    }

    public function userinfos()
    {
        //hasManyThrough方法第一个为最终模型,第二个为中间模型,第三个参数是中间模型的外键名,第四个参数是最终模型的外键名
        return $this->hasManyThrough('App\Userinfo', 'App\User','dep_id','addman_id');
    }
}
