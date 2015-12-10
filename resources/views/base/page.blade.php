@if($datas->currentPage() != $datas->lastPage())
<ul class="am-pagination am-text-center">
    @if($datas->currentPage()>1)
        <li><a href="?page={{$datas->currentPage()-1}}">&laquo; 上一页</a></li>
    @else
        <li><a type="button" class="am-btn-default" disabled="disabled">&laquo; 上一页</a></li>
    @endif
    @if($datas->currentPage() == $datas->lastPage())
        <li><a type="button" class="am-btn-default" disabled="disabled">下一页 &raquo;</a></li>
    @else
        <li><a href="{{$datas->nextPageUrl()}}">下一页 &raquo;</a></li>
    @endif
</ul>
@endif