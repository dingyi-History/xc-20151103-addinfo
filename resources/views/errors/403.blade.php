@extends('base.base')
@section('content')
    <div class="jumbotron"
         style="position:absolute;top: 0;bottom: 0;left: 0;right: 0; padding: 100px;text-align: center;">
        <h1 class="display-3">404!</h1>

        <p class="lead">没权限...</p>
        <hr class="m-y-md">
    </div>
@endsection
@section('js')
    <script>
        sweetAlert("对不起", "403", "error");
    </script>
@endsection