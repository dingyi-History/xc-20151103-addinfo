<?php

namespace App\Api\Controllers;

use App\Userinfo;

class ValidateController extends BaseController
{

    public function onephone(Request $request)
    {
        //$phone = $request->input('phone');
        // $res = Userinfo::where('phone',$phone)->get();
        // if($res)
        // {
        //     //存在一样的手机号
        // }else{
        //     //不存在一样的手机号
        //
        // }
        return Userinfo::all();

    }

    public function oneidentity(Request $request)
    {
        $identity = $request->input('identity');
        $res = Userinfo::where('identity',$identity)->get();
        if($res)
        {
            //存在同样地身份证号

        }else{
            //不存在同样地身份证号
        }
    }


}
