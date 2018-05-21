@extends('layouts.default' , ['removeHeaderFooter' => true])
@section('meta_title', '404')
@section('content')
<section id="error-page" class="error-page overlay">
  <div class="table">
    <div class="table-cell">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 offset-lg-3 col-12">
            <div class="error-inner">
              <h2>404<span>@lang('common.PageNotFound')</span></h2>
              <p>@lang('common.PageNotFoundDesc')</p>
              <div class="button">
                <a href="/" class="btn primary">@lang('common.GoHomepage')</a>
                <a href="/contacts" class="btn">@lang('common.ContactUs')</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@stop
