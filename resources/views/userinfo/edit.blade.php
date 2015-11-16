@extends('common.base')
@section('title')  编辑 @endsection
@section('header')
    @include('common.header',['header_title'=> "编辑",'header_btn' => '返回','header_btn_url' => '/userinfo/'.$userinfo->id])
@endsection

@section('content')
    <div class="container create-form shadow-z-1" id="app">
        {!! Form::model($userinfo,['method'=>'PATCH','url'=>'/userinfo/'.$userinfo->id,'@submit.prevent' => 'onSubmit','name' => 'myform','id' => 'myform','v-form']) !!}
        @include('common.form',['form_title' => '编辑用户信息'])
        {!! Form::close() !!}
    </div>
@endsection
@section('js')
    <script src="{{asset('assets/vuejs/vue-form.min.js')}}"></script>
    <script src="{{asset('assets/vuejs/userinfo_form_validate.js')}}"></script>
@endsection