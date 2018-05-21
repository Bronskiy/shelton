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

{!! Form::model($commondata, array('class' => 'form-horizontal', 'id' => 'form-with-validation', 'method' => 'PATCH', 'route' => array(config('quickadmin.route').'.commondata.update', $commondata->id))) !!}

<div class="form-group">
    {!! Form::label('common_phone_1', 'Телефон 1*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('common_phone_1', old('common_phone_1',$commondata->common_phone_1), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('common_phone_2', 'Телефон 2', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('common_phone_2', old('common_phone_2',$commondata->common_phone_2), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('common_address', 'Адрес', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('common_address', old('common_address',$commondata->common_address), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('common_map', 'Код карты', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('common_map', old('common_map',$commondata->common_map), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('common_email', 'Email', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('common_email', old('common_email',$commondata->common_email), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('common_ganalytics', 'Код Google Analytics', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('common_ganalytics', old('common_ganalytics',$commondata->common_ganalytics), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('common_metrika', 'Код Яндекс Метрики', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('common_metrika', old('common_metrika',$commondata->common_metrika), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('language_id', 'Язык*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::select('language_id', $language, old('language_id',$commondata->language_id), array('class'=>'form-control')) !!}
        
    </div>
</div>

<div class="form-group">
    <div class="col-sm-10 col-sm-offset-2">
      {!! Form::submit(trans('quickadmin::templates.templates-view_edit-update'), array('class' => 'btn btn-primary')) !!}
      {!! link_to_route(config('quickadmin.route').'.commondata.index', trans('quickadmin::templates.templates-view_edit-cancel'), null, array('class' => 'btn btn-default')) !!}
    </div>
</div>

{!! Form::close() !!}

@endsection