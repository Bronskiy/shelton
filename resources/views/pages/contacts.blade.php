@extends('layouts.default')
@section('meta_title', __('common.contacts'))

@section('content')
<div class="breadcrumbs overlay" data-stellar-background-ratio="0.7" style="background-image:url('/assets/img/background-rooms.jpg');">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <ul class="list">
          <li><a href="/">@lang('common.home')</a></li>
          <li><a>@lang('common.contacts')</a></li>
        </ul>
        <h2>@lang('common.contacts')</h2>
      </div>
    </div>
  </div>
</div>
<section id="contact-us" class="contact-us section">
  <div class="container">
    <div class="row">
      @foreach ($сommonData as $value)
      <div class="col-lg-12">
        <div class="contact">
          <div class="row">
            <div class="col-lg-4 col-md-4 col-12">
              <div class="single-contact">
                <img src="/assets/img/gps.svg" alt="адрес">
                <h4>{!! $value->common_address !!}</h4>
              </div>
            </div>
            <div class="col-lg-4 col-md-4 col-12">
              <div class="single-contact">
                <img src="/assets/img/telephone.svg" alt="телефон">
                <h4>{{ $value->common_phone_1 }}</h4>
                <h4>{{ $value->common_phone_2 }}</h4>
              </div>
            </div>
            <div class="col-lg-4 col-md-4 col-12">
              <div class="single-contact">
                <img src="/assets/img/email.svg" alt="email">
                <h4><a href="mailto:{{ $value->common_email }}">{{ $value->common_email }}</a></h4>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-8">
          <div class="title-line center">
            <h3>@lang('common.ContactUs')</h3>
          </div>
        @include('includes.form')
      </div>
      <div class="col-lg-4">
          <div class="title-line center">
            <h3>@lang('common.ContactDetails')</h3>
          </div>
          <div class="">
            {!! $value->common_contact_details !!}
          </div>
      </div>

      @endforeach
    </div>
  </div>
</section>
@foreach ($сommonData as $value)
<div class="map-section">
  {!! $value->common_map !!}
</div>
@endforeach

  @stop
