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
                <div class="main-title container shadow-z-1" id="login_form">
                    <form class="form" method="post" action="/auth/login">
                        {!! csrf_field() !!}
                        <legend class="create-form-title">登录</legend>
                        <div class="form-group row" v-bind:class="{ 'has-error': is_error_email }">
                            <label for="name" class="col-md-3 control-label">邮箱</label>

                            <div class="col-md-9">
                                <input type="email" class="form-control" id="name" placeholder="example@xici.net"
                                       name="email"  v-model="email"   required onchange="emailvalid">
                                <span class="form-span-error pull-left" v-model="error_email" v-text="error_email"></span>
                            </div>
                        </div>
                        <div class="form-group row" v-bind:class="{ 'has-error': is_error_password }">
                            <label for="pwd" class="col-md-3 control-label">密码</label>

                            <div class="col-md-9">
                                <input type="password" class="form-control" id="pwd" placeholder="密码"
                                       name="password"  v-model="password" required  v-on:click="passwordvalid">
                                <span class="form-span-error pull-left" v-model="error_password" v-text="error_password"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="pull-right">
                                <button type="reset" class="btn btn-secondary">重置</button>
                                <button type="button" v-on:click="loginvalid" class="btn btn-success">GO</button>
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
@endsection