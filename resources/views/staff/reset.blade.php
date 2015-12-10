@extends('base.base')

@section('content')
    <div class="container border-1 am-animation-slide-left">
        @include('base.title',['title' => '修改密码'])
        <form class="am-form am-form-horizontal" action="/users/resetpwd" method="post">
            {!! csrf_field() !!}
            <fieldset>
                <div class="am-form-group">
                    <label class="am-u-md-3 am-form-label">原密码</label>
                    <div class="am-u-md-5 am-u-end">
                        <input type="password" placeholder="输入" name="old_password">
                        @if ($errors->has('old_password'))
                            <span class="form-span-error">* 请正确输入原密码</span>
                        @endif
                    </div>
                </div>

                <div class="am-form-group">
                    <label class="am-u-md-3 am-form-label">新密码</label>
                    <div class="am-u-md-5 am-u-end">
                        <input type="password" placeholder="输入" name="new_password">
                        @if ($errors->has('new_password'))
                            <span class="form-span-error">* 请正确输入新密码</span>
                        @endif
                    </div>
                </div>

                <div class="am-form-group">
                    <label class="am-u-md-3 am-form-label">确认密码</label>
                    <div class="am-u-md-5 am-u-end">
                        <input type="password" placeholder="输入" name="new_password_confirmation">
                        @if ($errors->has('new_password_confirmation'))
                            <span class="form-span-error">* 请正确输入确认密码</span>
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