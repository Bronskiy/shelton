<div class="topbar">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-md-6 col-12">
        <ul class="sub-menu">
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
<!-- Middle Header -->
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
            <img src="/assets/img/gps.svg" alt="#">
            <p>{!! $value->common_address !!}</p>
          </div>
          <div class="single-widget">
            <img src="/assets/img/telephone.svg" alt="#">
            <p>{{ $value->common_phone_1 }}</p>
            <p>{{ $value->common_phone_2 }}</p>
          </div>
          <div class="single-widget">
            <img src="/assets/img/email.svg" alt="#">
            <p>{{ $value->common_email }}</p>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Middle Header -->
<!-- Header Bottom -->
<div class="header-bottom">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <!-- Main Menu -->
        <div class="main-menu">
          <nav class="navigation">
            <ul class="nav menu">
              <li><a href="/">Главная</a></li>
              <li><a href="/rooms">Номера</a></li>
              <li><a href="/restoran">Ресторан</a></li>
              <li><a href="/guestbook">Гостевая книга</a></li>
              <li><a href="/contacts">Контакты</a></li>
            {{--
              @if ( ! $menuData->isEmpty() )
              @foreach ($menuData->where('mainmenu_id',0)->sortBy('menu_order') as $value)
              @if ($menuData->where('mainmenu_id', $value->id )->isEmpty())
              <li class=" {{{ (Request::is(preg_replace('|/|','',$value->menu_link)) ? 'active' : '') }}}"><a href="{{ $value->menu_link }}">{{ $value->menu_title }}</a></li>
              @else
              <li class="menu-item-has-children {{{ (Request::is(preg_replace('|/|','',$value->menu_link)) ? 'active' : '') }}}">
                <a href="{{ $value->menu_link }}">{{ $value->menu_title }} <i class="fa fa-angle-down"></i></a>
                <ul class="sub-menu" style="margin-left: 0px;">
                  @foreach ($menuData->where('mainmenu_id',$value->id)->sortBy('menu_order') as $subvalue)
                  <li><a href="{{ $subvalue->menu_link }}">{{ $subvalue->menu_title }}</a></li>
                  @endforeach
                </ul>
              </li>
              @endif
              @endforeach
              @endif
              --}}

            </ul>
          </nav>
        </div>
        <!--/ End Main Menu -->
      </div>
    </div>
  </div>
</div>
<!--/ End Header Bottom -->
