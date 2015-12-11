<?php

namespace App\Api\Controllers;

use App\Api\Controllers;
use App\Http\Requests\Request;
use App\Tag;
use Illuminate\Support\Facades\Input;

class TagController extends BaseController
{
    //获取标签
    public function taglist()
    {
        $res = Tag::lists('name', 'id');

        $data = [];
        foreach ($res as $key => $value) {
            $arr = array('id' => $key, 'text' => $value);
            array_push($data, $arr);
        }
        return $data;
    }

    //存储标签
    public function addtag()
    {
        $tagname = Input::get('tagname');
        if (isset($tagname)) {
            $has = Tag::where('name',$tagname)->get();
            if($has->count() > 0){
                return 0;
            }
            $tag = new Tag();
            $tag->name = $tagname;
            $res = $tag->save();
            if (!empty($res)) {
                return 1;
            }
        }
    }

}
