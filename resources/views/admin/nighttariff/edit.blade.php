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

{!! Form::model($nighttariff, array('files' => true, 'class' => 'form-horizontal', 'id' => 'form-with-validation', 'method' => 'PATCH', 'route' => array(config('quickadmin.route').'.nighttariff.update', $nighttariff->id))) !!}

<div class="form-group">
    {!! Form::label('night_tariff_title', 'Заголовок*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('night_tariff_title', old('night_tariff_title',$nighttariff->night_tariff_title), array('class'=>'form-control')) !!}

    </div>
</div><div class="form-group">
    {!! Form::label('night_tariff_slug', 'URL*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('night_tariff_slug', old('night_tariff_slug',$nighttariff->night_tariff_slug), array('class'=>'form-control')) !!}

    </div>
</div>
<div class="form-group">
    {!! Form::label('night_tariff_image', 'Изображение', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::file('night_tariff_image') !!}
        {!! Form::hidden('night_tariff_image_w', 4096) !!}
        {!! Form::hidden('night_tariff_image_h', 4096) !!}

    </div>
</div><div class="form-group">
    {!! Form::label('night_tariff_text', 'Текст', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::textarea('night_tariff_text', old('night_tariff_text',$nighttariff->night_tariff_text), array('class'=>'form-control ckeditor')) !!}

    </div>
</div><div class="form-group">
    {!! Form::label('night_tariff_seo_title', 'SEO Заголовок', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('night_tariff_seo_title', old('night_tariff_seo_title',$nighttariff->night_tariff_seo_title), array('class'=>'form-control')) !!}

    </div>
</div><div class="form-group">
    {!! Form::label('night_tariff_seo_keywords', 'SEO Ключевые слова', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('night_tariff_seo_keywords', old('night_tariff_seo_keywords',$nighttariff->night_tariff_seo_keywords), array('class'=>'form-control')) !!}

    </div>
</div><div class="form-group">
    {!! Form::label('night_tariff_seo_description', 'SEO Описание', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::textarea('night_tariff_seo_description', old('night_tariff_seo_description',$nighttariff->night_tariff_seo_description), array('class'=>'form-control')) !!}

    </div>
</div>
<div class="form-group">
    {!! Form::label('language_id', 'Язык*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::select('language_id', $language, old('language_id',$nighttariff->language_id), array('class'=>'form-control')) !!}

    </div>
</div>
<div class="form-group">
    <div class="col-sm-10 col-sm-offset-2">
      {!! Form::submit(trans('quickadmin::templates.templates-view_edit-update'), array('class' => 'btn btn-primary')) !!}
      {!! link_to_route(config('quickadmin.route').'.nighttariff.index', trans('quickadmin::templates.templates-view_edit-cancel'), null, array('class' => 'btn btn-default')) !!}
    </div>
</div>

{!! Form::close() !!}

@endsection
