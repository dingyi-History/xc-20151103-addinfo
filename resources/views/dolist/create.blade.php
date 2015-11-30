@extends('common.base')
@section('title')  用户行为记录 @endsection
@section('header')
    @include('common.header',['header_title'=> "用户行为记录",'header_btn' => '用户详细资料','header_btn_url' => '/userinfo/'.$userinfo->id])
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
                {!! Form::open(['url'=>'/do']) !!}
                <div class="form-group row">
                    {!! Form::label('name',"用户名",['class' => 'col-md-3 control-label text-center','style' => 'line-height:40px;']) !!}
                    <div class="col-md-8">
                        <p style="line-height: 40px;">{{$userinfo->name}}</p>

                    </div>
                </div>

                <div class="form-group row">
                    {!! Form::label('name',"用户ID",['class' => 'col-md-3 control-label text-center','style' => 'line-height:40px;']) !!}
                    <div class="col-md-8">
                        <p style="line-height: 40px;">{{$userinfo->id}}</p>
                        {!! Form::hidden('info_id',$userinfo->id,['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label('dotime','时间',['class' => 'col-md-3 control-label text-center','style' => 'line-height:40px;']) !!}
                    <div class="col-md-8">
                        {!! Form::input('dotime','dotime',date('Y-m-d h:m'),['class' => ' form-control','style' => 'height:38px;','placeholder' => '格式:1990-10-1']) !!}
                    </div>
                </div>

                <div class="form-group row">
                    {!! Form::label('docontent','记录内容',['class' => 'col-md-3 control-label text-center','style' => 'line-height:40px;']) !!}
                    <div class="col-md-8">
                        {!! Form::textarea('docontent',null,['class' => 'form-control','rows'=>'2']) !!}
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-11 text-right">
                        <button type="submit" class="btn btn-primary-outline">添加记录</button>
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
            <strong>对不起!</strong> 添加失败
        </div>
    @endif

@endsection
