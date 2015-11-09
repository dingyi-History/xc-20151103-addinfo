<?php

namespace App\Http\Controllers;

use App\Repositories\UserinfoRepositoryInterface;
use App\User;
use App\Userinfo;
use Illuminate\Http\Request;
use App\Transformer\UserinfoTransformer;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class UserinfosController extends CommonController
{
    protected $user;
    protected $userinfos;

    //验证是否登录,并获取用户ID
    public function __construct(UserinfoRepositoryInterface $u)
    {
        $this->user = Auth::user();
        $this->userinfos = $u;
    }

    //分权限显示用户信息
    public function index(Request $req)
    {
        $datas = null;
        switch ($req) {
            case $req->user()->can('see-all'):
                $datas = $this->userinfos->selectAll();
                break;
            case $req->user()->can('see-dep'):
                $datas = $this->userinfos->selectDep($this->user['dep_id']);
                break;
            case $req->user()->can('see-me'):
                $datas = $this->userinfos->selectMe($this->user['id']);
                break;
            default:
                break;
        }

        if ($datas) return view('userinfo.index', compact('datas'));
        return $this->responseResult(null, $req, '查询失败', null, '');
    }

    //显示信息录入页面
    public function create()
    {
        $data = $this->selectData();
        return view('userinfo.create', compact('data'));
    }

    //存储录入的信息
    public function store(Requests\UserinfoRequest $req)
    {
        $input = $req->all();
        $input['addman_id'] = $this->user['id'];
        $res = Userinfo::create($input);
        return $this->responseResult($res, $req, '存储失败', '保存成功', '');
    }

    //显示对应信息详情
    public function show(Request $req, $id)
    {
        $userinfo = $this->userinfos->selectOneUserinfo($id);

        if ($userinfo) return view('userinfo.show', compact('userinfo'));
        return $this->responseResult(null, $req, '查询失败', null, '');
    }

    //编辑页面
    public function edit(Request $req, $id)
    {
        $userinfo = $this->userinfos->selectOneUserinfo($id);
        $data = $this->selectData();

        if ($userinfo) return view('userinfo.edit', compact('userinfo', 'data'));
        return $this->responseResult(null, $req, '查询失败', null, $id);
    }

    //更新信息
    public function update(Requests\UserinfoRequest $req, $id)
    {
        $res = $this->userinfos->selectOneUserinfo($id)->update($req->all());
        return $this->responseResult($res, $req, '保存失败', '保存成功', $id);
    }

    //删除信息
    public function destroy(Request $req, $id)
    {
        $res = $this->userinfos->selectOneUserinfo($id)->delete();
        return $this->responseResult($res, $req, '删除失败', '删除成功', '');
    }

    //反馈结果
    private function responseResult($res, $req, $msg0, $msg1, $url)
    {
        if ($res) {
            $req->session()->flash('status1', $msg1);
        } else {
            $req->session()->flash('status0', $msg0);
        }
        return redirect('userinfo/' . $url);
    }

    //下拉框参数
    private function  selectData()
    {
        $status = array('未知' => '未知', '单身' => '单身', '恋爱' => '恋爱', '订婚' => '订婚', '已婚' => '已婚', '离异' => '离异', '丧偶' => '丧偶');
        $orietation = array('未知' => '未知', '男性' => '男性', '女性' => '女性', '双性' => '双性');
        $income = array('未知' => '未知', '穷人' => '穷人', '低收入' => '低收入', '中等收入' => '中等收入', '高收入' => '高收入', '富人' => '富人');
        $blood = array('未知' => '未知', 'A' => 'A', 'B' => 'B', 'AB' => 'AB', 'O' => 'O');
        $sex = array('未知' => '未知', '男' => '男', '女' => '女');

        $data['status'] = $status;
        $data['orietation'] = $orietation;
        $data['income'] = $income;
        $data['blood'] = $blood;
        $data['sex'] = $sex;

        return $data;
    }

}
