@extends('common.base')
@section('title')  编辑 @endsection
@section('header')
    @include('common.header',['header_title'=> "编辑",'header_btn' => '返回','header_btn_url' => '/userinfo/'.$userinfo->id])
@endsection
@section('css')
    <link rel="stylesheet" href="{{asset('assets/select/select2.min.css')}}">
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
    <script src="{{asset('assets/select/select2.full.min.js')}}"></script>
    <script>
        $(function() {
            $(".taglist").select2({
                placeholder: "添加标签",
                tags: true,
                tokenSeparators: [',', ' ']
            });
        });
    </script>
@endsection