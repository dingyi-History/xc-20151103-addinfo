{!! csrf_field() !!}
<fieldset id="users_form">
    <legend class="create-form-title">{{$form_title}}</legend>
    <div class="form-group row" v-bind:class="{ 'has-error': is_error.realname,'has-success':is_ok.realname }">
        {!! Form::label('realname','真实姓名',['class' => 'col-md-2 control-label']) !!}
        <div class="col-md-10">
            {!! Form::text('realname',null,['class' => 'form-control','v-model' => 'users.realname' ,'@keyup' => "realnamevalidate", '@keydown' => "realnamevalidate"]) !!}
            <span class="form-span-error pull-left" v-model="error.realname" v-text="error.realname"></span>
            @if ($errors->has('realname'))
                <span class="form-span-error" v-model="backend.realname" v-text="backend.realname"></span>
            @endif
        </div>
    </div>

    <div class="form-group row">
        {!! Form::label('dep_id','部门',['class' => 'col-md-2 control-label']) !!}
        <div class="col-md-10">
            @can('see-all')
            {!! Form::select('dep_id',$deps,null,['class'=>'form-control']) !!}
            @endcan
            @can('see-dep')
            <input name="dep_id" class="form-control" type="text" value="{{Auth::user()['dep_id']}}" readonly>
            @endcan
            @if ($errors->has('dep_id'))
                <span class="form-span-error" v-model="backend.dep" v-text="backend.dep"></span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('authority','权限',['class' => 'col-md-2 control-label']) !!}
        <div class="col-md-10">
            {!! Form::select('authority',$authority,null,['class'=>'form-control']) !!}
            @if ($errors->has('authority'))
                <span class="form-span-error" v-model="backend.authority" v-text="backend.authority"></span>
            @endif
        </div>
    </div>
    <div class="form-group row" v-bind:class="{ 'has-error': is_error.email,'has-success':is_ok.email }">
        {!! Form::label('email','邮箱',['class' => 'col-md-2 control-label']) !!}
        <div class="col-md-10">
            {!! Form::text('email',null,['class' => 'form-control','placeholder' => "为员工登录账户example@xici.net",'v-model' => 'users.email' ,'@keyup' => "emailvalidate", '@keydown' => "emailvalidate"]) !!}
            <span class="form-span-error pull-left" v-model="error.email" v-text="error.email"></span>
            @if ($errors->has('email'))
                <span class="form-span-error" v-model="backend.email" v-text="backend.email"></span>
            @endif
        </div>
    </div>
    <div class="form-group row"
         v-bind:class="{ 'has-error': {{$vbinderror}},'has-success':{{$vbindsuccess}}}">
        {!! Form::label('password','密码',['class' => 'col-md-2 control-label']) !!}
        <div class="col-md-10">
            {!! Form::password('password',['class' => 'form-control','placeholder' => $pwdplaceholder,'v-model' => $pwdmodel ,'@keyup' => $pwdkey, '@keydown' => $pwdkey])!!}
            <span class="form-span-error pull-left" v-model="{{$errormodel}}" v-text="{{$errormodel}}"></span>
            @if ($errors->has('password'))
                <span class="form-span-error" v-model="backend.password" v-text="backend.password"></span>
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