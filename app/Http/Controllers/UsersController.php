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

//员工管理
class UsersController extends Controller
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
                $request->session()->flash('status0', '你没有权限');
                return redirect('/');
        }
        return view('user.index', compact('users'));
    }

    //新建员工的页面
    public function create(Request $request)
    {
        if ($request->user()->can('see-all') || $request->user()->can('see-dep')) {
            $deps = $this->getDep();
            $authority = $this->getAuthority($request);
            return view('user.create', compact('deps', 'authority'));
        } else {
            abort(403);
        }
    }

    //存储新建操作
    public function store(Requests\UsersRequest $request)
    {
        if ($request->user()->can('see-all') || $request->user()->can('see-dep')) {
            $input = $request->all();
            $input['password'] = bcrypt($input['password']);
            $res = User::create($input);
            if ($res) {
                $request->session()->flash('status1', '添加成功');
                return redirect('/users');
            }
        } else {
            abort(403);
        }
    }

    //显示编辑员工
    public function edit(Request $request, $id)
    {
        if ($request->user()->can('see-all') || $request->user()->can('see-dep')) {
            $user = User::find($id);
            $user['password'] = null;
            $deps = $this->getDep();
            $authority = $this->getAuthority($request);
            return view('user.edit', compact('user', 'deps', 'authority'));
        } else {
            abort(403);
        }
    }

    //更新员工信息
    public function update(Requests\UsersRequest $request, $id)
    {
        if ($request->user()->can('see-all') || $request->user()->can('see-dep')) {
            $user = User::find($id);
            $input = $request->all();
            if (isset($input['password']) && $input['password'] != '') {
                $input['password'] = bcrypt($request->input('password'));
            } else {
                $input['password'] = $user['password'];
            }
            $res = $user->update($input);
            if ($res) {
                $request->session()->flash('status1', '保存成功');
                return redirect('/users');
            }
        } else {
            abort(403);
        }

    }

    //删除员工
    public function destroy(Request $request, $id)
    {
        if ($request->user()->can('see-all') || $request->user()->can('see-dep')) {
            $user = User::find($id);
            $res = $user->delete();
            if ($res) {
                $request->session()->flash('status1', '删除成功');
                return redirect('/users');
            }
        } else {
            abort(403);
        }

    }

    //显示密码修改
    public function showreset()
    {
        return view('user.reset');
    }

    //更改密码
    public function updatereset(Request $request)
    {
        $user = User::find($this->auth['id']);
        $input = $request->all();
        $old_pwd0 = $user['password'];
        $old_pwd1 = bcrypt($input['old_password']);//加密新输入的密码
        $new_pwd = $input['new_password'];
        dd($old_pwd1.'<br/>'.$old_pwd0);
        if ($old_pwd0 == $old_pwd1) {
            dd('可以修改密码');
            $res = $user->update($new_pwd);
            if ($res) {
                $request->session()->flash('status1', '修改成功');
                return redirect('/userinfo');
            }
        }
        $request->session()->flash('status0', '修改失败');
        return redirect('/users/resetpwd');
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
