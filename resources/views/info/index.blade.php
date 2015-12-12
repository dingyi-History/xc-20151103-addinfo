@extends('base.base')

@section('content')
    <div class="border-1 am-animation-slide-left">
        @include('base.title',['title' => '用户资料'])
        {!! Form::open(['url'=>'/userinfo/search',"class" => "am-form-inline"]) !!}
        <div class="am-form-group am-u-md-3">
            <label>姓名</label>
            <input type="email" class="am-form-field" placeholder="电子邮件">
        </div>
        <div class="am-form-group am-u-md-3">
            <label>手机号</label>
            <input type="password" class="am-form-field" placeholder="密码">
        </div>
        <div class="am-form-group am-u-md-3">
            <label>身份证号</label>
            <input type="password" class="am-form-field" placeholder="密码">
        </div>
        <div class="am-form-group am-u-md-2 am-u-end">
            <button type="submit" class="am-btn am-btn-success">查询</button>
            <a href="/userinfo" class="am-btn am-btn-default">全部</a>
        </div>
        {!! Form::close() !!}

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