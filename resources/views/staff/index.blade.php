@extends('base.base')

@section('content')
    <div id="do-not-say-1" class="am-panel-collapse am-collapse">
        <div class="am-panel-bd">
            <div class="container border-1 am-animation-slide-left">
                <div class="title am-primary ">
                    <h2 class="am-fl">添加员工</h2>
                    <a class="am-btn am-btn-danger am-fr am-btn-sm" style="margin: 10px 20px;"
                       data-am-collapse="{parent: '#accordion', target: '#do-not-say-1'}">关闭</a>
                </div>
                <form action="/users" method="post" class="am-form am-form-horizontal">
                    {!! csrf_field() !!}
                    <fieldset>
                        <div class="am-form-group">
                            <label class="am-u-md-3 am-form-label">真实姓名</label>
                            <div class="am-u-md-5 am-u-end">
                                {!! Form::text('realname',null,['placeholder' => '输入']) !!}
                                @if ($errors->has('realname'))
                                    <span class="form-span-error">* 请正确输入姓名</span>
                                @endif
                            </div>
                        </div>
                        <div class="am-form-group">
                            <label class="am-u-md-3 am-form-label">部门</label>
                            <div class="am-u-md-5 am-u-end">
                                @can('see-all')
                                {!! Form::select('dep_id',$deps,null,['class'=>'form-control']) !!}
                                @endcan
                                @can('see-dep')
                                <input name="dep_id" class="form-control" type="text"
                                       value="{{Auth::user()['dep_id']}}"
                                       readonly>
                                @endcan
                                @can('see-me')
                                <input name="dep_id" class="form-control" type="text"
                                       value="{{Auth::user()['dep_id']}}"
                                       readonly>
                                @endcan
                                @if ($errors->has('dep_id'))
                                    <span class="form-span-error">* 请正确选择部门</span>
                                @endif
                            </div>
                        </div>

                        <div class="am-form-group">
                            <label class="am-u-md-3 am-form-label">权限</label>
                            <div class="am-u-md-5 am-u-end">
                                {!! Form::select('authority',$authority,null,['class'=>'form-control']) !!}
                                @if ($errors->has('authority'))
                                    <span class="form-span-error">* 请正确选择权限</span>
                                @endif
                            </div>
                        </div>
                        <div class="am-form-group">
                            <label class="am-u-md-3 am-form-label">邮箱</label>
                            <div class="am-u-md-5 am-u-end">
                                {!! Form::text('email',null,['class' => 'form-control','placeholder' => "为员工登录账户example@xici.net"]) !!}
                                @if ($errors->has('email'))
                                    <span class="form-span-error">* 请正确输入邮箱</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="am-u-md-3 am-form-label">密码</label>
                            <div class="am-u-md-5 am-u-end">
                                <input type="password" name="password">
                                @if ($errors->has('password'))
                                    <span class="form-span-error">* 请正确输入密码</span>
                                @endif
                            </div>
                        </div>
                        <div class="am-form-group">
                            <div class="am-u-md-8">
                                <button type="submit" class="am-btn am-btn-success am-fr">保存</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>

    <div class="border-1 am-animation-slide-left">
        <div class="title am-primary ">
            <h2 class="am-fl">员工资料</h2>
            <a class="am-btn am-btn-default am-fr am-btn-sm" style="margin: 10px 20px;"
               data-am-collapse="{parent: '#accordion', target: '#do-not-say-1'}">添加员工</a>
        </div>
        <table class="am-table  am-table-hover">
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
                        }
                        ?>
                    </td>
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