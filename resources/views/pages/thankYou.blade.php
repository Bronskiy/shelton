@extends('layouts.default')

@section('meta_title', __('common.thanks'))
@section('content')
<section id="blog-area" class="blog-area archive classic single section">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-8 offset-lg-2 offset-md-2 col-12">
        <div class="row">
          <div class="col-12">
            <div class="single-blog">
              <div class="blog-content">
                <h4>@lang('common.thanks')</h4>
                <p>@lang('common.ourresponse')</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@stop
