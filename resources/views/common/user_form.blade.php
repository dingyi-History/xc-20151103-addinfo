{!! csrf_field() !!}
<fieldset>
    <legend class="create-form-title">{{$form_title}}</legend>
    <div class="form-group row">
        {!! Form::label('realname','真实姓名',['class' => 'col-md-2 control-label']) !!}
        <div class="col-md-10">
            {!! Form::text('realname',null,['class' => 'form-control']) !!}
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
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('authority','权限',['class' => 'col-md-2 control-label']) !!}
        <div class="col-md-10">
            {!! Form::select('authority',$authority,null,['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('email','邮箱',['class' => 'col-md-2 control-label']) !!}
        <div class="col-md-10">
            {!! Form::text('email',null,['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('password','密码',['class' => 'col-md-2 control-label']) !!}
        <div class="col-md-10">
            {!! Form::text('password', null,['class' => 'form-control']) !!}
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