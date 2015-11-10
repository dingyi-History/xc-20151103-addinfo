{!! Form::token() !!}
<fieldset>
    <legend class="create-form-title">{{$form_title}}</legend>
    <div class="form-group row">
        {!! Form::label('name','真实姓名',['class' => 'col-md-2 control-label']) !!}
        <div class="col-md-10">
            {!! Form::text('name',null,['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('phone','手机号',['class' => 'col-md-2 control-label']) !!}
        <div class="col-md-10">
            {!! Form::text('phone',null,['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('identity','身份证号',['class' => 'col-md-2 control-label']) !!}
        <div class="col-md-10">
            {!! Form::text('identity',null,['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('email','邮箱',['class' => 'col-md-2 control-label']) !!}
        <div class="col-md-10">
            {!! Form::text('email',null,['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('sex','性别',['class' => 'col-md-2 control-label']) !!}
        <div class="col-md-10">
            {!! Form::select('sex',$data['sex'],null,['class'=>'form-control'] ) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('relationship_status','情感状况',['class' => 'col-md-2 control-label']) !!}
        <div class="col-md-10">
            {!! Form::select('relationship_status',$data['status'],null,['class'=>'form-control'] ) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('orietation','性取向',['class' => 'col-md-2 control-label']) !!}
        <div class="col-md-10">
            {!! Form::select('sex_orietation',$data['orietation'],null,['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('income_level','收入等级',['class' => 'col-md-2 control-label']) !!}
        <div class="col-md-10">
            {!! Form::select('income_level',$data['income'],null,['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('blood_type','血型',['class' => 'col-md-2 control-label']) !!}
        <div class="col-md-10">
            {!! Form::select('blood_type',$data['blood'],null,['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('birthday','生日',['class' => 'col-md-2 control-label']) !!}
        <div class="col-md-10">
            {!! Form::input('date','birthday',date('Y-m-d'),['class' => ' form-control','style' => 'height:38px;']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('residence','当前所在地',['class' => 'col-md-2 control-label']) !!}
        <div class="col-md-10">
            {!! Form::text('residence',null,['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('hometown','家乡',['class' => 'col-md-2 control-label']) !!}
        <div class="col-md-10">
            {!! Form::text('hometown',null,['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('degree','学历',['class' => 'col-md-2 control-label']) !!}
        <div class="col-md-10">
            {!! Form::text('degree',null,['class' => ' form-control']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('school','毕业学校',['class' => 'col-md-2 control-label']) !!}
        <div class="col-md-10">
            {!! Form::text('school',null,['class' => ' form-control']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('major','专业',['class' => 'col-md-2 control-label']) !!}
        <div class="col-md-10">
            {!! Form::text('major',null,['class' => ' form-control']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('profession','职业',['class' => 'col-md-2 control-label']) !!}
        <div class="col-md-10">
            {!! Form::text('profession',null,['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('qq','qq号',['class' => 'col-md-2 control-label']) !!}
        <div class="col-md-10">
            {!! Form::text('qq',null,['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('weibo','微博号',['class' => 'col-md-2 control-label']) !!}
        <div class="col-md-10">
            {!! Form::text('weibo',null,['class' => ' form-control']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('weixin','微信号',['class' => 'col-md-2 control-label']) !!}
        <div class="col-md-10">
            {!! Form::text('weixin',null,['class' => ' form-control']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('source','来源',['class' => 'col-md-2 control-label']) !!}
        <div class="col-md-10">
            {!! Form::text('source',null,['class' => ' form-control']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('user_id','西祠ID',['class' => 'col-md-2 control-label']) !!}
        <div class="col-md-10">
            {!! Form::text('user_id',null,['class' => 'col-md-10 form-control']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('screen_name','西祠用户名',['class' => 'col-md-2 control-label']) !!}
        <div class="col-md-10">
            {!! Form::text('screen_name',null,['class' => ' form-control']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('address','联系地址',['class' => 'col-md-2 control-label']) !!}
        <div class="col-md-10">
            {!! Form::text('address',null,['class' => ' form-control']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('remark','备注',['class' => 'col-md-2 control-label']) !!}
        <div class="col-md-10">
            {!! Form::textarea('remark',null,['class' => ' form-control','rows' => '3','placeholder' => '无']) !!}
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