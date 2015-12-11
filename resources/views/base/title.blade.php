<div class="title am-primary ">
    <h2 class="am-fl">{{$title}}</h2>

    @if(isset($btn))
    <a href="{{$btn_url}}" class="am-btn am-btn-default am-fr am-btn-sm" style="margin: 10px 20px;">{{$btn}}</a>
    @endif

    @if(isset($tags))
        @foreach($tags as $tag)
            <a href="/tag/show/{{$tag->id}}" class="am-fr"><span class="am-badge am-badge-success am-round" style="font-size: 18px;margin-right: 10px;">{{$tag->name}}</span></a>
        @endforeach
    @endif
</div>