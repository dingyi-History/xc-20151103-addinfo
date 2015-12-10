<?php

namespace App\Http\Controllers;

use App\Dolist;
use App\Info_tag;
use App\Repositories\UserinfoRepositoryInterface;
use App\Tag;
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
        }
        if ($datas) return view('info.index', compact('datas'));
        return $this->responseResult(null, $req, '查询失败', null, 'userinfo');
    }

    //显示信息录入页面
    public function create()
    {
        $data = $this->selectData();
        $tags = Tag::lists('name', 'id');
        return view('userinfo.create', compact('data', 'tags'));
    }

    //存储录入的信息
    public function store(Requests\UserinfoRequest $req)
    {
        $input = $req->all();
        $input['addman_id'] = $this->user['id'];
        $res = Userinfo::create($input);
        $taglist = $req->input('tag_list');
        $res->tags()->attach($taglist);
        return $this->responseResult($res, $req, '存储失败', '保存成功', 'userinfo');
    }

    //显示对应信息详情
    public function show(Request $req, $id)
    {
        $userinfo = $this->userinfos->selectOneUserinfo($id);
        $dolist = Dolist::where('info_id', $id)->with('user')->ordered()->get();
        if ($userinfo) return view('info.show', compact('userinfo', 'dolist'));
        return $this->responseResult(null, $req, '查询失败', null, 'userinfo');
    }

    //编辑页面
    public function edit(Request $req, $id)
    {
        $userinfo = $this->userinfos->selectOneUserinfo($id);
        $data = $this->selectData();
        $tags = Tag::lists('name', 'id');
        if ($userinfo) return view('userinfo.edit', compact('userinfo', 'data', 'tags'));
        return $this->responseResult(null, $req, '查询失败', null, 'userinfo/' . $id);
    }

    //更新信息
    public function update(Requests\UserinfoRequest $req, $id)
    {
        $res = $this->userinfos->selectOneUserinfo($id)->update($req->all());
        return $this->responseResult($res, $req, '保存失败', '保存成功', 'userinfo/' . $id);
    }

    //删除信息
    public function destroy(Request $req, $id)
    {
        $res = $this->userinfos->selectOneUserinfo($id)->delete();
        $data = Dolist::where('info_id', $id)->delete();
        $end = Info_tag::where('userinfo_id', $id)->delete();
        return $this->responseResult($res, $req, '删除失败', '删除成功', 'userinfo');
    }

    //搜索姓名/手机/身份证
    public function search(Request $req)
    {
        $name = $req->input('name');
        $phone = $req->input('phone');
        $identity = $req->input('identity');

        switch (true) {
            case !empty($name):
                $datas = $this->userinfos->search($req, 'name', $name);
                break;
            case !empty($phone):
                $datas = $this->userinfos->search($req, 'phone', $phone);
                break;
            case !empty($identity):
                $datas = $this->userinfos->search($req, 'identity', $identity);
                break;
            default:
                return $this->responseResult(null, $req, '请填写查询条件', '', 'userinfo');
        }
        if ($datas->total() > 0) return view('userinfo.index', compact('datas'));
        return $this->responseResult(null, $req, '查询不到你要的内容', '', 'userinfo');
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
