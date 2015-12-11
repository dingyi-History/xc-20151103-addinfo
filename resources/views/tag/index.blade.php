@extends('base.base')
@section('content')
    <div class="am-g">
        <div class="border-1 am-animation-slide-left">
            @include('base.title',['title' => '全部标签'])
            @foreach($taglist as $tag)
                <a href="/tag/show/{{$tag->id}}"><span class="am-badge am-badge-success am-round am-text-lg"
                                                       style="font-size: 18px;margin-bottom: 15px;">{{$tag->name}}</span></a>
            @endforeach
        </div>
    </div>
@endsection