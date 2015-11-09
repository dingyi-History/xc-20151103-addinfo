<?php
/**
 * Created by PhpStorm.
 * User: dingyiming
 * Date: 15/11/8
 * Time: 上午4:45
 */
namespace App\Repositories;

use App\User;

interface UserRepositoryInterface
{
    //权限1:查询所有员工信息
    public function getAllUser();

    //权限2:查询部门员工信息
    public function getDepUser($id);
}