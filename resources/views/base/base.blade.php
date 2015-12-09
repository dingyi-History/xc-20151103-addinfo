<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta id="token" name="token" value="{{ csrf_token() }}">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="stylesheet" href="/amazeui/amazeui.min.css">
    <link rel="stylesheet" href="/assets/sweetalert/sweetalert.css">
    <link rel="stylesheet" href="/css/index.css">
    @yield('css')
</head>
<body>
{{-- 包含页头 --}}
@include('base.header')
{{-- 继承后插入的内容 --}}
@yield('content')

@if(session('status0'))
    <div class="am-alert am-alert-danger am-animation-slide-top-fixed" data-am-alert>
        <button type="button" class="am-close">&times;</button>
        <strong>对不起!</strong> {{session('status0')}}
    </div>
@endif
@if(session('status1'))
    <div class="am-alert am-alert-success am-animation-slide-top-fixed" data-am-alert>
        <button type="button" class="am-close">&times;</button>
        <strong>OK!</strong> {{session('status1')}}
    </div>
@endif

{{-- 包含页脚 --}}
<script src="/amazeui/jquery.min.js"></script>
<script src="/amazeui/amazeui.min.js"></script>
<script src="/assets/sweetalert/sweetalert.min.js"></script>
<script>
    @if(session('status2'))
        swal("对不起", "{{session('status2')}}", "error");
    @endif
    @if(session('status3'))
        swal("OK", "{{session('status3')}}", "success");
    @endif
</script>
@yield('js')
</body>
</html>
