@extends('common.base')
@section('title')  标签用户 @endsection
@section('header')
    @include('common.header',['header_title'=> "全部标签",'header_btn' => '全部用户','header_btn_url' => '/userinfo'])
@endsection

@section('content')
    <div class="container create-form shadow-z-1">
        <div class="row">
            <a href="/tag/index">
                <legend class="create-form-title pull-left">全部标签</legend>
            </a>
            <button type="button" class="btn btn-success-outline pull-right" data-toggle="modal" data-target="#myModal"
                    style="margin-top: 10px;">
                添加标签
            </button>

            <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>
                            <h4 class="modal-title" id="myModalLabel">添加标签</h4>
                        </div>
                        {!! Form::open(['url'=>'/tag/store']) !!}
                        <div class="modal-body">
                            {!! Form::text('name',null,['class' => 'form-control']) !!}
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">关闭</button>
                            <button type="submit" class="btn btn-primary">保存</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            @foreach($taglist as $tag)
                <a href="/tag/show/{{$tag->id}}"><span class="label label-success"
                                                       style="font-size: 18px;margin-bottom: 15px;">{{$tag->name}}</span></a>
            @endforeach
        </div>
    </div>
@endsection