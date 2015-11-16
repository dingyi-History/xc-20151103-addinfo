<?php

namespace App\Api\Controllers;

use App\Userinfo;
use App\Api\Controllers;
use Illuminate\Http\Request;

class ValidController extends BaseController
{
    //验证手机号的唯一性
    public function onephone($phone)
    {
        $res = Userinfo::where('phone', $phone)->get();
        return $this->result($res);
    }

    //验证身份证唯一性
    public function oneidentity($identity)
    {
        $res = Userinfo::where('identity', $identity)->get();
        return $this->result($res);
    }

    private function result($res)
    {
        if (count($res) == 0) {
            return 0;
        } else {
            return 1;
        }
    }

}
