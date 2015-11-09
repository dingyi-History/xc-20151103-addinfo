@extends('common.base')
@section('title')  编辑 @endsection
@section('header')
    @include('common.header',['header_title'=> "编辑",'header_btn' => '返回','header_btn_url' => '/userinfo/'.$userinfo->id])
@endsection

@section('content')
    <div class="container create-form shadow-z-1">
        {!! Form::model($userinfo,['method'=>'PATCH','url'=>'/userinfo/'.$userinfo->id]) !!}
        @include('common.form',['form_title' => '编辑用户信息'])
        {!! Form::close() !!}
    </div>
    @if($errors->any())
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

@endsection