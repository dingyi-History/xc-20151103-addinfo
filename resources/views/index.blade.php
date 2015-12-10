@extends('base.base')
@section('content')
    <div class="am-g container am-animation-scale-up">
        <div class="admin-content">
            <ul class="am-avg-sm-2 am-avg-md-4 am-margin am-padding am-text-center admin-content-list ">
                <li class="index-card">
                    <a href="/userinfo">
                        <span class="am-icon-btn am-icon-users am-icon-lg"></span>
                        <hr/>
                        <p>用户资料</p>
                    </a>
                </li>
                <li class="index-card">
                    <a href="/do">
                        <span class="am-icon-btn am-icon-edit am-icon-lg"></span>
                        <hr/>
                        <p>用户记录</p>
                    </a>
                </li>
                <li class="index-card">
                    <a href="/tag/index">
                        <span class="am-icon-btn am-icon-tags am-icon-lg"></span>
                        <hr/>
                        <p>用户标签</p>
                    </a>
                </li>
                <li class="index-card">
                    <a href="/users">
                        <span class="am-icon-btn am-icon-male am-icon-lg"></span>
                        <hr/>
                        <p>员工管理</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
@endsection