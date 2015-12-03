@extends('common.base')
@section('title')  标签用户 @endsection
@section('header')
    @include('common.header',['header_title'=> "标签:".$tagname->name,'header_btn' => '全部用户','header_btn_url' => '/userinfo'])
@endsection

@section('content')
    <div class="container create-form shadow-z-1">
        <div class="row">
            <a href="/tag/index">
                <legend class="create-form-title pull-left">全部标签</legend>
            </a>
            <button type="button" class="btn btn-success-outline pull-right" data-toggle="modal" data-target="#myModal"
                    style="margin-top: 10px;">
                添加标签
            </button>

            <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>
                            <h4 class="modal-title" id="myModalLabel">添加标签</h4>
                        </div>
                        {!! Form::open(['url'=>'/tag/store']) !!}
                        <div class="modal-body">
                            {!! Form::text('name',null,['class' => 'form-control']) !!}
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">关闭</button>
                            <button type="submit" class="btn btn-primary">保存</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            @foreach($taglist as $tag)
                <a href="/tag/show/{{$tag->id}}"><span class="label label-success"
                                                       style="font-size: 18px;margin-bottom: 15px;">{{$tag->name}}</span></a>
            @endforeach
        </div>
    </div>
    <div class="container create-form shadow-z-1">
        <table class="table table-hover table-striped">
            <div class="row">
                <legend class="create-form-title pull-left">标签用户</legend>
                <a href="/userinfo/create" class="btn btn-success-outline pull-right"
                   style="margin-top: 10px;">添加用户</a>
            </div>
            <thead>
            <tr>
                <th>用户ID</th>
                <th>姓名</th>
                <th>手机号</th>
                <th>当前所在地</th>
                <th>详情</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->phone}}</td>
                    <td>{{$item->residence}}</td>
                    <td>
                        <a href="/userinfo/{{$item->id}}" class="btn btn-sm btn-info">查看</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="container">
            <nav class="text-center">
                {!! $data->render() !!}
            </nav>
        </div>
    </div>
@endsection
