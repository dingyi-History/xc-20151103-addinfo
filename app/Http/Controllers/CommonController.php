<?php
/**
 * Created by PhpStorm.
 * User: dingyiming
 * Date: 15/11/3
 * Time: 下午6:24
 */

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Userinfo;


class CommonController extends Controller
{
    //反馈结果
    public function responseResult($res, $req, $msg0, $msg1, $url)
    {
        if ($res) {
            $req->session()->flash('status1', $msg1);
        } else {
            $req->session()->flash('status0', $msg0);
        }
        return redirect($url);
    }
}