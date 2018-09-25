@extends('layouts.default')

@section('meta_title', __('common.title'))
@section('meta_description', __('common.description'))
@section('meta_keywords', __('common.keywords'))
@section('content')

<section id="hero-area" class="hero-area overlay style2">
  <div class="slider-active">
    @foreach ($slider as $value)
    <div class="single-slider overlay"
    @if ($value->slider_image)
    style="background-image:url('{{ asset('uploads') . '/'.  $value->slider_image }}')"
    @else
    style="background-image:url('https://via.placeholder.com/812x413')"
    @endif
    >
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="hero-inner">
            <div class="welcome-text">
              <h1>{{ $value->slider_title }}</h1>
              <p>{!! $value->slider_text !!}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endforeach
</div>
</section>
<section id="about-us" class="about-us section">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-12">
        <div>
          <div class="title-line">
            <h2>Гостиница «Шелтон» – на час,<br />на ночь, на сутки</h2>
          </div>
          <div class="about-main">
            <p>Гостиница «Шелтон» – это современный стандарт отдыха высокого класса, доступный каждому!
              <br />
              Номера нашей гостиницы обладают уютным и красивым интерьером,
              оснащены современной техникой и готовы предложить Вам качественный отдых.
              Вне зависимости от того, на какой срок Вы планируете стать гостем нашего отеля – на час,
              на ночь, на сутки или несколько дней, Вам будут доступны все его сервисы и возможности.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section id="popular-trips" class="popular-trips section overlay">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-8 col-12">
          <div class="title-line">
            <h2>Шелтон – уютный отель на час в центре Москвы.</h2>
            <p class="text">Мы рады приветствовать Вас в нашем почасовом мини-отеле «Шелтон»!
              К Вашим услугам уютные номера, квалифицированный персонал.
              Гостиница на час «Шелтон» – это уютный мини-отель в центре Москвы.
              У нас вы всегда можете снять номер с почасовой оплатой.
              Забронировать номер на час или на сутки вы можете у нашего администратора по телефону +7 (495) 727-44-11, +7 (969) 284-33-22.</p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="trips-main">
              <div class="trips-slider">
                @foreach ($rooms as $value)
                <div class="single-slider">
                  <div class="trip-head">
                    <a href="/rooms/{{ $value->room_slug }}">
                      <img src="{{ Image::url(asset('uploads') . '/'.  $value->room_photo,338,225,array('crop')) }}" alt="{{ $value->room_title }}" />
                    </a>
                  </div>
                  <div class="trip-details">
                    <div class="left">
                      <h4><a href="/rooms/{{ $value->room_slug }}">{{ $value->room_title }}</a></h4>
                      <p>{{ str_limit(strip_tags(preg_replace('#<a.*?>.*?</a>#i', '', $value->room_text)), $limit = 100, $end = '...') }}</p>
                    </div>
                    <div class="right">
                      <p>@lang('common.price')<br />
        								@if (! empty($value->room_price))
        								<span>{{ $value->room_price }} <i class="fas fa-ruble-sign"></i></span>@lang('common.forHour')<br />
        								@endif
        							</p>
                    </div>
                    <a href="/rooms/{{ $value->room_slug }}" class="btn">@lang('common.viewMore')</a>
                  </div>
                </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section id="services" class="services section archive">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="title-line center">
              <p>@lang('common.featuresDesc')</p>
              <h2>@lang('common.features')</h2>
            </div>
          </div>
        </div>
        <div class="row">
          @foreach ($features as $feature)
          <div class="col-lg-4 col-md-6 col-12">
            <div class="single-service">
              <img src="{{ asset('uploads') . '/'.  $feature->feature_icon }}" alt="{{ $feature->feature_title }}">
              <h2>{{ $feature->feature_title }}</h2>
              <p>{{ $feature->feature_text }}</p>
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
