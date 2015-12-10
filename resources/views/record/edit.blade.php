@extends('base.base')

@section('content')
    <div class="container border-1 am-animation-slide-left">
        @include('base.title',['title' => '编辑记录'])
        <form class="am-form am-form-horizontal" action="/do/{{$datas->id}}" method="post">
            <input type="hidden" name="_method" value="PATCH"/>
            {!! csrf_field() !!}
            <fieldset>
                <div class="am-form-group am-g">
                    <label class="am-u-md-3 am-form-label">用户名</label>
                    <div class="am-u-md-5 am-u-end">
                        <p style="line-height: 40px;">{{$userinfo->name}}</p>
                    </div>
                </div>

                <div class="am-form-group am-g">
                    <label class="am-u-md-3 am-form-label">用户ID</label>
                    <div class="am-u-md-5 am-u-end">
                        <p style="line-height: 40px;">{{$userinfo->id}}</p>
                        {!! Form::hidden('info_id',$userinfo->id,['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="am-form-group am-g">
                    <label class="am-u-md-3 am-form-label">时间</label>
                    <div class="am-u-md-5 am-u-end">
                        <p>
                            <input name="dotime" type="text" class="am-form-field" placeholder="添加时间"
                                   data-am-datepicker="{theme: 'primary'}"
                                   value="{{ date("Y-m-d",strtotime($datas->dotime))}}" readonly/>
                        </p>
                        @if ($errors->has('dotime'))
                            <span class="form-span-error">* 请选择时间</span>
                        @endif
                    </div>
                </div>

                <div class="am-form-group am-g">
                    <label class="am-u-md-3 am-form-label">记录内容</label>
                    <div class="am-u-md-5 am-u-end">
                        <textarea class="" rows="3" id="doc-ta-1" name="docontent">{{$datas->docontent}}</textarea>
                        @if ($errors->has('docontent'))
                            <span class="form-span-error">* 请输入内容</span>
                        @endif
                    </div>
                </div>

                <div class="am-form-group am-g">
                    <div class="am-u-md-8">
                        <button type="submit" class="am-btn am-btn-success am-fr">保存</button>
                    </div>
                </div>

            </fieldset>
        </form>
    </div>
@endsection