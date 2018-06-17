@extends('layouts.default')

@section('meta_title', __('common.orderReceived'))
@section('content')
<section id="blog-area" class="blog-area archive classic single section">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-8 offset-lg-2 offset-md-2 col-12">
        <div class="row">
          <div class="col-12">
            <div class="single-blog">
              <div class="blog-content">
                <h4>@lang('common.orderReceived') #{{ session('status') }}</h4>
                <p>@lang('common.orderReceivedMessage')</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@stop
