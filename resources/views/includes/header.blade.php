<div class="topbar">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-md-6 col-12">
        <ul class="languages">
          <li class="dropdown">
            <a class="dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="flag-icon flag-icon-{{ LaravelLocalization::getCurrentLocale() }} flag-icon-squared"></span> {{ LaravelLocalization::getCurrentLocaleNative() }} </a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              @foreach(LaravelLocalization::getLocalesOrder() as $localeCode => $properties)
              <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                <span class="flag-icon flag-icon-{{ $localeCode }} flag-icon-squared"></span> {{ $properties['native'] }}
              </a>
              @endforeach
            </div>
          </li>
        </ul>
      </div>
      <div class="col-lg-6 col-md-6 col-12">
        @include('includes.social')
      </div>
    </div>
  </div>
</div>
<div class="middle-header">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-3 col-12">
        <div class="logo">
          <a href="/"><img src="/assets/img/shelton-logo.svg" alt="logo"></a>
        </div>
        <div class="mobile-nav"></div>
      </div>
      <div class="col-lg-9 col-md-9 col-12">
        <div class="header-widget">
          @foreach ($сommonData as $value)
          <div class="single-widget">
            <img src="/assets/img/gps.svg" alt="address">
            <h4>{!! $value->common_address !!}</h4>
          </div>
          <div class="single-widget">
            <img src="/assets/img/telephone.svg" alt="phone">
            <h4><a href="tel:+{{ preg_replace('/\D+/', '', $value->common_phone_1) }}">{{ $value->common_phone_1 }}</a></h4>
            <h4><a href="tel:+{{ preg_replace('/\D+/', '', $value->common_phone_2) }}">{{ $value->common_phone_2 }}</a></h4>
          </div>
          <div class="single-widget">
            <img src="/assets/img/email.svg" alt="email">
            <h4><a href="mailto:{{ $value->common_email }}">{{ $value->common_email }}</a></h4>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</div>
<div class="header-bottom">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="main-menu">
          <nav class="navigation">
            <ul class="nav menu">
              <li><a href="/">@lang('common.home')</a></li>
              <li><a href="/rooms">@lang('common.rooms')</a></li>
              <li><a href="/restoran">@lang('common.restoran')</a></li>
              <li><a href="/guestbook">@lang('common.guestBook')</a></li>
              <li><a href="/contacts">@lang('common.contacts')</a></li>
              <li><a href="/landing/night-tariff">@lang('common.nightTariff')</a></li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </div>
</div>
