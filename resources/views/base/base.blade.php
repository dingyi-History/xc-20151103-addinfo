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
@include('base.response')
{{-- 继承后插入的内容 --}}
<div class="wrap">
    @yield('content')
</div>



{{-- 包含页脚 --}}
@include('base.footer')

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
