<div class="col-lg-4 col-12 mt-5">
  @if(Request::segment(1) == 'projects' || Request::segment(1) == 'practice')
  <div class="blog-sidebar-heading mb-0"><h4>@lang('common.practice')</h4></div>
  <ul class="list-unstyled blog-border-white p-3 mb-3">
    @foreach ($practicesData as $value)
    <li class="mb-2">
      <p class="mb-0"><a href="/practice/{{ $value->practice_slug }}">{{ $value->practice_title }}</a></p>
    </li>
    @endforeach
  </ul>
  @endif
  <div class="blog-sidebar-heading mb-0"><h4>@lang('common.lawarticles')</h4></div>
  <ul class="list-unstyled blog-border-white p-3 mb-3">
    @foreach ($lawArticlesData as $value)
    <li class="mb-2">
      <p class="mb-0"><a href="/law-articles/{{ $value->law_articles_slug }}">{{ $value->law_articles_title }}</a></p>
    </li>
    @endforeach
  </ul>
  @if(Request::segment(1) != 'projects' && Request::segment(1) != 'practice' && Request::segment(1) != 'recommendations' )
  <div class="blog-sidebar-heading mb-0"><h4>@lang('common.publications')</h4></div>
  <ul class="list-unstyled blog-border-white p-3 mb-3">
    @foreach ($publicationsData as $value)
    <li class="mb-2">
      <p class="mb-0"><i class="fas fa-pencil-alt"></i> <a href="{{ asset('uploads') . '/'.  $value->publications_file }}" target="_blank">{{ $value->publications_title }}</a></p>
    </li>
    @endforeach
  </ul>
  <div class="blog-sidebar-heading"><h4>@lang('common.news')</h4></div>
  <ul class="list-unstyled blog-border-white p-3 mb-3">
    @foreach ($articlesData as $value)
    <li>
      <div class="blog-latest-post">
        <h3><a href="/news/{{ $value->news_slug }}">{{ $value->news_title }}</a></h3>
      </div>
      <small>{{ Carbon\Carbon::parse($value->cat_date)->formatLocalized('%d %b %Y') }} / <a href="/category/{{ $value->newscategories->cat_slug }}">{{ $value->newscategories->cat_title }}</a></small>
      <p>{{ str_limit(strip_tags($value->news_body), $limit = 300, $end = '...') }}</p>
    </li>
    @endforeach
  </ul>
  @endif
</div>
