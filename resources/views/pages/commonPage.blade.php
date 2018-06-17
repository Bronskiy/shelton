@extends('layouts.default')
@section('meta_title', $PageData->common_seo_title)
@section('meta_keywords', $PageData->common_seo_keywords)
@section('meta_description', $PageData->common_seo_description)

@section('content')
<section id="about-us" class="about-us section">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="title-line">
          <h1>{{ $PageData->common_title }}</h1>
        </div>
        <div class="about-main">
          {!! $PageData->common_text !!}
        </div>
      </div>
    </div>
  </div>
</section>
@stop
