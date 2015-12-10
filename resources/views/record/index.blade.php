@extends('base.base')

@section('content')
    <div class="border-1 am-animation-slide-left">
        @include('base.title',['title' => '用户记录'])
        <table class="am-table   am-table-hover">
            <thead>
            <tr>
                <th>用户ID</th>
                <th style="max-width: 430px;">行为记录</th>
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
                    <td style="max-width: 430px;">{{$data->docontent}}</td>
                    <td>{{ date("Y-m-d",strtotime($data->dotime))}}</td>
                    <td>{{$data->user['realname']}}</td>
                    <td>{{$data->created_at}}</td>
                    <td>
                        <a href="/userinfo/{{$data->info_id}}" class="am-btn am-btn-primary am-btn-xs"
                           style="margin: 0;">查看该用户</a>
                        <form action="/do/{{$data->id}}" method="post" style="display: inline-block;">
                            {!! csrf_field() !!}
                            <input name="_method" type="hidden" value="DELETE"/>
                            <button type="submit" class="am-btn am-btn-danger am-btn-xs"
                                    onclick="return confirm('确定要删除吗?')">删除
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        @include('base.page')
    </div>

@endsection