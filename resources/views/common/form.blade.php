{!! Form::token() !!}
<fieldset>
    <legend class="create-form-title">{{$form_title}}</legend>
    <div class="form-group row">
        {!! Form::label('name','真实姓名',['class' => 'col-md-2 control-label']) !!}
        <div class="col-md-10">
            {!! Form::text('name',null,['class' => 'form-control']) !!}
            @if ($errors->has('name'))
                <span class="form-span-error">* 请输入姓名</span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('phone','手机号',['class' => 'col-md-2 control-label']) !!}
        <div class="col-md-10">
            {!! Form::text('phone',null,['class' => 'form-control']) !!}
            @if ($errors->has('phone'))
                <span class="form-span-error">* 请正确输入手机号</span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('identity','身份证号',['class' => 'col-md-2 control-label']) !!}
        <div class="col-md-10">
            {!! Form::text('identity',null,['class' => 'form-control']) !!}
            @if ($errors->has('identity'))
                <span class="form-span-error">* 请正确输入身份证号</span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('email','邮箱',['class' => 'col-md-2 control-label']) !!}
        <div class="col-md-10">
            {!! Form::text('email',null,['class' => 'form-control']) !!}
            @if ($errors->has('email'))
                <span class="form-span-error">* 请正确输入邮箱</span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('sex','性别',['class' => 'col-md-2 control-label']) !!}
        <div class="col-md-10">
            {!! Form::select('sex',$data['sex'],null,['class'=>'form-control'] ) !!}
            @if ($errors->has('sex'))
                <span class="form-span-error">* 请正确选择性别</span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('relationship_status','情感状况',['class' => 'col-md-2 control-label']) !!}
        <div class="col-md-10">
            {!! Form::select('relationship_status',$data['status'],null,['class'=>'form-control'] ) !!}
            @if ($errors->has('relationship_status'))
                <span class="form-span-error">* 请正确选择情感状况</span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('orietation','性取向',['class' => 'col-md-2 control-label']) !!}
        <div class="col-md-10">
            {!! Form::select('sex_orietation',$data['orietation'],null,['class'=>'form-control']) !!}
            @if ($errors->has('sex_orietation'))
                <span class="form-span-error">* 请正确选择性取向</span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('income_level','收入等级',['class' => 'col-md-2 control-label']) !!}
        <div class="col-md-10">
            {!! Form::select('income_level',$data['income'],null,['class'=>'form-control']) !!}
            @if ($errors->has('income_level'))
                <span class="form-span-error">* 请正确选择收入等级</span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('blood_type','血型',['class' => 'col-md-2 control-label']) !!}
        <div class="col-md-10">
            {!! Form::select('blood_type',$data['blood'],null,['class'=>'form-control']) !!}
            @if ($errors->has('blood_type'))
                <span class="form-span-error">* 请正确选择血型</span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('birthday','生日',['class' => 'col-md-2 control-label']) !!}
        <div class="col-md-10">
            {!! Form::input('date','birthday',date('Y-m-d'),['class' => ' form-control','style' => 'height:38px;','placeholder' => '格式:1990-10-1']) !!}
            @if ($errors->has('birthday'))
                <span class="form-span-error">* 请正确输入生日,格式:1990-10-1</span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('residence','当前所在地',['class' => 'col-md-2 control-label']) !!}
        <div class="col-md-10">
            {!! Form::text('residence',null,['class' => 'form-control']) !!}
            @if ($errors->has('residence'))
                <span class="form-span-error">* 请正确输入当前所在地</span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('hometown','家乡',['class' => 'col-md-2 control-label']) !!}
        <div class="col-md-10">
            {!! Form::text('hometown',null,['class' => 'form-control']) !!}
            @if ($errors->has('hometown'))
                <span class="form-span-error">* 请正确输入家乡</span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('degree','学历',['class' => 'col-md-2 control-label']) !!}
        <div class="col-md-10">
            {!! Form::text('degree',null,['class' => ' form-control']) !!}
            @if ($errors->has('degree'))
                <span class="form-span-error">* 请正确输入学历</span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('school','毕业学校',['class' => 'col-md-2 control-label']) !!}
        <div class="col-md-10">
            {!! Form::text('school',null,['class' => ' form-control']) !!}
            @if ($errors->has('school'))
                <span class="form-span-error">* 请正确输入毕业学校</span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('major','专业',['class' => 'col-md-2 control-label']) !!}
        <div class="col-md-10">
            {!! Form::text('major',null,['class' => ' form-control']) !!}
            @if ($errors->has('major'))
                <span class="form-span-error">* 请正确输入专业</span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('profession','职业',['class' => 'col-md-2 control-label']) !!}
        <div class="col-md-10">
            {!! Form::text('profession',null,['class' => 'form-control']) !!}
            @if ($errors->has('profession'))
                <span class="form-span-error">* 请正确输入职业</span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('qq','qq号',['class' => 'col-md-2 control-label']) !!}
        <div class="col-md-10">
            {!! Form::text('qq',null,['class' => 'form-control']) !!}
            @if ($errors->has('qq'))
                <span class="form-span-error">* 请正确输入qq号</span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('weibo','微博号',['class' => 'col-md-2 control-label']) !!}
        <div class="col-md-10">
            {!! Form::text('weibo',null,['class' => ' form-control']) !!}
            @if ($errors->has('weibo'))
                <span class="form-span-error">* 请正确输入微博号</span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('weixin','微信号',['class' => 'col-md-2 control-label']) !!}
        <div class="col-md-10">
            {!! Form::text('weixin',null,['class' => ' form-control']) !!}
            @if ($errors->has('weixin'))
                <span class="form-span-error">* 请正确输入微信号</span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('source','来源',['class' => 'col-md-2 control-label']) !!}
        <div class="col-md-10">
            {!! Form::text('source',null,['class' => ' form-control']) !!}
            @if ($errors->has('source'))
                <span class="form-span-error">* 请正确输入来源</span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('user_id','西祠ID',['class' => 'col-md-2 control-label']) !!}
        <div class="col-md-10">
            {!! Form::text('user_id',null,['class' => 'col-md-10 form-control']) !!}
            @if ($errors->has('user_id'))
                <span class="form-span-error">* 请正确输入西祠ID</span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('screen_name','西祠用户名',['class' => 'col-md-2 control-label']) !!}
        <div class="col-md-10">
            {!! Form::text('screen_name',null,['class' => ' form-control']) !!}
            @if ($errors->has('screen_name'))
                <span class="form-span-error">* 请正确输入西祠用户名</span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('address','联系地址',['class' => 'col-md-2 control-label']) !!}
        <div class="col-md-10">
            {!! Form::text('address',null,['class' => ' form-control']) !!}
            @if ($errors->has('address'))
                <span class="form-span-error">* 请正确输入联系地址</span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('remark','备注',['class' => 'col-md-2 control-label']) !!}
        <div class="col-md-10">
            {!! Form::textarea('remark',null,['class' => ' form-control','rows' => '3','placeholder' => '无']) !!}
            @if ($errors->has('remark'))
                <span class="form-span-error">* 请正确输入备注</span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-8"></div>
        <div class="col-md-2">
            <button type="reset" class="btn btn-primary-outline btn-block">重置</button>
        </div>
        <div class="col-sm-2">
            <button type="submit" class="btn btn-success-outline btn-block">保存</button>
        </div>
    </div>
</fieldset>