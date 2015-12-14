@extends('auth.base')
@section('title')  登录 @endsection
@section('content')
    <div class="login">
        <div class="am-u-md-4 am-u-sm-centered">
            <div class="form am-text-center">
                <h1>登录</h1>
                <form class="am-form" action="/auth/login" method="post" id="login">
                    {!! csrf_field() !!}
                    <fieldset class="am-form-set">
                        <input type="email" name="email" placeholder="邮箱"    required>
                        <input type="password" name="password" placeholder="密码" minlength="6" maxlength="16" required>
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

        $(function () {
            $('#login').validator({
                onValid: function (validity) {
                    $(validity.field).closest('.am-form-group').find('.am-alert').hide();
                },
                onInValid: function (validity) {
                    var $field = $(validity.field);
                    var $group = $field.closest('.am-form-group');
                    var $alert = $group.find('.am-alert');
                    // 使用自定义的提示信息 或 插件内置的提示信息
                    var msg = $field.data('validationMessage') || this.getValidationMessage(validity);

                    if (!$alert.length) {
                        $alert = $('<div class="am-alert am-alert-danger"></div>').hide().
                        appendTo($group);
                    }

                    $alert.html(msg).show();
                }
            });
        });
    </script>
@endsection
