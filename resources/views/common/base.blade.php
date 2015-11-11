<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="stylesheet" href="/assets/boot4/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/sweetalert/sweetalert.css">
    <link rel="stylesheet" href="/assets/css/all.css">
    @yield('css')
</head>
<body>
{{-- 包含页头 --}}
@yield('header')
{{-- 继承后插入的内容 --}}
@yield('content')

{{-- 包含页脚 --}}
<script src="/assets/boot4/jquery.min.js"></script>
<script src="/assets/boot4/bootstrap.min.js"></script>
<script src="/assets/vuejs/vue.min.js"></script>
<script src="/assets/vuejs/app.js"></script>
<script src="/assets/sweetalert/sweetalert.min.js"></script>
<script>
    @if(count($errors)>0)
        sweetAlert("对不起", "Sorry", "error");
    @endif
    @if(session('status0'))
        sweetAlert("对不起", "{{session('status0')}}", "error");
    @endif
    @if(session('status1'))
        sweetAlert("OK", "{{session('status1')}}", "success");
    @endif
</script>
@yield('js')
</body>
</html>
