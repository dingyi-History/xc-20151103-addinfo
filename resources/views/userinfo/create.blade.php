@extends('common.base')
@section('title') 录入信息  @endsection
@section('header')
    @include('common.header', ['header_title' => '信息录入','header_btn' => '查看','header_btn_url' => '/userinfo'])
@endsection
@section('css')
    <link rel="stylesheet" href="{{asset('assets/select/select2.min.css')}}">
@endsection
@section('content')
    <div class="container create-form shadow-z-1" id="app">
        <form v-form name="myform" @submit.prevent="onSubmit" method="post" action="/userinfo" id="myform"
              role="form">
            @include('common.form',['form_title' => '添加用户信息'])
        </form>
    </div>
@endsection
@section('js')
    <script src="{{asset('assets/vuejs/vue-form.min.js')}}"></script>
    <script src="{{asset('assets/vuejs/vue-resource.min.js')}}"></script>
    <script src="{{asset('assets/vuejs/userinfo_form_validate.js')}}"></script>
    <script src="{{asset('assets/select/select2.full.min.js')}}"></script>
    <script>
        $(function () {
            $(".taglist").select2({
                multiple:true,
                ajax: {
                    url: "/api/taglist",
                    processResults: function (data) {
                        return {
                            results: data
                        };
                    }
                }
            });
        });
    </script>
@endsection