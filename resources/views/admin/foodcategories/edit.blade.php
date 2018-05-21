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

{!! Form::model($foodcategories, array('files' => true, 'class' => 'form-horizontal', 'id' => 'form-with-validation', 'method' => 'PATCH', 'route' => array(config('quickadmin.route').'.foodcategories.update', $foodcategories->id))) !!}

<div class="form-group">
  {!! Form::label('food_cat_title', 'Название*', array('class'=>'col-sm-2 control-label')) !!}
  <div class="col-sm-10">
    {!! Form::text('food_cat_title', old('food_cat_title',$foodcategories->food_cat_title), array('class'=>'form-control')) !!}

  </div>
</div><div class="form-group">
  {!! Form::label('food_cat_slug', 'URL*', array('class'=>'col-sm-2 control-label')) !!}
  <div class="col-sm-10">
    {!! Form::text('food_cat_slug', old('food_cat_slug',$foodcategories->food_cat_slug), array('class'=>'form-control')) !!}

  </div>
</div>

<div class="form-group">
    {!! Form::label('foodcategories_id', 'Выбрать категорию для перевода', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::select('foodcategories_id', $foodcategories_p, old('foodcategories_id',$foodcategories->foodcategories_id), array('class'=>'form-control')) !!}

    </div>
</div>
<div class="form-group">
    {!! Form::label('food_cat_photo', 'Фотография', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::file('food_cat_photo') !!}
        {!! Form::hidden('food_cat_photo_w', 4096) !!}
        {!! Form::hidden('food_cat_photo_h', 4096) !!}

    </div>
</div>
<div class="form-group">
    {!! Form::label('food_cat_text', 'Описание', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::textarea('food_cat_text', old('food_cat_text',$foodcategories->food_cat_text), array('class'=>'form-control ckeditor')) !!}

    </div>
</div>
<div class="form-group">
    {!! Form::label('language_id', 'Язык', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::select('language_id', $language, old('language_id',$foodcategories->language_id), array('class'=>'form-control')) !!}

    </div>
</div>
<div class="form-group">
  <div class="col-sm-10 col-sm-offset-2">
    {!! Form::submit(trans('quickadmin::templates.templates-view_edit-update'), array('class' => 'btn btn-primary')) !!}
    {!! link_to_route(config('quickadmin.route').'.foodcategories.index', trans('quickadmin::templates.templates-view_edit-cancel'), null, array('class' => 'btn btn-default')) !!}
  </div>
</div>

{!! Form::close() !!}

@endsection
