@extends('layouts.default')
@section('meta_title', __('common.booking'))

@section('content')
<section id="contact-us" class="contact-us section">
  <div class="container">
    <div class="py-5 text-center">
      <h2>@lang('common.booking')</h2>
    </div>
    <div class="row">
      <div class="col-md-4 order-md-2 mb-4">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-muted">@lang('common.orderedRoom')</span>
        </h4>
        <ul class="list-group mb-3">
          <li class="list-group-item d-flex justify-content-between lh-condensed">
            <div>
              <h5 class="my-0">{{ $orderRoom->room_title }}</h5>
              <hr>
              <h6>@lang('common.arrival')</h6>
              <p>{{ $orderArrival }}</p>
              <h6>@lang('common.departure')</h6>
              <p>{{ $orderDeparture }}</p>
              <hr>

              @if($orderHours == 23 && (!empty($orderRoom->room_price_24)))
              <p><span>{{ $orderRoom->room_price_24 }} <i class="fas fa-ruble-sign"></i></span><span> / @lang('common.for24')</span></p>
              @elseif (isset($orderNight) && $orderRoom->room_price_night != '')
              <p><span>{{ $orderRoom->room_price_night }} <i class="fas fa-ruble-sign"></i></span><span> / @lang('common.forNight')</span></p>
              @else
              <p><span>{{ $orderRoom->room_price }} <i class="fas fa-ruble-sign"></i></span><span> / @lang('common.forHour')</span></p>
              @endif

              @if(isset($orderMessage))

                @if( $orderMessage == 1 )
                <small class="text-muted">@lang('common.minOrder')</small>
                @elseif( $orderMessage == 23 )
                <small class="text-muted">@lang('common.maxOrder')</small>
                @endif

              @endif
            </div>
          </li>
          <li class="list-group-item d-flex justify-content-between">
            <span>@lang('common.total'):</span>
            @if($orderHours == 23 && $orderRoom->room_price_24 != '')
            <strong>{{ $orderRoom->room_price_24 }} <i class="fas fa-ruble-sign"></i></strong>
            @elseif (isset($orderNight) && $orderRoom->room_price_night != '')
            <strong>{{ $orderRoom->room_price_night }} <i class="fas fa-ruble-sign"></i></strong>
            @else
            <strong>{{ $orderHours * $orderRoom->room_price }} <i class="fas fa-ruble-sign"></i></strong>
            @endif
          </li>
        </ul>
      </div>
      <div class="col-md-8 order-md-1">
        <h4 class="mb-3">@lang('common.orderContacts')</h4>
        <p class="lead">@lang('common.orderContactsDesc')</p>

        {!! Form::open(array('url' => 'order/store', 'id' => 'form-with-validation', 'class' => 'form')) !!}
        <input type="hidden" name="rooms_id" value="{{ $orderRoom->id }}">
        <input type="hidden" name="rooms_title" value="{{ $orderRoom->room_title }}">
        <input type="hidden" name="order_user_arrival" value="{{ date('Y-m-d H:i:s',strtotime($orderArrival)) }}">
        <input type="hidden" name="order_user_departure" value="{{ date('Y-m-d H:i:s',strtotime($orderDeparture)) }}">
        @if($orderHours == 23 && $orderRoom->room_price_24 != '')
        <input type="hidden" name="order_price" value="{{ number_format($orderRoom->room_price_24, 2, '.', '') }}">
        @else
        <input type="hidden" name="order_price" value="{{ number_format($orderRoom->room_price_24, 2, '.', '') }}">
        @endif
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              {!! Form::text('order_user_name', old('order_user_name'), array('class'=>'form-control','required' => '','placeholder' => __('common.yourname'))) !!}
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              {!! Form::text('order_user_phone', old('order_user_phone'), array('class'=>'form-control','required' => '','placeholder' => __('common.yourphone'))) !!}
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              {!! Form::email('order_user_email', old('order_user_email'), array('class'=>'form-control','placeholder' => __('common.youremail'))) !!}
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              {!! Form::textarea('order_user_message', old('order_user_message'), array('class'=>'form-control','rows' => 5,'placeholder' => __('common.yourmessage'))) !!}
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <label class="control-label required-label">
                <input type="checkbox" required> @lang('common.dataprocessing')
              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              {!! NoCaptcha::display() !!}
            </div>
          </div>
          <div class="col-md-12">
            <div class="text-center">
              <button class="btn btn-primary btn-lg btn-block" type="submit">@lang('common.book')</button>
            </div>
          </div>
        </div>
        {!! Form::close() !!}
        <div class="ajax-response text-center" id="contact-response">
          @if (count($errors) > 0)
          <div class="alert alert-danger">
            <strong>{{ trans('quickadmin::auth.whoops') }}</strong> {{ trans('quickadmin::auth.some_problems_with_input') }}
            <br><br>
            <ul>
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
          @endif
        </div>
      </div>
    </div>
  </div>
</section>
@stop
