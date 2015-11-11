@extends('common.base')
@section('title') 修改密码 @endsection
@section('header')
    @include('common.header', ['header_title' => '修改密码','header_btn' => '查看用户信息','header_btn_url' => '/userinfo'])
@endsection
@section('content')
    <div class="container create-form shadow-z-1">
        {!! Form::open(['url'=>'/users/resetpwd']) !!}
        {!! csrf_field() !!}
        <fieldset>
            <legend class="create-form-title">修改密码</legend>
            <div class="form-group row">
                {!! Form::label('old_password','原密码',['class' => 'col-md-2 control-label']) !!}
                <div class="col-md-10">
                    {!! Form::password('old_password',['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group row">
                {!! Form::label('new_password','新密码',['class' => 'col-md-2 control-label']) !!}
                <div class="col-md-10">
                    {!! Form::password('new_password',['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group row">
                {!! Form::label('new_password_confirmation','确认密码',['class' => 'col-md-2 control-label']) !!}
                <div class="col-md-10">
                    {!! Form::password('new_password_confirmation',['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-8"></div>
                <div class="col-md-2">
                    <button type="reset" class="btn btn-primary-outline btn-block">重置</button>
                </div>
                <div class="col-sm-2">
                    <button type="submit" class="btn btn-success-outline btn-block">修改</button>
                </div>
            </div>
        </fieldset>
        {!! Form::close() !!}
    </div>

@endsection