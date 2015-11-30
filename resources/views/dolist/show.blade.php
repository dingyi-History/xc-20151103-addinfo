@extends('common.base')
@section('title')  用户行为记录 @endsection
@section('header')
    @include('common.header',['header_title'=> "用户行为记录",'header_btn' => '该用户的详细资料','header_btn_url' => '/userinfo/'.$userinfo->id])
@endsection

@section('content')
    <div class="container create-form shadow-z-1">
        <table class="table table-hover table-striped">
            <div class="pull-left">
                <legend class="create-form-title">用户行为记录</legend>
            </div>
            <div class="pull-right">
                <a href="/do/create?id={{$userinfo->id}}" class="btn btn-success-outline"
                   style="margin-top: 10px;">添加记录</a>
            </div>

            <thead>
            <tr>
                <th>用户ID</th>
                <th>行为记录</th>
                <th>时间</th>
                <th>录入人</th>
                <th>录入时间</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($dolist as $do)
                <tr>
                    <td>{{$do->info_id}}</td>
                    <td>{{$do->docontent}}</td>
                    <td>{{$do->dotime}}</td>
                    <td>{{$do->addman_id}}</td>
                    <td>{{$do->created_at}}</td>
                    <td>
                        <a href="" class="btn btn-sm btn-info">编辑</a>
                        <form action="/users/{{$do->id}}" method="post" style="display: inline-block;">
                            {!! csrf_field() !!}
                            <input name="_method" type="hidden" value="DELETE"/>
                            <button type="submit" href="" class="btn btn-danger btn-sm"
                                    onclick="return confirm('确定要删除吗?')">删除
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection