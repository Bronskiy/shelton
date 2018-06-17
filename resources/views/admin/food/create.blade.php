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

{!! Form::open(array('files' => true, 'route' => config('quickadmin.route').'.food.store', 'id' => 'form-with-validation', 'class' => 'form-horizontal')) !!}

<div class="form-group">
    {!! Form::label('food_title', 'Название*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('food_title', old('food_title'), array('class'=>'form-control', 'id'=>'title')) !!}

    </div>
</div><div class="form-group">
    {!! Form::label('food_slug', 'URL*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('food_slug', old('food_slug'), array('class'=>'form-control', 'id'=>'slug')) !!}

    </div>
</div>
<div class="form-group">
    {!! Form::label('food_consist', 'Состав', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('food_consist', old('food_consist'), array('class'=>'form-control')) !!}

    </div>
</div>
<div class="form-group">
    {!! Form::label('food_qty', 'Вес/Емкость/Количество', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('food_qty', old('food_qty'), array('class'=>'form-control')) !!}

    </div>
</div><div class="form-group">
    {!! Form::label('food_price', 'Стоимость', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('food_price', old('food_price'), array('class'=>'form-control')) !!}

    </div>
</div><div class="form-group">
    {!! Form::label('food_image', 'Изображение', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::file('food_image') !!}
        {!! Form::hidden('food_image_w', 4096) !!}
        {!! Form::hidden('food_image_h', 4096) !!}

    </div>
</div><div class="form-group">
    {!! Form::label('foodcategories_id', 'Категория*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::select('foodcategories_id', $foodcategories, old('foodcategories_id'), array('class'=>'form-control')) !!}

    </div>
</div><div class="form-group">
    {!! Form::label('language_id', 'Язык*', array('class'=>'col-sm-2 control-label')) !!}
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
