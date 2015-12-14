@extends('base.base')
@section('css')
    <link rel="stylesheet" href="/assets/select/select2.min.css">
@endsection
@section('content')
    <div class="container border-1 am-animation-slide-left">
        @include('base.title',['title' => '添加用户资料'])
        <form action="/userinfo" class="am-form am-form-horizontal" method="post">
            <input type="hidden" value="{{csrf_token()}}" name="_token" id="token">
            <div class="am-g">
                <div class="am-u-md-6">
                    <div class="am-form-group am-g">
                        {!! Form::label('name','真实姓名',['class' => 'am-u-md-3 am-form-label']) !!}
                        <div class="am-u-sm-8 am-u-end">
                            {!! Form::text('name',null,['required']) !!}
                            @if ($errors->has('name'))
                                <span class="form-span-error">* 请输入姓名</span>
                            @endif
                        </div>
                    </div>
                    <div class="am-form-group am-g">
                        {!! Form::label('phone','手机号',['class' => 'am-u-md-3 am-form-label']) !!}
                        <div class="am-u-sm-8 am-u-end">
                            {!! Form::text('phone',null,['required']) !!}
                            @if ($errors->has('phone'))
                                <span class="form-span-error">* 请正确输入手机号或手机号已存在</span>
                            @endif
                        </div>
                    </div>
                    <div class="am-form-group am-g">
                        {!! Form::label('identity','身份证号',['class' => 'am-u-md-3 am-form-label']) !!}
                        <div class="am-u-sm-8 am-u-end">
                            {!! Form::text('identity',null,['required']) !!}
                            @if ($errors->has('identity'))
                                <span class="form-span-error">* 请正确输入身份证号或身份证号已存在</span>
                            @endif
                        </div>
                    </div>

                    <div class="am-form-group am-g">
                        {!! Form::label('email','邮箱',['class' => 'am-u-md-3 am-form-label']) !!}
                        <div class="am-u-sm-8 am-u-end">
                            {!! Form::text('email',null,[]) !!}
                            @if ($errors->has('email'))
                                <span class="form-span-error">* 请正确输入邮箱</span>
                            @endif
                        </div>
                    </div>

                    <div class="am-form-group am-g">
                        {!! Form::label('sex','性别',['class' => 'am-u-md-3 am-form-label']) !!}
                        <div class="am-u-sm-8 am-u-end">
                            {!! Form::select('sex',$data['sex'],null,[]) !!}
                        </div>
                    </div>

                    <div class="am-form-group am-g">
                        {!! Form::label('relationship_status','情感状况',['class' => 'am-u-md-3 am-form-label']) !!}
                        <div class="am-u-sm-8 am-u-end">
                            {!! Form::select('relationship_status',$data['status'],null,[] ) !!}
                        </div>
                    </div>

                    <div class="am-form-group am-g">
                        {!! Form::label('sex_orietation','性取向',['class' => 'am-u-md-3 am-form-label']) !!}
                        <div class="am-u-sm-8 am-u-end">
                            {!! Form::select('sex_orietation',$data['orietation'],null,[] ) !!}
                        </div>
                    </div>

                    <div class="am-form-group am-g">
                        {!! Form::label('income_level','收入等级',['class' => 'am-u-md-3 am-form-label']) !!}
                        <div class="am-u-sm-8 am-u-end">
                            {!! Form::select('income_level',$data['income'],null,[] ) !!}
                        </div>
                    </div>

                    <div class="am-form-group am-g">
                        {!! Form::label('blood_type','血型',['class' => 'am-u-md-3 am-form-label']) !!}
                        <div class="am-u-sm-8 am-u-end">
                            {!! Form::select('blood_type',$data['blood'],null,[] ) !!}
                        </div>
                    </div>

                    <div class="am-form-group am-g">
                        {!! Form::label('birthday','生日',['class' => 'am-u-md-3 am-form-label']) !!}
                        <div class="am-u-sm-8 am-u-end">
                            <input name="birthday" type="text" class="am-form-field" placeholder="添加时间"
                                   data-am-datepicker="{theme: 'primary'}" readonly/>
                        </div>
                    </div>

                    <div class="am-form-group am-g">
                        {!! Form::label('residence','当前所在地',['class' => 'am-u-md-3 am-form-label']) !!}
                        <div class="am-u-sm-8 am-u-end">
                            {!! Form::text('residence',null,[]) !!}
                        </div>
                    </div>

                    <div class="am-form-group am-g">
                        {!! Form::label('hometown','家乡',['class' => 'am-u-md-3 am-form-label']) !!}
                        <div class="am-u-sm-8 am-u-end">
                            {!! Form::text('hometown',null,[]) !!}
                        </div>
                    </div>

                    <div class="am-form-group am-g">
                        {!! Form::label('degree','学历',['class' => 'am-u-md-3 am-form-label']) !!}
                        <div class="am-u-sm-8 am-u-end">
                            {!! Form::text('degree',null,[]) !!}
                        </div>
                    </div>
                </div>
                <div class="am-u-md-6">
                    <div class="am-form-group am-g">
                        {!! Form::label('school','毕业学校',['class' => 'am-u-md-3 am-form-label']) !!}
                        <div class="am-u-sm-8 am-u-end">
                            {!! Form::text('school',null,[]) !!}
                        </div>
                    </div>

                    <div class="am-form-group am-g">
                        {!! Form::label('major','专业',['class' => 'am-u-md-3 am-form-label']) !!}
                        <div class="am-u-sm-8 am-u-end">
                            {!! Form::text('major',null,[]) !!}
                        </div>
                    </div>

                    <div class="am-form-group am-g">
                        {!! Form::label('profession','职业',['class' => 'am-u-md-3 am-form-label']) !!}
                        <div class="am-u-sm-8 am-u-end">
                            {!! Form::text('profession',null,[]) !!}
                        </div>
                    </div>

                    <div class="am-form-group am-g">
                        {!! Form::label('qq','QQ',['class' => 'am-u-md-3 am-form-label']) !!}
                        <div class="am-u-sm-8 am-u-end">
                            {!! Form::text('qq',null,[]) !!}
                        </div>
                    </div>

                    <div class="am-form-group am-g">
                        {!! Form::label('weibo','微博',['class' => 'am-u-md-3 am-form-label']) !!}
                        <div class="am-u-sm-8 am-u-end">
                            {!! Form::text('weibo',null,[]) !!}
                        </div>
                    </div>

                    <div class="am-form-group am-g">
                        {!! Form::label('weixin','微信',['class' => 'am-u-md-3 am-form-label']) !!}
                        <div class="am-u-sm-8 am-u-end">
                            {!! Form::text('weixin',null,[]) !!}
                        </div>
                    </div>

                    <div class="am-form-group am-g">
                        {!! Form::label('source','来源',['class' => 'am-u-md-3 am-form-label']) !!}
                        <div class="am-u-sm-8 am-u-end">
                            {!! Form::text('source',null,[]) !!}
                        </div>
                    </div>

                    <div class="am-form-group am-g">
                        {!! Form::label('user_id','西祠ID',['class' => 'am-u-md-3 am-form-label']) !!}
                        <div class="am-u-sm-8 am-u-end">
                            {!! Form::text('user_id',null,[]) !!}
                        </div>
                    </div>

                    <div class="am-form-group am-g">
                        {!! Form::label('screen_name','西祠用户名',['class' => 'am-u-md-3 am-form-label']) !!}
                        <div class="am-u-sm-8 am-u-end">
                            {!! Form::text('screen_name',null,[]) !!}
                        </div>
                    </div>

                    <div class="am-form-group am-g">
                        {!! Form::label('address','联系地址',['class' => 'am-u-md-3 am-form-label']) !!}
                        <div class="am-u-sm-8 am-u-end">
                            {!! Form::text('address',null,[]) !!}
                        </div>
                    </div>

                    <div class="am-form-group am-g">
                        {!! Form::label('remark','备注',['class' => 'am-u-md-3 am-form-label']) !!}
                        <div class="am-u-sm-8 am-u-end">
                            {!! Form::textarea('remark',null,['rows' => '3','placeholder' => '无']) !!}
                        </div>
                    </div>

                    <div class="am-form-group am-g">
                        {!! Form::label('address','添加标签',['class' => 'am-u-md-3 am-form-label']) !!}
                        <div class="am-u-sm-8 am-u-end">
                            {!! Form::select ('tag_list[]',$tags,null,['class'=>'tag','multiple'=>'multiple']) !!}
                        </div>
                    </div>

                    <div class="am-form-group am-g">
                        {!! Form::label('address','新建标签',['class' => 'am-u-md-3 am-form-label']) !!}
                        <div class="am-u-sm-7">
                            <input type="text" id="addtag">
                        </div>
                        <div class="am-u-md-1  am-u-end">
                            <input type="button" class="am-btn am-btn-success am-fr" value="新建" id="tagbtn"/>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="am-form-group am-g am-text-center">
                <button type="reset" class="am-btn am-btn-default">重置</button>
                <input type="submit" class="am-btn am-btn-success" value="保存"/>
            </div>
        </form>
    </div>
@endsection

@section('js')
    @include('base.tag')
@endsection