@extends('common.base')
@section('title')
    @can('see-all')
    员工管理
    @endcan
    @can('see-dep')
    部门管理
    @endcan
@endsection
@section('header')
    @can('see-all')
    @include('common.header', ['header_title' => '员工管理','header_btn' => '查看用户信息','header_btn_url' => '/userinfo'])
    @endcan
    @can('see-dep')
    @include('common.header', ['header_title' => '部门管理','header_btn' => '查看用户信息','header_btn_url' => '/userinfo'])
    @endcan
@endsection
@section('content')
    <div class="container create-form shadow-z-1">
        <table class="table table-hover table-striped">
            <div class="pull-left">
                <legend class="create-form-title">
                    @can('see-all')
                    全部员工账号
                    @endcan
                    @can('see-dep')
                    部门员工账号
                    @endcan
                </legend>
            </div>
            <div class="pull-right">
                <a href="/users/create" type="button" class="btn btn-success" style="margin-top: 15px;">
                    添加账号
                </a>
            </div>
            <thead>
            <tr>
                <th>部门</th>
                <th>员工姓名</th>
                <th>邮箱</th>
                <th>账号设置</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->dep_id}}</td>
                    <td>{{$user->realname}}</td>
                    <th>{{$user->email}}</th>
                    <td>
                        <a href="/users/{{$user->id}}/edit" class="btn btn-info-outline">编辑</a>
                        <form action="/users/{{$user->id}}" method="post" style="display: inline-block;">
                            {!! csrf_field() !!}
                            <input name="_method" type="hidden" value="DELETE"/>
                            <button type="submit" href="" class="btn btn-danger-outline"
                                    onclick="return confirm('确定要删除吗?')">删除
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="container">
            <nav class="text-center">
                {!! $users->render() !!}
            </nav>
        </div>

    </div>

@endsection
