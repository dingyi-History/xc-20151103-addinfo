@extends('common.base')
@section('title')  注册 @endsection
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
                <div class="main-title container shadow-z-1">
                    <form class="form" method="post" action="/auth/register">
                        {!! csrf_field() !!}
                        <legend class="create-form-title">注册</legend>
                        <div class="form-group row">
                            <label for="name" class="col-md-3 control-label">邮箱</label>

                            <div class="col-md-9">
                                <input type="text" class="form-control" id="name" placeholder="example@xici.com"
                                       name="email" value="{{ old('email') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="pwd" class="col-md-3 control-label">密码</label>

                            <div class="col-md-9">
                                <input type="password" class="form-control" id="pwd" placeholder="密码"
                                       name="password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="dep" class="col-md-3 control-label">部门</label>

                            <div class="col-md-9">
                                <input type="text" class="form-control" id="dep" placeholder="部门" name="department"
                                       value="{{ old('department') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="pull-right">
                                <button type="reset" class="btn btn-secondary">重置</button>
                                <button type="submit" class="btn btn-success">GO</button>
                            </div>
                        </div>

                    </form>
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>


@endsection
@section('js')
    <script src="{{asset('assets/loginbg/js/rAF.js')}}"></script>
    <script src="{{asset('assets/loginbg/js/demo-2.js')}}"></script>
@endsection