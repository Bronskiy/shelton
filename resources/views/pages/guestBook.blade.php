@extends('layouts.default')

@section('meta_title', __('common.guestBook'))
@section('content')
<div class="breadcrumbs overlay" data-stellar-background-ratio="0.7" style="background-image:url('/assets/img/background-rooms.jpg');">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<ul class="list">
					<li><a href="/">@lang('common.home')</a></li>
					<li><a href="#">@lang('common.guestBook')</a></li>
				</ul>
				<h2>@lang('common.guestBook')</h2>
			</div>
		</div>
	</div>
</div>
<section id="blog-area" class="blog-area archive classic single section">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-12">
				<div class="row">
					<div class="col-12">
						<div class="blog-comments">
							<div class="comments-body">
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
							</div>
						</div>
					</div>
					<div class="col-12">
						<div class="comments-form">
							<h2 id="open-comment-form">@lang('common.leaveAMessage')</h2>
							@include('includes.comment-form')
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						{{ $CommentData->links() }}
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-12">
				<div class="sidebar-main">
					<div class="single-widget other-trips">
						<a href="#open-comment-form" class="btn">Оставить сообщение</a>
					</div>
					<div class="single-widget categories">
						<h2>@lang('common.roomsCategories')</h2>
						@include('includes.roomsCatWidget')
					</div>
					<div class="single-widget other-trips">
						<h2>@lang('common.lookAtRooms')</h2>
						<div class="trips">
							@include('includes.roomsWidget')
						</div>
					</div>
					<div class="single-widget categories">
						<h2>@lang('common.restoran')</h2>
						@include('includes.foodCatWidget')
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@stop
