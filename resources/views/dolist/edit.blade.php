@extends('common.base')
@section('title')  用户行为记录 @endsection
@section('header')
    @include('common.header',['header_title'=> "用户行为记录",'header_btn' => '该用户的行为记录','header_btn_url' => '/do/'.$userinfo->id])
@endsection

@section('content')
    <div class="container create-form shadow-z-1">
        <div class="pull-left">
            <legend class="create-form-title">用户行为记录</legend>
        </div>
        <div class="pull-right">
            <a href="/do/{{$userinfo->id}}" class="btn btn-success-outline"
               style="margin-top: 10px;">用户记录</a>
        </div>

        <div class="row" style="clear: both;">
            <div class="index-table">
                {!! Form::model($dolist,['method'=>'PATCH','url'=>'/do/'.$dolist->id]) !!}
                @include('common.dolist_form')
                <div class="form-group row">
                    <div class="col-md-11 text-right">
                        <button type="submit" class="btn btn-primary-outline">保存记录</button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    @if(count($errors) > 0)
        <div id="status" class="alert alert-danger pull-right" role="alert"
             style="width:300px;position: absolute;bottom: 50px;right: 0px; text-align: center;">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong>对不起!</strong> 编辑失败
        </div>
    @endif

@endsection
