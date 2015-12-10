@extends('base.base')
@section('content')
    <div class="border-1 am-animation-slide-left">
        @include('base.title',['title' => '全部标签'])
        <div class="am-g am-table-hover">
            @foreach($taglist as $tag)
                <a href="/tag/show/{{$tag->id}}"><span class="am-badge am-badge-success am-round am-text-lg"
                                                       style="font-size: 18px;margin-bottom: 15px;">{{$tag->name}}</span></a>
            @endforeach
        </div>
    </div>

    <div class="border-1 am-animation-slide-left">
        @include('base.title',['title' => '标签'])
        <table class="am-table am-table-hover">
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
                        <a href="/userinfo/{{$item->id}}" class="am-btn am-btn-xs am-btn-primary">查看</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection