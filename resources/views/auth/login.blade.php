@extends('auth.base')
@section('title')  登录 @endsection
@section('content')
<div class="login">
    <div class="am-u-md-4 am-u-sm-centered">
        <div class="form am-text-center">
            <h1>登录</h1>
            <form class="am-form" action="/auth/login" method="post">
                {!! csrf_field() !!}
                <fieldset class="am-form-set">
                    <input type="email" name="email" placeholder="邮箱">
                    <input type="password" name="password" placeholder="密码">
                </fieldset>
                <button type="submit" class="am-btn am-btn-primary am-btn-block">GO</button>
            </form>
        </div>

    </div>
</div>


@endsection
@section('js')
    <script>
        @if(count($errors) > 0 )
            swal('登录失败', '用户名和密码不匹配', 'error');
        @endif
    </script>
@endsection
