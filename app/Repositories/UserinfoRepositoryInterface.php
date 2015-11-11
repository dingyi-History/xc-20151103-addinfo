<?php
/**
 * Created by PhpStorm.
 * User: dingyiming
 * Date: 15/11/8
 * Time: 上午2:50
 */
namespace App\Repositories;

interface UserinfoRepositoryInterface
{
    //权限1 :查询全部录入用户信息
    public function selectAll();

    //权限2 :查询部门录入用户信息
    public function selectDep($dep_id);

    //权限3 :查询自己录入的用户信息
    public function selectMe($user_id);

    //根据$id获取用户信息
    public function selectOneUserinfo($id);

    //搜索姓名手机身份证
    public function search($req,$field, $data);
}