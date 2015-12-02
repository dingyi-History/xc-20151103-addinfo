<?php

namespace App\Api\Controllers;

use App\Api\Controllers;
use App\Tag;

class TagController extends BaseController
{
    //获取标签
    public function taglist()
    {
        $res = Tag::lists('name', 'id');
        return $res;
    }

    //存储标签
    public function oneidentity($identity)
    {

    }

}
