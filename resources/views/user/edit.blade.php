@extends('common.base')
@section('title') 编辑员工信息 @endsection
@section('header')
    @can('see-all')
    @include('common.header', ['header_title' => '编辑员工信息','header_btn' => '查看全部员工','header_btn_url' => '/users'])
    @endcan
    @can('see-dep')
    @include('common.header', ['header_title' => '编辑员工信息','header_btn' => '查看部门信息','header_btn_url' => '/users'])
    @endcan
@endsection
@section('content')
    <div class="container create-form shadow-z-1">
        {!! Form::model($user,['method'=>'PATCH','url'=>'/users/'.$user->id]) !!}
        @include('common.user_form',['form_title' => '编辑信息','pwdplaceholder' => '不输入即保持原密码',
        'vbinderror' => 'is_error.password',
        'vbindsuccess' => 'is_ok.editpwd',
        'pwdmodel' => "users.password" ,
        'pwdkey' => 'editpwdvalidate',
        'errormodel' => ''])
        {!! Form::close() !!}
    </div>
@endsection
@section('js')
    <script src="{{asset('assets/vuejs/users_form_validate.js')}}"></script>
@endsection
