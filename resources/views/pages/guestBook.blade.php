@extends('layouts.default')

@section('meta_title', __('common.title'))
@section('content')
<!-- Blog Grid -->
<section id="blog-area" class="blog-area archive classic single section">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-8 offset-lg-2 offset-md-2 col-12">
				<div class="row">
					<div class="col-12">
						<div class="single-blog">
							<div class="author-details">
								<div class="row">
									<div class="col-md-12 col-12">
										<div class="author-content">
											<h2>@lang('common.guestBook')</h2>
											<p>Urna litora, consequat eros cras. Suscipit facilisi cursus aenean vel sagittis et. Malesuada ut massa, risus tincidunt. Non ultrices accumsan laoreet eget commodo risus.</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-12">
						<div class="blog-comments">
							<div class="comments-body">
								<!-- Single Comments -->
								@foreach ($CommentData as $value)
								<div class="single-comments">
									<div class="main">
										<div class="body">
											<h4>{{ $value->comment_name }}<span class="meta">{{ Carbon\Carbon::parse($value->created_at)->formatLocalized('%d %b %Y') }}</span></h4>
											<p>{{ $value->comment_text }}</p>
										</div>
									</div>

									@if ($value->comment_admin)
									<div class="comment-list">
										<div class="body">
											<h4>@lang('common.admin')</h4>
											<p>{{ $value->comment_admin }}</p>
										</div>
									</div>
									@endif
								</div>
								@endforeach


								<!--/ End Single Comments -->
							</div>
						</div>
					</div>

					<div class="col-12">
						<div class="comments-form">
							<h2>@lang('common.leaveAMessage')</h2>
							@include('includes.comment-form')
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
			 {{ $CommentData->links() }}
			</div>
		</div>
	</div>
</section>
@stop
