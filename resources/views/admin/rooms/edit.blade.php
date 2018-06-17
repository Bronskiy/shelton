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

{!! Form::model($rooms, array('class' => 'form-horizontal', 'id' => 'form-with-validation', 'method' => 'PUT', 'route' => array(config('quickadmin.route').'.rooms.update', $rooms->id), 'files' => true,)) !!}

<div class="form-group">
  {!! Form::label('room_title', 'Название*', array('class'=>'col-sm-2 control-label')) !!}
  <div class="col-sm-10">
    {!! Form::text('room_title', old('room_title',$rooms->room_title), array('class'=>'form-control')) !!}

  </div>
</div><div class="form-group">
  {!! Form::label('room_slug', 'URL*', array('class'=>'col-sm-2 control-label')) !!}
  <div class="col-sm-10">
    {!! Form::text('room_slug', old('room_slug',$rooms->room_slug), array('class'=>'form-control')) !!}

  </div>
</div><div class="form-group">
  {!! Form::label('room_text', 'Описание', array('class'=>'col-sm-2 control-label')) !!}
  <div class="col-sm-10">
    {!! Form::textarea('room_text', old('room_text',$rooms->room_text), array('class'=>'form-control ckeditor')) !!}

  </div>
</div><div class="form-group">
  {!! Form::label('room_price', 'Стоимость за час', array('class'=>'col-sm-2 control-label')) !!}
  <div class="col-sm-10">
    {!! Form::text('room_price', old('room_price',$rooms->room_price), array('class'=>'form-control')) !!}

  </div>
</div>
<div class="form-group">
  {!! Form::label('room_price_night', 'Стоимость за ночь', array('class'=>'col-sm-2 control-label')) !!}
  <div class="col-sm-10">
    {!! Form::text('room_price_night', old('room_price_night',$rooms->room_price_night), array('class'=>'form-control')) !!}

  </div>
</div>
<div class="form-group">
  {!! Form::label('room_price_24', 'Стоимость за сутки', array('class'=>'col-sm-2 control-label')) !!}
  <div class="col-sm-10">
    {!! Form::text('room_price_24', old('room_price_24',$rooms->room_price_24), array('class'=>'form-control')) !!}

  </div>
</div>
<div class="form-group">
  {!! Form::label('room_photo', 'Главное изображение', array('class'=>'col-sm-2 control-label')) !!}
  <div class="col-sm-10">
    {!! Form::file('room_photo') !!}
    {!! Form::hidden('room_photo_w', 4096) !!}
    {!! Form::hidden('room_photo_h', 4096) !!}

  </div>
</div>
<div class="form-group">

  {!! Form::label('room_gallery', 'Все фото номера', array('class'=>'col-sm-2 control-label')) !!}
  <div class="col-sm-10">
    {!! Form::file('room_gallery[]', [
    'multiple',
    'class' => 'form-control file-upload',
    'data-url' => route('admin.media.upload'),
    'data-bucket' => 'room_gallery',
    'data-filekey' => 'room_gallery',
    ]) !!}
    <div class="photo-block">
      <div class="progress-bar form-group">&nbsp;</div>
      <div class="files-list">
        @foreach($rooms->getMedia('room_gallery') as $media)
        <p class="form-group">
          <a href="{{ $media->getUrl() }}" target="_blank">{{ $media->name }} ({{ $media->size }} KB)</a>
          <a href="#" class="btn btn-xs btn-danger remove-file">Remove</a>
          <input type="hidden" name="room_gallery[]" value="{{ $media->id }}">
        </p>
        @endforeach
      </div>
    </div>
    @if($errors->has('room_gallery'))
    <p class="help-block">
      {{ $errors->first('room_gallery') }}
    </p>
    @endif
  </div>
</div>

<div class="form-group">
  {!! Form::label('roomcategories_id', 'Категория*', array('class'=>'col-sm-2 control-label')) !!}
  <div class="col-sm-10">
    {!! Form::select('roomcategories[]', $roomcategories, old('roomcategories') ? old('roomcategories') : $rooms->roomcategories->pluck('id')->toArray(), ['class' => 'form-control select2', 'multiple' => 'multiple', 'id' => 'selectall-roomcategories' ]) !!}

  </div>
</div>
<div class="form-group">
  {!! Form::label('language_id', 'Язык*', array('class'=>'col-sm-2 control-label')) !!}
  <div class="col-sm-10">
    {!! Form::select('language_id', $language, old('language_id',$rooms->language_id), array('class'=>'form-control')) !!}

  </div>
</div>

<div class="form-group">
  <div class="col-sm-10 col-sm-offset-2">
    {!! Form::submit(trans('quickadmin::templates.templates-view_edit-update'), array('class' => 'btn btn-primary')) !!}
    {!! link_to_route(config('quickadmin.route').'.rooms.index', trans('quickadmin::templates.templates-view_edit-cancel'), null, array('class' => 'btn btn-default')) !!}
  </div>
</div>

{!! Form::close() !!}

@endsection
@section('javascript')
@parent

<script src="{{ asset('quickadmin/plugins/fileUpload/js/jquery.iframe-transport.js') }}"></script>
<script src="{{ asset('quickadmin/plugins/fileUpload/js/jquery.fileupload.js') }}"></script>
<script>
$(function () {
  $('.file-upload').each(function () {
    var $this = $(this);
    var $parent = $(this).parent();

    $(this).fileupload({
      dataType: 'json',
      formData: {
        model_name: 'Rooms',
        bucket: $this.data('bucket'),
        file_key: $this.data('filekey'),
        _token: '{{ csrf_token() }}'
      },
      add: function (e, data) {
        data.submit();
      },
      done: function (e, data) {
        $.each(data.result.files, function (index, file) {
          var $line = $($('<p/>', {class: "form-group"}).html(file.name + ' (' + file.size + ' bytes)').appendTo($parent.find('.files-list')));
          $line.append('<a href="#" class="btn btn-xs btn-danger remove-file">Remove</a>');
          $line.append('<input type="hidden" name="' + $this.data('bucket') + '_id[]" value="' + file.id + '"/>');
          if ($parent.find('.' + $this.data('bucket') + '-ids').val() != '') {
            $parent.find('.' + $this.data('bucket') + '-ids').val($parent.find('.' + $this.data('bucket') + '-ids').val() + ',');
          }
          $parent.find('.' + $this.data('bucket') + '-ids').val($parent.find('.' + $this.data('bucket') + '-ids').val() + file.id);
        });
        $parent.find('.progress-bar').hide().css(
          'width',
          '0%'
        );
      }
    }).on('fileuploadprogressall', function (e, data) {
      var progress = parseInt(data.loaded / data.total * 100, 10);
      $parent.find('.progress-bar').show().css(
        'width',
        progress + '%'
      );
    });
  });
  $(document).on('click', '.remove-file', function () {
    var $parent = $(this).parent();
    $parent.remove();
    return false;
  });
});
</script>
@stop
