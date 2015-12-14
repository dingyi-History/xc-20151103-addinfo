@extends('base.base')

@section('content')
    <div class="border-1 am-animation-slide-left">
        <div class="title am-primary ">
            <h2 class="am-u-md-2">用户资料</h2>
            {!! Form::open(['url'=>'/userinfo/search',"class" => "am-form-inline am-u-md-10"]) !!}
            <div class="am-form-group am-u-md-3 am-text-right">
                <label>姓名</label>
                <input type="text" name="name" class="am-form-field">
            </div>
            <div class="am-form-group am-u-md-3 am-text-right">
                <label>手机号</label>
                <input type="text" name="phone" class="am-form-field">
            </div>
            <div class="am-form-group am-u-md-3 am-text-right">
                <label>身份证号</label>
                <input type="text" name="identity" class="am-form-field">
            </div>
            <div class="am-form-group am-u-md-2 am-text-right am-u-end">
                <button type="submit" class="am-btn am-btn-success">查询</button>
                <a href="/userinfo" class="am-btn am-btn-default">全部</a>
            </div>
            {!! Form::close() !!}
        </div>

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