@extends('common.base')
@section('title') 修改密码 @endsection
@section('header')
    @include('common.header', ['header_title' => '修改密码','header_btn' => '查看用户信息','header_btn_url' => '/userinfo'])
@endsection
@section('content')
    <div class="container create-form shadow-z-1" id="app">
        {!! Form::open(['url'=>'/users/resetpwd','@submit.prevent' => 'onSubmit','name' => 'myform','id' => 'myform','v-form']) !!}
        {!! csrf_field() !!}
        <fieldset>
            <legend class="create-form-title">修改密码</legend>
            <div class="form-group row">
                {!! Form::label('old_password','原密码',['class' => 'col-md-3 col-md-offset-1 control-label text-center']) !!}
                <div class="col-md-6">
                    {!! Form::password('old_password',['class' => 'form-control','v-model' => 'model.old_password','required','v-form-ctrl']) !!}
                    <div class="errors pull-left" v-if="myform.$submitted">
                        <span class="form-span-error" v-if="myform.old_password.$error.required">* 请输入原密码</span>
                    </div>
                    @if ($errors->has('old_password'))
                        <span class="form-span-error">* 请正确输入原密码</span>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                {!! Form::label('new_password','新密码',['class' => 'col-md-3 col-md-offset-1 control-label text-center']) !!}
                <div class="col-md-6">
                    {!! Form::password('new_password',['class' => 'form-control','v-model' => 'model.new_password','required','v-form-ctrl']) !!}
                    <div class="errors pull-left" v-if="myform.$submitted">
                        <span class="form-span-error" v-if="myform.new_password.$error.required">* 请输入新密码</span>
                    </div>
                    @if ($errors->has('new_password'))
                        <span class="form-span-error">* 请正确输入新密码</span>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                {!! Form::label('new_password_confirmation','确认密码',['class' => 'col-md-3 col-md-offset-1 control-label text-center']) !!}
                <div class="col-md-6">
                    {!! Form::password('new_password_confirmation',['class' => 'form-control','v-model' => 'model.new_password_confirmation','required','v-form-ctrl']) !!}
                    <div class="errors pull-left" v-if="myform.$submitted">
                        <span class="form-span-error" v-if="myform.new_password_confirmation.$error.required">* 请输入确认密码</span>
                    </div>
                    @if ($errors->has('new_password_confirmation'))
                        <span class="form-span-error">* 两次密码不一致</span>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-4"></div>
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
@section('js')
    <script src="{{asset('assets/vuejs/vue-form.min.js')}}"></script>
    <script src="{{asset('assets/vuejs/reset_form_validate.js')}}"></script>
@endsection