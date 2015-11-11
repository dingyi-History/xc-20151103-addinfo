@extends('common.base')
@section('title') 部门管理 @endsection
@section('header')
    @can('see-all')
    @include('common.header', ['header_title' => '员工管理','header_btn' => '查看全部员工','header_btn_url' => '/users'])
    @endcan
    @can('see-dep')
    @include('common.header', ['header_title' => '部门管理','header_btn' => '查看部门信息','header_btn_url' => '/users'])
    @endcan
@endsection
@section('content')
    <div class="container create-form shadow-z-1">
        {!! Form::open(['url'=>'/users']) !!}
        @include('common.user_form',['form_title' => '新建员工'])
        {!! Form::close() !!}
    </div>
@endsection