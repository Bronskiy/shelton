@extends('admin.layouts.master')

@section('content')

<div class="row">
    <div class="col-sm-10 col-sm-offset-2">
        <h1>{{ trans('quickadmin::templates.templates-view_create-add_new') }}</h1>

        @if ($errors->any())
        	<div class="alert alert-danger">
        	    <ul>
                    {!! implode('', $errors->all('<li class="error">:message</li>')) !!}
                </ul>
        	</div>
        @endif
    </div>
</div>

{!! Form::open(array('route' => config('quickadmin.route').'.comments.store', 'id' => 'form-with-validation', 'class' => 'form-horizontal')) !!}

<div class="form-group">
    {!! Form::label('comment_name', 'Имя', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('comment_name', old('comment_name'), array('class'=>'form-control')) !!}

    </div>
</div><div class="form-group">
    {!! Form::label('comment_phone', 'Телефон', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('comment_phone', old('comment_phone'), array('class'=>'form-control')) !!}

    </div>
</div><div class="form-group">
    {!! Form::label('comment_email', 'Email', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('comment_email', old('comment_email'), array('class'=>'form-control')) !!}

    </div>
</div><div class="form-group">
    {!! Form::label('comment_text', 'Комментарий', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::textarea('comment_text', old('comment_text'), array('class'=>'form-control')) !!}

    </div>
</div>
<div class="form-group">
    {!! Form::label('comment_admin', 'Ответ администратора', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::textarea('comment_admin', old('comment_admin'), array('class'=>'form-control')) !!}

    </div>
</div>
<div class="form-group">
    {!! Form::label('comment_confirmation', 'Модерация', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
      {!! Form::select('comment_confirmation', $enum_comment_confirmation, old('comment_confirmation'), ['class' => 'form-control select2']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('rooms_id', 'Номер', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::select('rooms_id', $rooms, old('rooms_id'), array('class'=>'form-control')) !!}

    </div>
</div><div class="form-group">
    {!! Form::label('language_id', 'Язык', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::select('language_id', $language, old('language_id'), array('class'=>'form-control')) !!}

    </div>
</div>

<div class="form-group">
    <div class="col-sm-10 col-sm-offset-2">
      {!! Form::submit( trans('quickadmin::templates.templates-view_create-create') , array('class' => 'btn btn-primary')) !!}
    </div>
</div>

{!! Form::close() !!}

@endsection
