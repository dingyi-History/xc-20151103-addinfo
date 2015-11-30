<div class="form-group row">
    {!! Form::label('name',"用户名",['class' => 'col-md-3 col-md-offset-1 control-label text-center','style' => 'line-height:40px;']) !!}
    <div class="col-md-8">
        <p style="line-height: 40px;">{{$userinfo->name}}</p>

    </div>
</div>

<div class="form-group row">
    {!! Form::label('name',"用户ID",['class' => 'col-md-3 col-md-offset-1 control-label text-center','style' => 'line-height:40px;']) !!}
    <div class="col-md-7">
        <p style="line-height: 40px;">{{$userinfo->id}}</p>
        {!! Form::hidden('info_id',$userinfo->id,['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group row">
    {!! Form::label('dotime','时间',['class' => 'col-md-3 col-md-offset-1 control-label text-center','style' => 'line-height:40px;']) !!}
    <div class="col-md-7">
        {!! Form::input('dotime','dotime',date('Y-m-d h:m'),['class' => ' form-control','style' => 'height:38px;','placeholder' => '格式:1990-10-1']) !!}
    </div>
</div>

<div class="form-group row">
    {!! Form::label('docontent','记录内容',['class' => 'col-md-3 col-md-offset-1 control-label text-center','style' => 'line-height:40px;']) !!}
    <div class="col-md-7">
        {!! Form::textarea('docontent',null,['class' => 'form-control','rows'=>'2']) !!}
    </div>
</div>

