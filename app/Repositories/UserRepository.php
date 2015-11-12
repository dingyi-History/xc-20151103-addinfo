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
        return $users->where('dep_id', $dep_id)->Paginate(env('PAGE_ROWS'));
    }

    private function alluser()
    {
        $users = User::with('dep')
            ->select('users.*', 'departments.dep_name')
            ->leftJoin('departments', 'departments.id', '=', 'users.dep_id')
            ->OrderBy('dep_id');
        return $users;
    }
}