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
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

      @include('base.page')
    </div>



@endsection