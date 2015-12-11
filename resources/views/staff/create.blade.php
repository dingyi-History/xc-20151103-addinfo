@extends('base.base')
@section('content')
    <div class="container border-1 am-animation-slide-left">
        @include('base.title',['title' => '添加员工'])
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
                        <input name="dep_id" class="form-control" type="text" value="{{Auth::user()['dep_id']}}"
                               readonly>
                        @endcan
                        @can('see-me')
                        <input name="dep_id" class="form-control" type="text" value="{{Auth::user()['dep_id']}}"
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
@endsection