<?php

namespace App\Http\Controllers;

use App\Userinfo;

class ValidController extends Controller
{

    public function onephone()
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
        $user = Userinfo::all();
        return $user->toJson();
    }

    public function oneidentity(Request $request)
    {
        return 'ok';
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
