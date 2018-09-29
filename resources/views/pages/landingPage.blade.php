@extends('layouts.default')
@section('meta_title', $LandingData->night_tariff_seo_title)
@section('meta_keywords', $LandingData->night_tariff_seo_keywords)
@section('meta_description', $LandingData->night_tariff_seo_description)

@section('content')
<section id="cta" class="cta section" style="background-image:url('{{ asset('uploads') . '/'.  $LandingData->night_tariff_image }}')">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-12">
        <div class="cta-text">
          <div class="title-line">
            <h1>{{ $LandingData->night_tariff_title }}</h1>
            {!! $LandingData->night_tariff_text !!}
          </div>
          <a href="/rooms" class="btn">@lang('common.book')</a>
        </div>
      </div>
    </div>
  </div>
</section>
@stop
