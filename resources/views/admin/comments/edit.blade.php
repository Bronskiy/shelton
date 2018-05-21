@extends('admin.layouts.master')

@section('content')

<div class="row">
    <div class="col-sm-10 col-sm-offset-2">
        <h1>{{ trans('quickadmin::templates.templates-view_edit-edit') }}</h1>

        @if ($errors->any())
        	<div class="alert alert-danger">
        	    <ul>
                    {!! implode('', $errors->all('<li class="error">:message</li>')) !!}
                </ul>
        	</div>
        @endif
    </div>
</div>

{!! Form::model($comments, array('class' => 'form-horizontal', 'id' => 'form-with-validation', 'method' => 'PATCH', 'route' => array(config('quickadmin.route').'.comments.update', $comments->id))) !!}

<div class="form-group">
    {!! Form::label('comment_name', 'Имя', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('comment_name', old('comment_name',$comments->comment_name), array('class'=>'form-control')) !!}

    </div>
</div><div class="form-group">
    {!! Form::label('comment_phone', 'Телефон', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('comment_phone', old('comment_phone',$comments->comment_phone), array('class'=>'form-control')) !!}

    </div>
</div><div class="form-group">
    {!! Form::label('comment_email', 'Email', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('comment_email', old('comment_email',$comments->comment_email), array('class'=>'form-control')) !!}

    </div>
</div><div class="form-group">
    {!! Form::label('comment_text', 'Комментарий', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::textarea('comment_text', old('comment_text',$comments->comment_text), array('class'=>'form-control')) !!}

    </div>
</div><div class="form-group">
    {!! Form::label('comment_admin', 'Комментарий', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::textarea('comment_admin', old('comment_admin',$comments->comment_admin), array('class'=>'form-control')) !!}

    </div>
</div><div class="form-group">
    {!! Form::label('rooms_id', 'Номер', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::select('rooms_id', $rooms, old('rooms_id',$comments->rooms_id), array('class'=>'form-control')) !!}

    </div>
</div><div class="form-group">
    {!! Form::label('language_id', 'Язык', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::select('language_id', $language, old('language_id',$comments->language_id), array('class'=>'form-control')) !!}

    </div>
</div>

<div class="form-group">
    <div class="col-sm-10 col-sm-offset-2">
      {!! Form::submit(trans('quickadmin::templates.templates-view_edit-update'), array('class' => 'btn btn-primary')) !!}
      {!! link_to_route(config('quickadmin.route').'.comments.index', trans('quickadmin::templates.templates-view_edit-cancel'), null, array('class' => 'btn btn-default')) !!}
    </div>
</div>

{!! Form::close() !!}

@endsection
