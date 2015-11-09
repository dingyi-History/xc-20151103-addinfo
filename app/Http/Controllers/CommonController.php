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
    protected $statusCode = 200;

    //反馈状态码
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
        return $this;
    }

    //404错误
    public function responseNotFound($msg = 'Not Found')
    {
        return $this->resjson($msg);
    }

    //返回错误
    public function responseError($msg)
    {
        return $this->responese([
            'status' => 'failed',
            'status_code' => $this->getStatusCode(),
            'msg' => $msg
        ]);
    }

    //返回成功
    public function responseSuccess($data,$msg = 'ok')
    {
        return $this->responese([
            'status_code' => $this->statusCode,
            'status' => 'success',
            'msg' => $msg,
            'data' => $data
        ]);
    }
    //json响应
    public function responese($data)
    {
        return \Response::json($data);
    }
}