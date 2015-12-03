<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Userinfo extends Model
{
    protected $table = 'userinfos';

    protected $fillable = [
        'phone',
        'name',
        'email',
        'identity',
        'sex',
        'relationship_status',
        'sex_orietation',
        'income_level',
        'blood_type',
        'birthday',
        'residence',
        'hometown',
        'degree',
        'school',
        'major',
        'profession',
        'qq',
        'weibo',
        'weixin',
        'source',
        'user_id',
        'screen_name',
        'address',
        'addman_id',
        'remark'
    ];

    //多个信息对应一个录入信息的人
    public function user()
    {
        return $this->belongsTo('App\User', 'addman_id', 'id');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag', 'info_tag');
    }

    public function getTagListAttribute()
    {
        return $this->tags->lists('id')->all();
    }

    //格式化生日时间
    public function setBirthdayAttribute($birthday)
    {
        return $this->attributes['birthday'] = Carbon::createFromFormat('Y-m-d', $birthday);
    }

    //userinfo按照用户ID倒序
    public function scopeOrdered($query)
    {
        $query->OrderBy('userinfos.id', 'desc');
    }


}
