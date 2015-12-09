@extends('base.base')
@section('content')
    <div class="wrap">
        <div class="am-g">
            <div class="am-u-md-11">
                <div class="admin-content">
                    <div class="am-cf am-padding">
                        <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">首页</strong> /
                            <small>功能</small>
                        </div>
                    </div>
                    <ul class="am-avg-sm-2 am-avg-md-4 am-margin am-padding am-text-center admin-content-list ">
                        <li class="index-card"><a href="/userinfo"><span class="am-icon-btn am-icon-users"></span><hr/>用户信息</a></li>
                        <li class="index-card"><a href="/dolist"><span class="am-icon-btn am-icon-edit"></span><hr/>用户记录</a></li>
                        <li class="index-card"><a href="/tag"><span class="am-icon-btn am-icon-tags"></span><hr/>用户标签</a></li>
                        <li class="index-card"><a href="/user"><span class="am-icon-btn am-icon-male"></span><hr/>员工管理</a></li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
@endsection