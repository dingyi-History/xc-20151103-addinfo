@extends('common.base')
@section('title')
    @can('see_all')
    全部用户记录
    @endcan
    @can('see_dep')
    本部门录入的用户记录
    @endcan
    @can('see_me')
    我录入的用户记录
    @endcan
@endsection

@section('header')
    @can('see-all')
    @include('common.header', ['header_title' => '全部用户记录','header_btn' => '查看用户资料','header_btn_url' => '/userinfo'])
    @endcan
    @can('see-dep')
    @include('common.header', ['header_title' => '本部门录入的用户记录','header_btn' => '查看用户资料','header_btn_url' => '/userinfo'])
    @endcan
    @can('see-me')
    @include('common.header', ['header_title' => '我录入的用户记录','header_btn' => '查看用户资料','header_btn_url' => '/userinfo'])
    @endcan
@endsection

@section('content')
    <div class="index-table table-responsive">
        <table class="table table-bordered table-hover table-striped  shadow-z-1">
            <thead>
            <tr>
                <th>用户名</th>
                <th>行为记录</th>
                <th>时间</th>
                <th>录入人</th>
                <th>录入时间</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($datas as $data)
                <tr>
                    <td>{{$data->info_id}}</td>
                    <td>{{$data->docontent}}</td>
                    <td>{{$data->dotime}}</td>
                    <td>{{$data->addman_id}}</td>
                    <td>{{$data->created_at}}</td>
                    <td>
                        <a href="/do/{{$data->info_id}}" class="btn btn-info btn-raised btn-sm"
                           style="margin: 0;">查看该用户</a>
                        <form action="/do/{{$data->id}}" method="post" style="display: inline-block;">
                            {!! csrf_field() !!}
                            <input name="_method" type="hidden" value="DELETE"/>
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('确定要删除吗?')">删除</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="container">
            <nav class="text-center">
                {!! $datas->render() !!}
            </nav>
        </div>
    </div>
@endsection
