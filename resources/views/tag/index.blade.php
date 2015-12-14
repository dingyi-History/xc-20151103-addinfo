@extends('base.base')
@section('content')
    <div class="am-g">
        <div class="border-1 am-animation-slide-left">
            <div class="title am-primary ">
                <h2 class="am-fl">全部标签</h2>
                <div class="am-fr">
                    <input type="button" class="am-btn am-btn-warning " value="新建标签" id="tagbtn"/>
                </div>
                <div class="am-fr">
                    <input type="text" id="addtag" class="am-form-field" style="display: inline-block;" >
                </div>

            </div>

            @foreach($taglist as $tag)
                <a href="/tag/show/{{$tag->id}}"><span class="am-badge am-badge-success am-round am-text-lg"
                                                       style="font-size: 18px;margin-bottom: 15px;">{{$tag->name}}</span></a>
            @endforeach
        </div>
    </div>
@endsection
@section('js')
    @include('base.tag')
@endsection