<?php

namespace App\Http\Controllers;

use App\Department;
use App\Repositories\UserRepositoryInterface;
use App\User;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

//员工管理
class UsersController extends CommonController
{
    protected $users;
    protected $auth;

    public function __construct(UserRepositoryInterface $users)
    {
        $this->users = $users;
        $this->auth = Auth::user();
    }

    //显示员工管理页面
    public function index(Request $request)
    {
        switch ($request) {
            case $request->user()->can('see-all'):
                $users = $this->users->getAllUser();
                break;
            case $request->user()->can('see-dep'):
                $users = $this->users->getDepUser($this->auth['dep_id']);
                break;
            default :
                return $this->responseResult(null, $request, '你没有权限', '', '/');
        }
        return view('user.index', compact('users'));
    }

    //新建员工的页面
    public function create(Request $request)
    {
        $this->iscan($request);

        $deps = $this->getDep();
        $authority = $this->getAuthority($request);
        return view('user.create', compact('deps', 'authority'));
    }

    //存储新建操作
    public function store(Requests\UsersRequest $request)
    {
        $this->iscan($request);

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $res = User::create($input);
        return $this->responseResult($res, $request, '添加失败', '添加成功', '/users');
    }

    //显示编辑员工
    public function edit(Request $request, $id)
    {
        $this->iscan($request);

        $user = User::find($id);
        $user['password'] = null;
        $deps = $this->getDep();
        $authority = $this->getAuthority($request);
        return view('user.edit', compact('user', 'deps', 'authority'));
    }

    //更新员工信息
    public function update(Requests\UsersRequest $request, $id)
    {
        $this->iscan($request);

        $user = User::find($id);
        $input = $request->all();
        if (isset($input['password']) && $input['password'] != '') {
            $input['password'] = bcrypt($request->input('password'));
        } else {
            $input['password'] = $user['password'];
        }
        $res = $user->update($input);
        return $this->responseResult($res, $request, '保存失败', '保存成功', '/users');
    }

    //删除员工
    public function destroy(Request $request, $id)
    {
        $this->iscan($request);

        $user = User::find($id);
        $res = $user->delete();
        return $this->responseResult($res, $request, '删除失败', '删除成功', '/users');
    }

    //显示密码修改
    public function showreset()
    {
        return view('user.reset');
    }

    //更改密码
    public function updatereset(Request $request)
    {
        $this->validate($request, [
            'old_password' => 'required',
            'new_password' => 'required | confirmed',
        ]);
        $user = User::find($this->auth['id']);
        $input = $request->all();
        $old_pwd0 = $user['password'];
        $old_pwd1 = $input['old_password'];
        if (Hash::check($old_pwd1, $old_pwd0)) {
            $user->password = bcrypt($input['new_password']);
            $res = $user->save();
            return $this->responseResult($res, $request, '修改失败', '修改成功', '/users');
        }
        return $this->responseResult(null, $request, '原密码不正确', '', '/users');
    }

    //判断是否有查看员工的权限
    private function iscan($request)
    {
        if ($request->user()->cannot('see-all') || $request->user()->cannot('see-dep')) {
            return redirect('userinfo');
        }
    }

    //获取部门数据
    private function getDep()
    {
        $department = Department::all();
        foreach ($department as $dep) {
            $deps[$dep['id']] = $dep['dep_name'];
        }
        return $deps;
    }

    //获取权限列表
    private function getAuthority($request)
    {
        $datas = array(
            '2' => '部门管理员',
            '3' => '员工'
        );
        if ($request->user()->can('see-all')) {
            $datas['1'] = '系统管理员';
        }
        return $datas;
    }
}
