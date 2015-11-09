<?php

namespace App\Http\Controllers;

use App\Department;
use App\Repositories\UserRepositoryInterface;
use App\User;
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
                $users = $this->users->getDepUser($this->auth['id']);
                break;
            default :
                $request->session()->flash('status0', '你没有权限');
                return redirect('/');
        }
        return view('user.index', compact('users'));
    }

    //新建员工的页面
    public function create()
    {
        $deps = $this->getDep();
        return view('user.create', compact('deps'));
    }

    //新建员工
    public function store(Request $request)
    {
        $input = $request->all();
        dd($input);
        $res = User::create($input);
        if ($res) {
            $request->session()->flash('status1', '添加成功');
            return redirect('/users');
        }
    }

    //显示编辑员工
    public function edit($id)
    {
        $user = User::find($id);
        $deps = $this->getDep();
        return view('user.edit', compact('user', 'deps'));
    }

    //更新员工信息
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $res = User::create($input);
        if ($res) {
            $request->session()->flash('status1', '保存成功');
            return redirect('/users');
        }

    }

    //删除员工
    public function destroy($id)
    {
        dd('del');
    }

    //获取部门数据
    private function getDep()
    {
        $department = Department::all();
        foreach ($department as $dep){
            $deps[$dep['dep_name']] =  $dep['dep_name'];
        }
        return $deps;
    }
}
