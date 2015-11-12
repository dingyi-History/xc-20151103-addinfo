@extends('common.base')
@section('title')  查看详情 @endsection
@section('header')
    @include('common.header',['header_title'=> "详情",'header_btn' => '全部','header_btn_url' => '/userinfo'])
@endsection

@section('content')
    <div class="container create-form shadow-z-1">
        <table class="table table-hover table-striped">
            <div class="pull-left">
                <legend class="create-form-title">用户详细信息</legend>
            </div>
            <div class="pull-right">
                @cannot('see-me')
                <p class="show-who">由{{$userinfo->realname}}在{{$userinfo->created_at}}录入</p>
                @endcannot
                @can('see-me')
                <p class="show-who">在{{$userinfo->created_at}}录入</p>
                @endcan
            </div>
            <tbody>
            <tr>
                <th>真实姓名</th>
                <td>{{$userinfo->name}}</td>
                <th>手机号</th>
                <td>{{$userinfo->phone}}</td>
            </tr>
            <tr>
                <th>邮箱</th>
                <td>{{$userinfo->email}}</td>
                <th>身份证号</th>
                <td>{{$userinfo->identity}}</td>
            </tr>
            <tr>
                <th>性别</th>
                <td>{{$userinfo->sex}}</td>
                <th>情感状况</th>
                <td>{{$userinfo->relationship_status}}</td>
            </tr>
            <tr>
                <th>性取向</th>
                <td>{{$userinfo->sex_orietation}}</td>
                <th>收入等级</th>
                <td>{{$userinfo->income_level}}</td>
            </tr>
            <tr>
                <th>血型</th>
                <td>{{$userinfo->blood_type}}</td>
                <th>生日</th>
                <td>{{$userinfo->birthday}}</td>
            </tr>
            <tr>
                <th style="min-width: 120px;">当前所在地</th>
                <td>{{$userinfo->residence}}</td>
                <th>毕业学校</th>
                <td>{{$userinfo->school}}</td>
            </tr>
            <tr>
                <th>专业</th>
                <td>{{$userinfo->major}}</td>
                <th>职业</th>
                <td>{{$userinfo->profession}}</td>
            </tr>
            <tr>
                <th>微博号</th>
                <td>{{$userinfo->weibo}}</td>
                <th>微信号</th>
                <td>{{$userinfo->weixin}}</td>
            </tr>
            <tr>
                <th>来源</th>
                <td>{{$userinfo->source}}</td>
                <th>西祠ID</th>
                <td>{{$userinfo->user_id}}</td>
            </tr>
            <tr>
                <th>西祠用户名</th>
                <td>{{$userinfo->screen_name}}</td>
                <th>联系地址</th>
                <td>{{$userinfo->address}}</td>
            </tr>
            <tr>
                <th>备注</th>
                <td colspan="3">{{$userinfo->remark}}</td>
            </tr>
            </tbody>
        </table>
        <div class="row">
            <div class="form-group text-right">
                <form action="/userinfo/{{$userinfo->id}}" method="post" style="display: inline-block;">
                    {!! csrf_field() !!}
                    <input name="_method" type="hidden" value="DELETE"/>
                    <button type="submit" class="btn btn-danger-outline" onclick="return confirm('确定要删除吗?')">删除</button>
                </form>
                <a href="/userinfo/{{$userinfo->id}}/edit" class="btn btn-success-outline">编辑</a>
            </div>
        </div>

    </div>
@endsection