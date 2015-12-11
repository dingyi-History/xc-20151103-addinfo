@extends('base.base')

@section('content')
    <div class="container border-1 am-animation-slide-left">
        @include('base.title',['title' => '编辑用户资料','tags' => null])
            {!! Form::model($userinfo,['method'=>'PATCH','url'=>'/userinfo/'.$userinfo->id,'class' => 'am-form am-form-horizontal']) !!}
            {!! Form::token() !!}
        <div class="am-g">
            <div class="am-u-md-6">
                <div class="am-form-group am-g">
                    {!! Form::label('name','真实姓名',['class' => 'am-u-md-3 am-form-label']) !!}
                    <div class="am-u-sm-8 am-u-end">
                        {!! Form::text('name',null,['class' => 'form-control','required']) !!}
                        @if ($errors->has('name'))
                            <span class="form-span-error">* 请输入姓名</span>
                        @endif
                    </div>
                </div>
                <div class="am-form-group am-g">
                    {!! Form::label('phone','手机号',['class' => 'am-u-md-3 am-form-label']) !!}
                    <div class="am-u-sm-8 am-u-end">
                        {!! Form::text('phone',null,['class' => 'form-control','required']) !!}
                        @if ($errors->has('phone'))
                            <span class="form-span-error">* 请正确输入手机号或手机号已存在</span>
                        @endif
                    </div>
                </div>
                <div class="am-form-group am-g">
                    {!! Form::label('identity','身份证号',['class' => 'am-u-md-3 am-form-label']) !!}
                    <div class="am-u-sm-8 am-u-end">
                        {!! Form::text('identity',null,['class' => 'form-control','required']) !!}
                        @if ($errors->has('identity'))
                            <span class="form-span-error">* 请正确输入身份证号或身份证号已存在</span>
                        @endif
                    </div>
                </div>

                <div class="am-form-group am-g">
                    {!! Form::label('email','邮箱',['class' => 'am-u-md-3 am-form-label']) !!}
                    <div class="am-u-sm-8 am-u-end">
                        {!! Form::text('email',null,['class' => 'form-control']) !!}
                        @if ($errors->has('email'))
                            <span class="form-span-error">* 请正确输入邮箱</span>
                        @endif
                    </div>
                </div>

                <div class="am-form-group am-g">
                    {!! Form::label('sex','性别',['class' => 'am-u-md-3 am-form-label']) !!}
                    <div class="am-u-sm-8 am-u-end">
                        {!! Form::select('sex',$data['sex'],['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="am-form-group am-g">
                    {!! Form::label('relationship_status','情感状况',['class' => 'am-u-md-3 am-form-label']) !!}
                    <div class="am-u-sm-8 am-u-end">
                        {!! Form::select('relationship_status',$data['status'],null,['class'=>'form-control'] ) !!}
                    </div>
                </div>

                <div class="am-form-group am-g">
                    {!! Form::label('orietation','性取向',['class' => 'am-u-md-3 am-form-label']) !!}
                    <div class="am-u-sm-8 am-u-end">
                        {!! Form::select('orietation',$data['orietation'],null,['class'=>'form-control'] ) !!}
                    </div>
                </div>

                <div class="am-form-group am-g">
                    {!! Form::label('income_level','收入等级',['class' => 'am-u-md-3 am-form-label']) !!}
                    <div class="am-u-sm-8 am-u-end">
                        {!! Form::select('income_level',$data['income'],null,['class'=>'form-control'] ) !!}
                    </div>
                </div>

                <div class="am-form-group am-g">
                    {!! Form::label('blood_type','血型',['class' => 'am-u-md-3 am-form-label']) !!}
                    <div class="am-u-sm-8 am-u-end">
                        {!! Form::select('blood_type',$data['blood'],null,['class'=>'form-control'] ) !!}
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
                        {!! Form::text('residence',null,['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="am-form-group am-g">
                    {!! Form::label('hometown','家乡',['class' => 'am-u-md-3 am-form-label']) !!}
                    <div class="am-u-sm-8 am-u-end">
                        {!! Form::text('hometown',null,['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="am-form-group am-g">
                    {!! Form::label('degree','学历',['class' => 'am-u-md-3 am-form-label']) !!}
                    <div class="am-u-sm-8 am-u-end">
                        {!! Form::text('degree',null,['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>
            <div class="am-u-md-6">
                <div class="am-form-group am-g">
                    {!! Form::label('school','毕业学校',['class' => 'am-u-md-3 am-form-label']) !!}
                    <div class="am-u-sm-8 am-u-end">
                        {!! Form::text('school',null,['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="am-form-group am-g">
                    {!! Form::label('major','专业',['class' => 'am-u-md-3 am-form-label']) !!}
                    <div class="am-u-sm-8 am-u-end">
                        {!! Form::text('major',null,['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="am-form-group am-g">
                    {!! Form::label('profession','职业',['class' => 'am-u-md-3 am-form-label']) !!}
                    <div class="am-u-sm-8 am-u-end">
                        {!! Form::text('profession',null,['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="am-form-group am-g">
                    {!! Form::label('qq','QQ',['class' => 'am-u-md-3 am-form-label']) !!}
                    <div class="am-u-sm-8 am-u-end">
                        {!! Form::text('qq',null,['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="am-form-group am-g">
                    {!! Form::label('weibo','微博',['class' => 'am-u-md-3 am-form-label']) !!}
                    <div class="am-u-sm-8 am-u-end">
                        {!! Form::text('weibo',null,['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="am-form-group am-g">
                    {!! Form::label('weixin','微信',['class' => 'am-u-md-3 am-form-label']) !!}
                    <div class="am-u-sm-8 am-u-end">
                        {!! Form::text('weixin',null,['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="am-form-group am-g">
                    {!! Form::label('source','来源',['class' => 'am-u-md-3 am-form-label']) !!}
                    <div class="am-u-sm-8 am-u-end">
                        {!! Form::text('source',null,['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="am-form-group am-g">
                    {!! Form::label('user_id','西祠ID',['class' => 'am-u-md-3 am-form-label']) !!}
                    <div class="am-u-sm-8 am-u-end">
                        {!! Form::text('user_id',null,['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="am-form-group am-g">
                    {!! Form::label('screen_name','西祠用户名',['class' => 'am-u-md-3 am-form-label']) !!}
                    <div class="am-u-sm-8 am-u-end">
                        {!! Form::text('screen_name',null,['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="am-form-group am-g">
                    {!! Form::label('address','联系地址',['class' => 'am-u-md-3 am-form-label']) !!}
                    <div class="am-u-sm-8 am-u-end">
                        {!! Form::text('address',null,['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="am-form-group am-g">
                    {!! Form::label('remark','备注',['class' => 'am-u-md-3 am-form-label']) !!}
                    <div class="am-u-sm-8 am-u-end">
                        {!! Form::textarea('remark',null,['class' => ' form-control','rows' => '3','placeholder' => '无']) !!}
                    </div>
                </div>

                <div class="am-form-group am-g">
                    {!! Form::label('address','添加标签',['class' => 'am-u-md-3 am-form-label']) !!}
                    <div class="am-u-sm-8 am-u-end">
                        {!! Form::text('address',null,['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="am-form-group am-g">
            <input type="submit" class="am-btn am-btn-success am-fr" value="保存"/>
            <button type="reset" class="am-btn am-btn-default am-fr">重置</button>
        </div>
        {!! Form::close() !!}

    </div>

@endsection