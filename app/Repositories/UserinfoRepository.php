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
        return Department::find($dep_id)
            ->userinfos()
            ->ordered()
            ->Paginate(env('PAGE_ROWS'));
    }

    public function selectMe($user_id)
    {
        return User::find($user_id)
            ->userinfos()
            ->ordered()
            ->Paginate(env('PAGE_ROWS'));
    }

    public function selectOneUserinfo($id)
    {
        $userinfo = Userinfo::with('user')
            ->select('userinfos.*', 'users.realname')
            ->leftjoin('users', 'users.id', '=', 'userinfos.addman_id')
            ->where('userinfos.id', $id)
            ->get();
        return $userinfo->first();
    }

    public function search($req, $field, $data)
    {
        switch ($req) {
            case $req->user()->can('see-all'):
                return Userinfo::where($field, 'like', '%' . $data . '%')
                    ->ordered()
                    ->Paginate(env('PAGE_ROWS'));
                break;
            case $req->user()->can('see-dep'):
                $dep_id = $req->user()['dep_id'];
                return Department::findOrFail($dep_id)
                    ->userinfos()
                    ->where($field, 'like', '%' . $data . '%')
                    ->ordered()
                    ->Paginate(env('PAGE_ROWS'));
                break;
            case $req->user()->can('see-me'):
                return Userinfo::where($field, 'like', '%' . $data . '%')
                    ->where('addman_id', $req->user()['id'])
                    ->ordered()
                    ->Paginate(env('PAGE_ROWS'));
                break;
        }
    }
}