@extends('common.base')
@section('title')  编辑 @endsection
@section('header')
    @include('common.header',['header_title'=> "编辑",'header_btn' => '返回','header_btn_url' => '/userinfo/'.$userinfo->id])
@endsection

@section('content')
    <div class="container create-form shadow-z-1" id="app">
        <form v-form name="myform" @submit.prevent="onSubmit" method="post" action="/userinfo/'{{$userinfo->id}}"
              id="myform">
            <input name="_method" type="hidden" value="PATCH">
            @include('common.form',['form_title' => '编辑用户信息'])
        </form>
    </div>
@endsection
@section('js')
    <script src="{{asset('assets/vuejs/vue-form.min.js')}}"></script>
    <script src="{{asset('assets/vuejs/userinfo_form_validate.js')}}"></script>
@endsection