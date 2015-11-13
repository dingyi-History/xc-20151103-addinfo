@extends('common.base')
@section('title') 录入信息  @endsection
@section('header')
    @include('common.header', ['header_title' => '信息录入','header_btn' => '查看','header_btn_url' => '/userinfo'])
@endsection

@section('content')
    <div class="container create-form shadow-z-1">
        {!! Form::open(['url'=>'/userinfo']) !!}
        @include('common.form',['form_title' => '添加用户信息'])
        {!! Form::close() !!}
    </div>
@endsection
@section('js')
    <script src="{{asset('assets/vuejs/userinfo_form_validate.js')}}"></script>
@endsection