<!DOCTYPE html>
<html lang="{{ LaravelLocalization::getCurrentLocale() }}">
<head>
  @include('includes.head')
</head>
<body class="js">
  @if (isset($removeHeaderFooter))
  @else
  <header id="site-header" class="site-header">
    @include('includes.header')
  </header>
  @endif

  @yield('content')

  @if (isset($removeHeaderFooter))
  @else
  <footer class="footer">
    @include('includes.footer')
  </footer>
  @endif

  <!-- Jquery -->
  <script src="/assets/js/jquery.min.js"></script>
  <script src="/assets/js/jquery-migrate-3.0.0.js"></script>
  <script src="/assets/js/jquery-ui.min.js"></script>
  <!-- Popper JS -->
  <script src="/assets/js/popper.min.js"></script>
  <!-- Bootstrap JS -->
  <script src="/assets/js/bootstrap.min.js"></script>
  <!-- Bootstrap Datepicker JS
  <script src="/assets/js/bootstrap-datepicker.js"></script>
  -->
  <!-- Steller JS -->
  <script src="/assets/datetime/moment-with-locales.min.js"></script>
  <script src="/assets/datetime/tempusdominus-bootstrap-4.min.js"></script>
  <script src="/assets/js/steller.js"></script>
  <!-- Fancybox JS -->
  <script src="/assets/js/facnybox.min.js"></script>
  <!-- Circle Progress JS -->
  <script src="/assets/js/circle-progress.min.js"></script>
  <!-- Slicknav JS -->
  <script src="/assets/js/slicknav.min.js"></script>
  <!-- Niceselect JS -->
  <script src="/assets/js/niceselect.js"></script>
  <!-- Owl Carousel JS -->
  <script src="/assets/js/owl-carousel.js"></script>
  <!-- Magnific Popup JS -->
  <script src="/assets/js/magnific-popup.js"></script>
  <!-- Waypoints JS -->
  <script src="/assets/js/waypoints.min.js"></script>
  <!-- Wow Min JS -->
  <script src="/assets/js/wow.min.js"></script>
  <!-- Jquery Counterup JS -->
  <script src="/assets/js/jquery-counterup.min.js"></script>
  <!-- Ytplayer JS -->
  <script src="/assets/js/ytplayer.min.js"></script>
  <!-- ScrollUp JS -->
  <script src="/assets/js/scrollup.js"></script>
  <!-- Easing JS -->
  <script src="/assets/js/easing.js"></script>
  <!-- Active JS -->
  <script src="/assets/js/active.js"></script>
  {!! NoCaptcha::renderJs() !!}
  @foreach ($сommonData as $value)
    {!! $value->common_ganalytics !!}
    {!! $value->common_metrika !!}
  @endforeach
  <!-- RedConnect -->
<script id="rhlpscrtg" type="text/javascript" charset="utf-8" async="async"
src="https://web.redhelper.ru/service/main.js?c=shelton1"></script>
<div style="display: none"><a class="rc-copyright"
href="http://redconnect.ru">Обратный звонок RedConnect</a></div>
<!--/RedConnect -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WZ24X7W" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
</body>
</html>
