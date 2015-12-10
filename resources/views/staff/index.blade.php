@extends('base.base')

@section('content')
    <div class="border-1 am-animation-slide-left">
        @include('base.title',['title' => '员工管理'])
        <table class="am-table  am-table-hover am-animation-slide-left">
            <thead>
            <tr>
                <th>部门</th>
                <th>员工姓名</th>
                <th>邮箱</th>
                <th>权限</th>
                <th>账号设置</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->dep_name}}</td>
                    <td>{{$user->realname}}</td>
                    <th>{{$user->email}}</th>
                    <td>
                        <?php
                        switch ($user->authority) {
                            case 1:
                                echo '系统管理员';
                                break;
                            case 2:
                                echo '部门管理员';
                                break;
                            default:
                                echo '员工';
                        }?></td>
                    <td>
                        <a href="/users/{{$user->id}}/edit" class="am-btn am-btn-primary am-btn-xs">编辑</a>

                        <form action="/users/{{$user->id}}" method="post" style="display: inline-block;">
                            {!! csrf_field() !!}
                            <input name="_method" type="hidden" value="DELETE"/>
                            <button type="submit" href="" class="am-btn am-btn-default am-btn-xs"
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