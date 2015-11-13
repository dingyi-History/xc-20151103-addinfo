<?php

namespace App\Api\Controllers;

use App\Userinfo;

class ValidateController extends BaseController
{

    public function onephone(Request $request)
    {
        //$phone = $request->input('phone');
        return Userinfo::all();

    }


}