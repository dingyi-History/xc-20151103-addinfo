@extends('base.base')
@section('content')
    <div class="container border-1 am-animation-slide-left">
        @include('base.title',['title' => '用户资料'])
        <table class="am-table  am-table-hover">
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
        <div class="am-g">
            <div style="float: left;">
                @cannot('see-me')
                <p class="show-who">由{{$userinfo->realname}}在{{$userinfo->created_at}}录入</p>
                @endcannot
                @can('see-me')
                <p class="show-who">在{{$userinfo->created_at}}录入</p>
                @endcan
            </div>
            <div style="float: right;">
                <form action="/userinfo/{{$userinfo->id}}" method="post" style="display: inline-block;">
                    {!! csrf_field() !!}
                    <input name="_method" type="hidden" value="DELETE"/>
                    <button type="submit" class="am-btn am-btn-danger" onclick="return confirm('确定要删除吗?')">删除</button>
                </form>
                <a href="/userinfo/{{$userinfo->id}}/edit" class="am-btn am-btn-success">编辑</a>
            </div>
        </div>
        <div class="am-g">
            @foreach($userinfo->tags as $tag)
                <a href="/tag/show/{{$tag->id}}"><span class="am-badge am-badge-success am-round" style="font-size: 18px;margin-right: 10px;">{{$tag->name}}</span></a>
            @endforeach
        </div>
    </div>

    <div class="container border-1 am-animation-slide-left">
        @include('base.title',['title' => '该用户记录','btn' => '添加记录','btn_url' => '/do/create?id='.$userinfo->id])
        <table class="am-table  am-table-striped am-table-hover">
            <thead>
            <tr>
                <th>用户ID</th>
                <th style="max-width: 430px;">行为记录</th>
                <th>时间</th>
                <th>录入人</th>
                <th>录入时间</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($dolist as $do)
                <tr>
                    <td>{{$do->info_id}}</td>
                    <td style="max-width: 430px;">{{$do->docontent}}</td>
                    <td>{{$do->dotime}}</td>
                    <td>{{$do->user['realname']}}</td>
                    <td>{{$do->created_at}}</td>
                    <td>
                        <a href="/do/{{$do->id}}/edit" class="am-btn am-btn-primary am-btn-xs">编辑</a>
                        <form action="/do/{{$do->id}}" method="post" style="display: inline-block;">
                            {!! csrf_field() !!}
                            <input name="_method" type="hidden" value="DELETE"/>
                            <button type="submit" href="" class="am-btn am-btn-danger am-btn-xs"
                                    onclick="return confirm('确定要删除吗?')">删除
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection