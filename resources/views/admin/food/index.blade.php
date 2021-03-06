@extends('admin.layouts.master')

@section('content')

<p>{!! link_to_route(config('quickadmin.route').'.food.create', trans('quickadmin::templates.templates-view_index-add_new') , null, array('class' => 'btn btn-success')) !!}</p>

@if ($food->count())
<div class="portlet box green">
  <div class="portlet-title">
    <div class="caption">{{ trans('quickadmin::templates.templates-view_index-list') }}</div>
  </div>
  <div class="portlet-body">
    <table class="table table-striped table-hover table-responsive datatable" id="datatable">
      <thead>
        <tr>
          <th>
            {!! Form::checkbox('delete_all',1,false,['class' => 'mass']) !!}
          </th>
          <th>Название</th>
          <th>Состав</th>
          <th>Вес/Емкость/Количество</th>
          <th>Стоимость</th>
          <th>Изображение</th>
          <th>Категория</th>
          <th>Язык</th>

          <th>&nbsp;</th>
        </tr>
      </thead>

      <tbody>
        @foreach ($food as $row)
        <tr>
          <td>
            {!! Form::checkbox('del-'.$row->id,1,false,['class' => 'single','data-id'=> $row->id]) !!}
          </td>
          <td>{{ $row->food_title }}</td>
          <td>{{ $row->food_consist }}</td>
          <td>{{ $row->food_qty }}</td>
          <td>{{ $row->food_price }}</td>
          <td>@if($row->food_image != '')<img src="{{ asset('uploads/thumb') . '/'.  $row->food_image }}">@endif</td>
          <td>{{ isset($row->foodcategories->food_cat_title) ? $row->foodcategories->food_cat_title : '' }}</td>
          <td>{{ isset($row->language->lang_name) ? $row->language->lang_name : '' }}</td>

          <td>
            {!! link_to_route(config('quickadmin.route').'.food.edit', trans('quickadmin::templates.templates-view_index-edit'), array($row->id), array('class' => 'btn btn-xs btn-info')) !!}
            {!! Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'onsubmit' => "return confirm('".trans("quickadmin::templates.templates-view_index-are_you_sure")."');",  'route' => array(config('quickadmin.route').'.food.destroy', $row->id))) !!}
            {!! Form::submit(trans('quickadmin::templates.templates-view_index-delete'), array('class' => 'btn btn-xs btn-danger')) !!}
            {!! Form::close() !!}
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <div class="row">
      <div class="col-xs-12">
        <button class="btn btn-danger" id="delete">
          {{ trans('quickadmin::templates.templates-view_index-delete_checked') }}
        </button>
      </div>
    </div>
    {!! Form::open(['route' => config('quickadmin.route').'.food.massDelete', 'method' => 'post', 'id' => 'massDelete']) !!}
    <input type="hidden" id="send" name="toDelete">
    {!! Form::close() !!}
  </div>
</div>
@else
{{ trans('quickadmin::templates.templates-view_index-no_entries_found') }}
@endif

@endsection

@section('javascript')
<script>
$(document).ready(function () {
  $('#delete').click(function () {
    if (window.confirm('{{ trans('quickadmin::templates.templates-view_index-are_you_sure') }}')) {
      var send = $('#send');
      var mass = $('.mass').is(":checked");
      if (mass == true) {
        send.val('mass');
      } else {
        var toDelete = [];
        $('.single').each(function () {
          if ($(this).is(":checked")) {
            toDelete.push($(this).data('id'));
          }
        });
        send.val(JSON.stringify(toDelete));
      }
      $('#massDelete').submit();
    }
  });
});
</script>
@stop
