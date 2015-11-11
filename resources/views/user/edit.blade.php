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
        @include('common.user_form',['form_title' => '编辑信息'])
        {!! Form::close() !!}
    </div>
@endsection