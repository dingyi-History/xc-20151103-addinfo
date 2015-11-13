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

@if(session('status2'))
    <div id="status" class="alert alert-danger pull-right" role="alert"
         style="width: 500px;position: absolute;bottom: 50px;right: 50px;">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>对不起!</strong> {{session('status2')}}
    </div>
@endif

{{-- 包含页脚 --}}
<script src="/assets/boot4/jquery.min.js"></script>
<script src="/assets/boot4/bootstrap.min.js"></script>
<script src="/assets/vuejs/vue.min.js"></script>
<script src="/assets/sweetalert/sweetalert.min.js"></script>
<script>
    @if(session('status0'))
        swal("对不起", "{{session('status0')}}", "error");
    @endif
    @if(session('status1'))
        swal("OK", "{{session('status1')}}", "success");
    @endif

    $(document).ready(function () {
        $("#status").stop(true, false).animate({"right": -500}, 5000);
    });

</script>
@yield('js')
</body>
</html>
