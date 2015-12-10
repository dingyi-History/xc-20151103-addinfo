@extends('base.base')

@section('content')
    <div class="border-1 am-animation-slide-left">
        @include('base.title',['title' => '用户资料'])
        <table class="am-table am-table-hover">
            <thead>
            <tr>
                <th>真实姓名</th>
                <th>性别</th>
                <th>手机号</th>
                <th>身份证号</th>
                <th>当前所在地</th>
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
                    <td>{{$data->identity}}</td>
                    <td>{{$data->residence}}</td>
                    <td>{{$data->created_at}}</td>
                    <td>
                        <a href="/userinfo/{{$data->id}}/" class="am-btn am-btn-primary am-btn-xs">资料</a>
                        <a href="/do/{{$data->id}}/" class="am-btn am-btn-primary am-btn-xs">记录</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <ul class="am-pagination  am-pagination-centered">
            <li class="am-disabled"><a href="#">&laquo;</a></li>
            <li class="am-active"><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li><a href="#">&raquo;</a></li>
        </ul>
    </div>



@endsection