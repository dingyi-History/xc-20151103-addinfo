@extends('common.base')
@section('title')
    @can('see-all')
    全部用户信息
    @endcan
    @can('see-dep')
    本部门录入的用户信息
    @endcan
    @can('see-me')
    我录入的用户信息
    @endcan
@endsection

@section('header')
    @can('see-all')
    @include('common.header', ['header_title' => '全部用户信息','header_btn' => '添加','header_btn_url' => '/userinfo/create'])
    @endcan
    @can('see-dep')
    @include('common.header', ['header_title' => '本部门录入的用户信息','header_btn' => '添加','header_btn_url' => '/userinfo/create'])
    @endcan
    @can('see-me')
    @include('common.header', ['header_title' => '我录入的信息','header_btn' => '添加','header_btn_url' => '/userinfo/create'])
    @endcan
@endsection

@section('content')
    <div class="index-table table-responsive">
        <table class="table table-bordered table-hover table-striped  shadow-z-1">
            <thead>
            <tr>
                <th>真实姓名</th>
                <th>性别</th>
                <th>手机号</th>
                <th>当前所在地</th>
                <th>学历</th>
                <th>职业</th>
                <th>录入时间</th>
                <th>详情</th>
            </tr>
            </thead>
            <tbody>
            @foreach($datas as $data)
                <tr>
                    <td>{{$data->name}}</td>
                    <td>{{$data->sex}}</td>
                    <td>{{$data->phone}}</td>
                    <td>{{$data->residence}}</td>
                    <td>{{$data->degree}}</td>
                    <td>{{$data->profession}}</td>
                    <td>{{$data->created_at}}</td>
                    <td>
                        <a href="/userinfo/{{$data->id}}/" class="btn btn-info btn-raised btn-sm"
                           style="margin: 0;">查看</a>
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

