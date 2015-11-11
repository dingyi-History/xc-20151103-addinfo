<?php
/**
 * Created by PhpStorm.
 * User: dingyiming
 * Date: 15/11/8
 * Time: 上午4:45
 */
namespace App\Repositories;

use App\User;
use Illuminate\Support\Facades\Crypt;

class UserRepository implements UserRepositoryInterface
{
    public function getAllUser()
    {
        return $users = User::OrderBy('dep_id')->Paginate(env('PAGE_ROWS'));
    }

    public function getDepUser($dep_id)
    {
        return User::where('dep_id', $dep_id)->Paginate(env('PAGE_ROWS'));
    }
}