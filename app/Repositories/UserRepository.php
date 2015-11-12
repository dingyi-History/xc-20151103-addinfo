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
        return $this->alluser()->Paginate(env('PAGE_ROWS'));
    }

    public function getDepUser($dep_id)
    {
        $users = $this->alluser();
        $dep_users = $users->where('dep_id', $dep_id)->Paginate(env('PAGE_ROWS'));
        return $dep_users;
    }

    private function alluser()
    {
        $users = User::with('dep')
            ->leftJoin('departments', 'departments.id', '=', 'users.dep_id')
            ->OrderBy('dep_id');
        return $users;
    }
}