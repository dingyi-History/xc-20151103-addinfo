<div class="container">
    @if(session('status0'))
        <div class="am-alert am-alert-danger am-animation-slide-top" data-am-alert>
            <button type="button" class="am-close">&times;</button>
            <strong>对不起!</strong> {{session('status0')}}
        </div>
    @endif
    @if(session('status1'))
        <div class="am-alert am-alert-success am-animation-slide-top" data-am-alert>
            <button type="button" class="am-close">&times;</button>
            <strong>OK!</strong> {{session('status1')}}
        </div>
    @endif
</div>