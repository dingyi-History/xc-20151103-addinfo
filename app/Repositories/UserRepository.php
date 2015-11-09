<?php
/**
 * Created by PhpStorm.
 * User: dingyiming
 * Date: 15/11/8
 * Time: 上午4:45
 */
namespace App\Repositories;

use App\User;

class UserRepository implements UserRepositoryInterface
{
    public function getAllUser()
    {
        return User::OrderBy('dep_id')->Paginate(env('PAGE_ROWS'));
    }

    public function getDepUser($id)
    {
        return User::find($id)->dep()->GroupBy('dep_id')->Paginate(env('PAGE_ROWS'));
    }

}