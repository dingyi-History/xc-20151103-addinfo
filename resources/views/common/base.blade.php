<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta id="token" name="token" value="{{ csrf_token() }}">\
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

@if(session('status0'))
    <div id="status" class="alert alert-danger pull-right" role="alert"
         style="width:300px;position: absolute;bottom: 50px;right: 0px; text-align: center;">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>对不起!</strong> {{session('status0')}}
    </div>
@endif
@if(session('status1'))
    <div id="status"   class="alert alert-success pull-right" role="alert"
         style="width:300px;position: absolute;bottom: 50px;right: 0px; text-align: center;">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>OK!</strong> {{session('status1')}}
    </div>
@endif

{{-- 包含页脚 --}}
<script src="/assets/boot4/jquery.min.js"></script>
<script src="/assets/boot4/bootstrap.min.js"></script>
<script src="/assets/vuejs/vue.min.js"></script>
<script src="/assets/sweetalert/sweetalert.min.js"></script>
<script>
    @if(session('status2'))
        swal("对不起", "{{session('status2')}}", "error");
    @endif
    @if(session('status3'))
        swal("OK", "{{session('status3')}}", "success");
    @endif
    $(document).ready(function () {
        $("#status").stop(true, false).animate({"right": 100}, 500);
        setTimeout(function () {
            $('#status').fadeOut(2000);
        }, 2000)

    });
</script>
@yield('js')
</body>
</html>
