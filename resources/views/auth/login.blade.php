@extends('common.base')
@section('title')  登录 @endsection
@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/loginbg/css/normalize.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/loginbg/css/demo.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/loginbg/css/component.css')}}"/>
@endsection
@section('content')
    <div class="demo-2">
        <div class="content">
            <div id="large-header" class="large-header">
                <canvas id="demo-canvas"></canvas>
                <div class="main-title container shadow-z-1" id="app">
                    <form v-form name="myform" @submit.prevent="onSubmit" method="post" action="/auth/login" id="myform"
                          role="form">
                        {!! csrf_field() !!}
                        <legend class="create-form-title">登录</legend>
                        <div class="form-group row">
                            <label for="name" class="col-md-3 control-label">邮箱</label>

                            <div class="col-md-9">
                                <input type="email" class="form-control" placeholder="example@xici.net"
                                       name="email" v-model="model.email" v-form-ctrl name="email"/>

                                <div class="errors pull-left" v-if="myform.$submitted">
                                    <span class="form-span-error" v-if="myform.email.$error.email">* 请输入正确的邮箱</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="pwd" class="col-md-3 control-label">密码</label>

                            <div class="col-md-9">
                                <input type="password" class="form-control" id="password" placeholder="密码"
                                       name="password" required v-model="model.password" v-form-ctrl maxlength="16"
                                       minlength="6"/>

                                <div class="errors pull-left" v-if="myform.$submitted">
                                    <span class="form-span-error" v-if="myform.password.$error.required">* 请输入密码</span>
                                    <span class="form-span-error"
                                          v-if="myform.password.$error.minlength">* 请输入6到16位密码</span>
                                    <span class="form-span-error"
                                          v-if="myform.password.$error.maxlength">* 请输入6到16位密码</span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="pull-right">
                                <button type="reset" class="btn btn-secondary">重置</button>
                                <input type="submit" class="btn btn-success" value="GO"/>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{asset('assets/loginbg/js/rAF.js')}}"></script>
    <script src="{{asset('assets/loginbg/js/demo-2.js')}}"></script>
    <script src="{{asset('assets/vuejs/vue-form.min.js')}}"></script>
    <script src="{{asset('assets/vuejs/login_form_validate.js')}}"></script>
    <script>
        @if(count($errors) > 0 )
            swal('登录失败', '用户名和密码不匹配', 'error');
        @endif
    </script>
@endsection
