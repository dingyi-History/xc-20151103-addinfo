<?php
/**
 * Created by PhpStorm.
 * User: dingyiming
 * Date: 15/11/8
 * Time: 上午2:55
 */
namespace App\Repositories;

use App\Department;
use App\User;
use App\Userinfo;

class UserinfoRepository implements \App\Repositories\UserinfoRepositoryInterface
{

    public function selectAll()
    {
        return Userinfo::ordered()->Paginate(env('PAGE_ROWS'));
    }

    public function selectDep($dep_id)
    {
        return Department::findOrFail($dep_id)->userinfos()->ordered()->Paginate(env('PAGE_ROWS'));
    }

    public function selectMe($user_id)
    {
        return User::find($user_id)->userinfos()->ordered()->Paginate(env('PAGE_ROWS'));
    }

    public function selectOneUserinfo($id)
    {
        return Userinfo::find($id);
    }

    public function search($field, $data)
    {
        return Userinfo::where($field, 'like', '%' . $data . '%')->ordered()->Paginate(env('PAGE_ROWS'));
    }


}