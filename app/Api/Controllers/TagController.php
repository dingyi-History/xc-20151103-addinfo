<?php

namespace App\Api\Controllers;

use App\Api\Controllers;
use App\Http\Requests\Request;
use App\Tag;

class TagController extends BaseController
{
    //获取标签
    public function taglist()
    {
        $res = Tag::lists('name', 'id');

        $data = [];
        foreach($res as $key => $value)
        {
            $arr = array('id' => $key,'text' => $value);
            array_push($data,$arr);
        }
        return $data;
    }

    //存储标签
    public function addtag()
    {
        return 'ok';
    }

}
